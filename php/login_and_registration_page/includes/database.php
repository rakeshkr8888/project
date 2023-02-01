<?php
$dbHost = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "proj1phploginandregisterpage";

$conn = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);
if(!$conn){
    die("Database connection failed");
}
?>