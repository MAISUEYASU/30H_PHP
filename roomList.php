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
          <h2>お部屋のご紹介</h2>
<?php
  if (empty($tid) == true) {
    $sql = "SELECT room_no, room_name, type_name, dayfee, main_image 
    FROM room, room_type 
    WHERE room.type_id = room_type.type_id";
  }else{
    $sql = "SELECT room_no, room_name, type_name, dayfee, main_image 
    FROM room, room_type
    WHERE room.type_id =room_type.type_id 
    AND room.type_id = {$tid}" ;
  }
  $result = mysqli_query( $link, $sql );
  $cnt = mysqli_num_rows($result);
  if ($cnt == 0){
    echo "<b?>ご指定のお部屋はただいま準備ができておりません。</b>";
  }else{
?>
          <h3>自慢のお部屋をご紹介</h3>
          <p>和室・洋室・和洋室と、ご希望に沿った形でお部屋をお選び頂けます。</p>
          <table>
            <tr>
              <th>お部屋名称</th>
              <th>お部屋タイプ</th>
              <th>一泊料金<br>（部屋単位）</th>
              <th colspan="2">お部屋イメージ</th>
            </tr>            
    <!-- PHP埋め込む -->
<?php
    while ( $row = mysqli_fetch_array( $result, MYSQLI_ASSOC)) {
      echo "<tr>";
      echo "<td>{$row['room_name']}</td>";
      echo "<td>{$row['type_name']}</td>";
      $roomfee = number_format($row['dayfee']);
      echo "<td class='number'>&yen; {$roomfee} </td>";
      echo "<td><img class='small' src='./images/{$row['main_image']}'></td>";
      echo "<td><a href='./roomDetail.php?rno={$row['room_no']}'>詳細</a></td>";
      echo "</tr>";
    }
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
            <li>宿泊日入力<a href="#"></a></li>
          </ul>
        </section>
        <section>
          <h2>お部屋紹介</h2>
<?php
  $link = mysqli_connect("localhost", "jikkyo", "pass", "jikkyo_pension");
  if ($link == null) {
    die("接続に失敗しました:" . mysqli_connect_error());
  }
  mysqli_set_charset($link, "utf8");
  $result = mysqli_query($link, "SELECT * FROM room_type");
  echo "<ul>";
  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    echo "<li><a href='./roomList.php?tid=". $row['type_id']."'>". $row['type_name']. "</a></li>";
  }
  echo "</ul>";
?>
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