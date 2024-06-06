<?php
  session_start();
  require_once('./dbConfig.php');
  $link = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  if($link == null){
    die("接続に失敗しました：" . mysqli_connect_error());
  }
  mysqli_set_charset($link, "utf8");
// 新しいCustomerIDを取得 ＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊
  $maxsql = "SELECT MAX(customer_id) AS maxid FROM customer";
  $result = mysqli_query($link, $maxsql);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $newid = $row['maxid'] + 1 ;
// customerテーブルに挿入 ＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊
  $dname = $_SESSION['reserve']['dname'];
  $dtelno = $_SESSION['reserve']['dtelno'];
  $dmail = $_SESSION['reserve']['dmail'];
  $sql = "INSERT INTO customer (customer_id, customer_name, customer_telno, customer_address) VALUES (?, ?, ?, ?)" ;