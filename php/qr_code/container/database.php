<?php
session_start();
$qr_file_path = "http://127.0.0.1/qr_code/s.php";
$con = mysqli_connect("localhost","root","","qr");
if(!$con){
    die("can not connect to database");
}
?>