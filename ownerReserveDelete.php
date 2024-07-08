<?php
    //削除処理ファイル
    session_start();
    include './dbConfig.php';

    // GETパラメータから予約番号を取得
    $rno = $_GET['rno'];

    // トランザクションを開始
    $link->begin_transaction();

    try {
        // 予約情報を取得
        $reserve_sql = "SELECT * FROM reserve WHERE reserve_no = ?";
        $reserve_stmt = $link->prepare($reserve_sql);
        $reserve_stmt->bind_param("i", $rno);
        $reserve_stmt->execute();
        $reserve_result = $reserve_stmt->get_result();
        $reserve_row = $reserve_result->fetch_assoc();

        // 顧客情報を取得
        $customer_sql = "SELECT * FROM customer WHERE customer_id = ?";
        $customer_stmt = $link->prepare($customer_sql);
        $customer_stmt->bind_param("i", $reserve_row['customer_id']);
        $customer_stmt->execute();
        $customer_result = $customer_stmt = $customer_stmt->get_result();
        $customer_row = $customer_result->fetch_assoc();

        // 予約テーブルの削除フラグを設定
        $update_reserve_sql = "UPDATE reserve SET is_deleted = TRUE, deleted_at = NOW() WHERE reserve_no = ?";
        $upadate_reserve_stmt = $link->prepare($update_reserve_sql);
        $upadate_reserve_stmt->bind_param("i", $rno);
        $upadate_reserve_stmt->execute();

        //顧客テーブルの削除フラグを設定
        $update_customer_sql = "UPDATE customer SET is_deleted = TRUE, deleted_at = NOW() WHERE customer_id = ?";
        $update_customer_stmt = $link->prepare($update_customer_sql);
        $update_customer_stmt->bind_param("i", $reserve_row['customer_id']);
        $update_customer_stmt->execute();

        // コミット
        $link->commit();

        //リダイレクト
        header("Location: ownerreserveList.php");

    } catch (Exception $e) {
        // エラーが発生した場合はロールバック
        $link->rollback();
        echo "エラーが起きました：" . $e->getMessage();
    }

  //  mysqli_free_result($result);
        $link->close();   
?>