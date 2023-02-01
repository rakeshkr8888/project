<?php
if (isset($_POST['submit'])) {
    require 'database.php';

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    if(empty($username) | empty($password)){
        header("location:../login.php?error=emptyfield");
        exit();
    } else{
        $sql = "SELECT * FROM users WHERE username=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("location:../login.php?error=sqlerror");
            exit();
        }else{
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row=mysqli_fetch_assoc($result)){
                $passCheck = password_verify($password, $row['password']);
                if($passCheck){
                    session_start();
                    $_SESSION['sessionId'] = $row['id'];
                    $_SESSION['sessionUser'] = $row['username'];
                    header("location:../index.php?login=success");
                    exit();
                }else{
                    header("location:../login.php?wrongpassword");
                    exit();
                }
            }else{
                header("location:../login.php?usenamedoesnotexit");
                exit();
            }
            

        }
    }
 }
 else {
    header("location:../login.php?accessforbidden");
    exit();
}
?>