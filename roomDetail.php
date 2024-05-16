<?php
if (empty($_GET["tid"]) == true ) {
  $tid = "";
}else{
  $tid = htmlspecialchars($_GET["tid"]);
}
  $link = mysqli_connect("localhost","jikkyo","pass","jikkyo_pension");
  if ( $link == null ) {
    die( "接続に失敗しました:" . mysqli_connect_error() );
  }
  mysqli_set_charset( $link, "utf8" );
?>
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
    <nav id="menu">
      <ul>
        <li><a href="./index.php">ホーム</a></li>
        <li><a href="./roomList.php">お部屋紹介</a></li>
        <li><a href="#">ご予約</a></li>
      </ul>
    </nav>  
    <!-- メニュー：終了 -->
    
    <!-- コンテンツ：開始 -->
    <div id="contents">

    <!-- メイン：開始 -->
      <main id="main">
        <article>
          <section>
            <h2>お部屋の詳細</h2>
            <h3>『ゆとりの和洋室』</h3>
            <p>お風呂・トイレも部屋内にある、広めの和洋室です。<br>
            部活・サークルなど、気の合う仲間たちと大人数で利用するのに適しています。</p>
            <table>
              <tr>
                <td><img class="middle" src="./images/room_01_01.jpg"></td>
                <td><img class="middle" src="./images/room_01_02.jpg"></td>
              </tr>
              <tr>
                <td><img class="middle" src="./images/room_01_03.jpg"></td>
                <td><img class="middle" src="./images/room_01_04.jpg"></td>
              </tr>
            </table>
            <br>
            <table>
                <th>お部屋タイプ</th>
                <th>一泊料金<br>（部屋単位）</th>
                <th>アメニティ</th>
              <tr>
                <td>和室</td>
                <td class="number">&yen;8,000</td>
                <td>部屋着、ドライヤー、シャンプー、リンス</td>
              </tr>
            </table>
            <br>
          </section>
        </article>
      </main>
      <!-- メイン：終了 -->

      <!-- サイド：開始 -->
      <aside id="side">
        <section>
          <h2>ご予約</h2>
          <ul>
            <li>宿泊日入力<a href="#"></a></li>
          </ul>
        </section>
        <section>
          <h2>お部屋紹介</h2>
          <ul>
            <li><a href="#">和室</a></li>
            <li><a href="#">洋室</a></li>
            <li><a href="#">和洋室</a></li>
          </ul>
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
<?php
  mysqli_free_result($result);
  mysqli_close($link);
?>

  </body>
</html>