<?php
require("container/database.php");
require("container/function.php");
$msg = "";

if(isset($_SESSION['user_login'])){
    // redirect("profile.php");
}

if(isset($_POST['submit'])){
    $email = getSafeValue($_POST['email']);
    $password = getSafeValue($_POST['password']);

    if(!empty($email) && !empty($password)){
        $res = mysqli_query($con, "select * from users where email='$email'");
        if(mysqli_num_rows($res)>0){
            $row = mysqli_fetch_assoc($res);

            if($row['status']==1){
                if(password_verify($password,$row['password'])){
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['user_login'] = true;
                    $_SESSION['user_name'] = $row['name'];
                    $_SESSION['user_role'] = $row['role'];
                    redirect("qr_code.php");
                }else{
                    $msg = "please enter correct password";
                }
            }else{
                $msg = "account deactivated";
            }
        }else{
            $msg = "invalid email";
        }
    }else{
        $msg = "Please fill all field";
    }
}else{
    $msg = "fill the form";
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- style css-->
    <link rel="stylesheet" href="./css/login.css">

    <!-- font family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

        <title>QR code generator</title>
    </head>
    <body>
        <section class="login">
            <div class="container login_container">
                <h3>Login</h3>
                <p><?php echo $msg ?></p>
                <form action="index.php" method="POST">
                    <input type="email" name="email" placeholder="Email" required >
                    <input type="password" name="password" placeholder="Password" required>
                    <button name="submit" type="submit" class="btn btn-primary">login</button>
                </form>
            </div>
        </section>
    </body>
</html>