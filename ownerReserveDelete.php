<?php
    include './dbConfig.php';

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

    //削除する予約のID
    $reserve_no = $_POST['reserve_no'];

    //現在の日時
    $deleted_at = date('Y-m-d H:i:s');

    //削除フラグを立て、削除日時を記録するクエリ
    $sql = "UPDATE reserve SET deleted_flag = 1, deleted_at = :deleted_at WHERE reserve_no = :reserve_no";

    $stmt = $link->prepare($sql);
    $stmt->bindParam(':deleted_at', $deleted_at);
    $stmt->bindParam(':reserve_no', $reserve_no);

    if($stmt->execute()) {
        echo '予約が削除されました。';
    } else {
        echo '削除に失敗しました。';
    }
    
?>