<?php
if (isset($_POST['submit'])) {
    require 'database.php';

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $confirmPass = trim($_POST['confirmpassword']);

    if (empty($username) || empty($password) || empty($confirmPass)) {
        header("location: ../register.php?error=emptyfield&username=" . $username);
        exit();
    }
    if (!preg_match('~^[a-z]{4,8}[0-9]{0,4}$|^[a-z]{4,12}$~', $username)) { #usename need to be of length 12 (only string or contain 4 numbers eg: testtesttest, testtest1234-> valid )
        header("location: ../register.php?error=invalidusername=" . $username);
        exit();
    }
    if ($password !== $confirmPass) {
        header("location: ../register.php?error=passworddoesnotmatch&username=" . $username);
        exit();
    } else {
        $sql = "SELECT username FROM users WHERE username=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../register.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            if ($row = mysqli_stmt_num_rows($stmt)) {
                header("location: ../register.php?error=usernamealreadyexist");
                exit();
            } else {
                $sql = "INSERT INTO users (username,password) VALUES (?,?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("location: ../register.php?error=sqlerror");
                    exit();
                } else {
                    $hashpass = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "ss", $username, $hashpass);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_close($stmt);
                    mysqli_close($conn);
                    header("location:../register.php?register=success");
                    exit();
                }
            }

        }
    }

}
 else {
    header("location: ../register.php?error=accessforbidden");
}
?>