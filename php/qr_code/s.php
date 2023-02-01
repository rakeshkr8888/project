<?php
require('container/database.php');
require('container/function.php');
require('BrowserDetection.php');

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $id = getSafeValue($_GET['id']);

    $res = mysqli_query($con, "select link,addedby,status from qrcode where id='$id'");
    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        if ($row['status'] == 1) {
            $get_user_info=getUserInfo($row['addedby']);
            $get_user_total_hit=getUserTotalHit($row['addedby']);
            if($get_user_info['totalhit'] > $get_user_total_hit['total_hit']){
                $device = '';
            $browser = '';
            $os = '';

            // Check if the "mobile" word exists in User-Agent 
            $isMob = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile"));

            // Check if the "tablet" word exists in User-Agent 
            $isTab = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "tablet"));

            // Platform check  
            $isWin = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "windows"));
            $isAndroid = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "android"));
            $isIPhone = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "iphone"));
            $isIPad = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "ipad"));
            $isIOS = $isIPhone || $isIPad;

            if ($isMob) {
                if ($isTab) {
                    $device="Tablet";
                } else {
                    $device="Mobile";
                }
            } else {
                $device="Desktop";
            }

            if ($isIOS) {
                $os="Ios";
            } elseif ($isAndroid) {
                $os= 'Android';
            } elseif ($isWin) {
                $os="windows";
            }

            //Browser detect
            $Browser =new foroco\BrowserDetection();
            $useragent = $_SERVER['HTTP_USER_AGENT'];
            $result = $Browser->getBrowser($useragent);
            $browser = $result['browser_name'];

            //city state country
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "http://ip-api.com/json");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $result=curl_exec($ch);
            curl_close($ch);
            $result= json_decode($result, true);
            $city = $result['city'];
            $state = $result['region'];
            $country = $result['country'];
            $ip_address = $result['query'];
            $added_on=date('Y-m-d h:i:s');
            $added_on_str=date('Y-m-d');


                mysqli_query($con, "insert into qrtraffic (qrcodeid,device,os,browser,city,state,country,ipaddress,addedon,addedonstr) values ('$id','$device','$os','$browser','$city','$state','$country','$ip_address','$added_on','$added_on_str')");
                redirect($row['link']);
            }else{
                die('exceeded total hit limit');
            }

            
        } else {
            die('Deactive QR code');
        }
    } else {
        die('No such QR code exist');
    }
} else {
    die('something went wrong');
}
?>