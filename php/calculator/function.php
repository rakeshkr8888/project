<?php

function pr($arr){
    echo "<pre>";
    print_r($arr);
}

function prx($arr){
    echo "<pre>";
    print_r($arr);
    die();
}

function redirect($link){
    if($link!=''){
        ?>
            <script>
                window.location.href="<?php echo $link ?>";
            </script>
        <?php
    }
}

function getSafeValue($value){
    global $conn;
    $value = mysqli_real_escape_string($conn, $value);
    return $value;
}

function islogin(){
    session_start();
    // prx($_SESSION);
    if(!isset($_SESSION['user_login']) && $_SESSION['user_login']==''){
        redirect('index.php');
    }
}

function isAdmin(){
    if($_SESSION['user_role']==1){
        redirect('qr_code.php');
    }
}

function getUserInfo($uid){
    if($uid>0){
        global $conn;
        $row = mysqli_fetch_assoc(mysqli_query($conn, "select * from users where id='$uid'"));
        return $row;
    }
}

function getUserTotalQr($uid){
    if($uid>0){
        global $conn;
        $row = mysqli_fetch_assoc(mysqli_query($conn, "select count(*) as total_qr from qrcode where addedby='$uid'"));
        return $row;
    }
}

function getUserTotalHit($uid){
    if($uid>0){
        global $conn;
        $row = mysqli_fetch_assoc(mysqli_query($conn, "select count(*) as total_hit from qrtraffic,qrcode,users where qrtraffic.qrcodeid=qrcode.id and qrcode.addedby=users.id and users.id='$uid'"));
        return $row;
    }
}

function customDate($date){
    if($date!=''){
        $date = strtotime($date);
        return date('d-m-Y', $date);
    }
}


?>