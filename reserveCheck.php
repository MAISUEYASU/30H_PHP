<?php
    session_start();
    $dname = htmlspecialchars($_POST['dname']);
    $dtelno = htmlspecialchars($_POST['dtelno']);
    $dmail = htmlspecialchars($_POST['dmail']);
    $reserveNumber = htmlspecialchars($_POST['reserveNumber']);
    $checkin = htmlentities($_POST['checkin']);
    $message = htmlspecialchars($_POST['message']);

//入力値をセッションに格納する
    $_SESSION['reserve']['dname'] = $dname;
    $_SESSION['reserve']['dtelno'] = $dtelno;
    $_SESSION['reserve']['dmail'] = $dmail;
    $_SESSION['reserve']['reserveNumber'] = $reserveNumber;
    $_SESSION['reserve']['checkin'] = $checkin;
    $_SESSION['reserve']['message'] = $message;

//エラーメッセージを格納する配列を準備
    $errMsg = array();

//未入力チェック***************************
    if(empty($dname) == true){
        $errMsg['dname'] = "名前が未入力です"; 
    }
    if(empty($dtelno) == true){
        $errMsg['dtelno'] = "電話番号が未入力です";
    }
    if(empty($checkin) == true){
        $errMsg['checkin'] = "チェックイン予定時間が未入力です"; 
    }
    if(empty($reserveNumber) == true){
        $errMsg['reserveNumber'] = "宿泊人数が未入力です"; 
    } else {
//**数値チェック***************************
        if(is_numeric($reserveNumber) != true) {
            $errMsg['reserveNumber'] = "宿泊人数は数値で指定してください";
        } else {
            if($reserveNumber <=0 ){
                $errMsg['reserveNumber'] = "宿泊人数は1診以上を指定してください";
            }
        }
    }

    if(count($errMsg) == 0){
        header("location: ./reserveConfirm.php");
    } else {
        $_SESSION['errMsg'] = $errMsg;
        header("location: ./reserveDetail.php?rno=" . $_SESSION['reserve']['roomno']);
    }
    exit();
?>