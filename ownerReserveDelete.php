<?php
    session_start();
    // $reserveNo = htmlspecialchars($_GET["rno"]); //削除する予約のID
    // echo "<br> 削除する予約番号は {$reserveNo} です。<br>";

    include './dbConfig.php';

    // // セッションデータのデバッグ出力
    // echo "<pre>";
    // print_r($_SESSION);
    // echo "</pre>";

    //try-catchブロック：データベース接続の試行とエラー処理を行う
    try {
        $pdo = new PDO(
            "mysql:host=" . DB_SERVER . 
            ";dbname=" . DB_NAME . 
            ";charset=utf8" , DB_USER, DB_PASS );
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo '接続に失敗しました：' . $e->getMessage();
        exit();
    }


    // 7/8月　ここを変更して試す！！
// // 削除する予約のIDがURLパラメータに存在するか確認
//     if (isset($_GET['rno'])) {
//         $reserve_no = $_GET['rno'];
//     } else {
//         echo '予約IDが指定されていません。';
//         exit();
//     }

    // 現在の日時
    $deleted_at = date('Y-m-d H:i:s');

    // 削除フラグを立て、削除日時を記録するクエリ
    $sql = "UPDATE reserve SET deleted_flag = 1, deleted_at = :deleted_at WHERE reserve_no = :reserve_no";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':deleted_at', $deleted_at);
    $stmt->bindParam(':reserve_no', $reserve_no);

    // // デバッグ用にクエリを出力
    // $stmt->debugDumpParams();

    // if ($stmt->execute()) {
    //     if ($stmt->rowCount() > 0) {
    //         echo '予約が削除されました。';
    //     } else {
    //         echo '更新された行がありません。';
    //     }
    // } else {
    //     // エラー情報の出力
    //     $errorInfo = $stmt->errorInfo();
    //     echo '削除に失敗しました。エラー情報: ' . print_r($errorInfo, true);
    // }
    
?>