<?php
  session_start();
  require_once('./dbConfig.php');
  $link = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  if ($link == null) {
    die("接続に失敗しました:" . mysqli_connect_error());
  }
  mysqli_set_charset($link, "utf8");
  $roomNo = $_SESSION['reserve']['roomno'];
  $sql = "SELECT room_name FROM room WHERE room_no = {$roomNo}";
  $result = mysqli_query($link, $sql);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $roomName = $row['room_name'];             //部屋名称
  $reserveDay = $_SESSION['reserve']['day']; //予約日

  $dname = $_SESSION['reserve']['dname'];
  $dtelno = $_SESSION['reserve']['dtelno'];
  $dmail = $_SESSION['reserve']['dmail'];
  $reserveNumber = $_SESSION['reserve']['reserveNumber'];
  $checkin = $_SESSION['reserve']['checkin'];
  $message = $_SESSION['reserve']['message'];
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
            <span class="tel">
                <p>☎0120-000-000</p>
            </span>
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
                    <form action="./reserveInsert.php" method="post">
                        <h2>ご予約（最終確認）</h2>
                        <p>予約内容を確認後、よろしければ予約確定ボタンを押してください。</p>
                        <h3>予約情報</h3>
                        <table class="input">
                            <tr>
                                <th>お部屋名称</th>
                                <td><?= $roomName ?></td>
                            </tr>
                            <tr>
                                <th>宿泊日</th>
                                <td><?php echo date('Y年n月j日', strtotime($reserveDay)); ?></td>
                            </tr>
                        </table>
                        <br>
                        <h3>代表者情報</h3>
                        <table class="input">
                            <tr>
                                <th>代表者氏名</th>
                                <td><?= $dname ?></td>
                            </tr>
                            <tr>
                                <th>連絡先電話番号</th>
                                <td><?= $dtelno ?></td>
                            </tr>
                            <tr>
                                <th>メールアドレス</th>
                                <td><?= $dmail ?></td>
                            </tr>
                        </table>
                        <br>
                        <h3>予約詳細情報</h3>
                        <table class="input">
                            <tr>
                                <th>宿泊人数</th>
                                <td><?= $reserveNumber ?></td>
                            </tr>
                            <tr>
                                <th>チェックイン予定時間</th>
                                <td><?= $checkin ?></td>
                            </tr>
                            <tr>
                                <th>連絡事項</th>
                                <td><?= $message ?></td>
                            </tr>
                        </table>
                        <br>
                        <input class="submit_a" type="submit" value="予約確認">
                        <input class="submit_a" type="button" value="前の画面に戻る" onclick="history.back();">
                    </form>
                </section>
            </article>
        </main>
        <!-- メイン：終了 -->

        <!-- サイド：開始 -->
        <aside id="side">
            <section>
                <h2>ご予約</h2>
                <ul>
                    <li><a href="./reserveDay.php">宿泊日入力</a></li>
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
    <?php
  mysqli_free_result($result);
  mysqli_close($link);
?>
</body>

</html>