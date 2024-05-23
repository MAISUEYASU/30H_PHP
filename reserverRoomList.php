<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <link href="./css/style.css" rel="stylesheet" type="text/css">
    <title>JIKKYO PENSION</title>
  </head>
  <body>

    <!-- ヘッダー：開始 -->
    <header id="header">
      <div id="pr">
        <p>部活・サークル等のグループ利用に最適！アットホームなペンション！</p>
      </div>
      <h1><a href="./index.php"><img src="./images/logo.png" alt=""></a></h1>
      <div id="contact">
        <h2>ご予約/お問合せ</h2>
        <span class="tel"><p>☎0120-000-000</p></span>
      </div>
    </header>
    <!-- ヘッダー：終了 -->

    <!-- メニュー：開始 -->
<?php include("./topMenu.php"); ?> 
    <!-- メニュー：終了 -->
    
    <!-- コンテンツ：開始 -->
    <div id="contents">

    <!-- メイン：開始 -->
      <main id="main">
        <article>
    <!-- 各ページスクリプト挿入場所 --> 
          <section>
            <h2>空室検索</h2>
            <h3>**検索日付**の空室一覧</h3>
            <p>**空室数**部屋の空室があります</p>
            <table>
              <tr>
                <th>お部屋名称</th>
                <th>お部屋タイプ</th>
                <th>一泊料金<br>（部屋単位）</th>
                <th colspan="2">お部屋イメージ</th>
              </tr>
<?php 
  $reserveDt = $_POST['reserveDay']; //予約したい日付
  $sql = " SELECT room_name, type_name, dayfee, main_image, room_no 
  FROM room, room_type WHERE room.type_id = room_type.type_id 
  AND room.room_no NOT IN ( 
    SELECT room_no FROM reserve WHERE date(reserve_date) = '{$reserveDt}')";

  $result = mysqli_query($link, $sql);
  while($row = mysqli_fetch_array($resule, MYSQLI_ASSOC)){
    echo "";
    echo "";
    echo "";
    echo "";
    echo "";
    echo "";
    echo "";
  }
?>
            </table>
          </section>
        </article>
      </main>
      <!-- メイン：終了 -->

      <!-- サイド：開始 -->
      <aside id="side">
        <section>
          <h2>ご予約</h2>
          <ul>
            <li>宿泊日入力<a href="./reserveDay.php"></a></li>
          </ul>
        </section>
        <section>
          <h2>お部屋紹介</h2>
<?php include("./sideList.php"); ?>
          </section>
      </aside>
    <!-- サイド：終了 -->

    <!-- ページトップ：開始 -->
    <div id="pageTop">
      <a href="#pageTop">ページのトップへ戻る</a>
    </div>
    <!-- ページトップ：終了 -->
    </div>
    <!-- コンテンツ：終了 -->

    <!-- フッター：開始 -->
    <footer id="footer">
      <p>Copyright c 2016 Jikkyo Pension All Rights Reserved.</p>
  </footer>
    <!-- フッター：終了 -->
  </body>
</html>