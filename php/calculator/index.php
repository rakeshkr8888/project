<?php
require("database.php");
require("function.php");
$msg = "";
session_start();
if(isset($_SESSION['user_login'])){
    redirect("dashboard.php");
}

if(isset($_POST['submit'])){
    $email = getSafeValue($_POST['email']);
    $password = getSafeValue($_POST['password']);

    if(!empty($email) && !empty($password)){
        $res = mysqli_query($conn, "select * from users where email='$email'");
        if(mysqli_num_rows($res)>0){
            $row = mysqli_fetch_assoc($res);

          
                if(password_verify($password,$row['password'])){
                    session_start();
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['user_login'] = true;
                    $_SESSION['user_name'] = $row['name'];
                    echo $_SESSION['user_id']."  ".$_SESSION['user_login']."  ".$_SESSION['user_name'];
                    redirect("dashboard.php");
                }else{
                    $msg = "please enter correct password";
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
    <link rel="stylesheet" href="css/style.css">

    <!-- font family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

        <title>Calculator</title>
    </head>
    <body>
        <section class="login">
            <div class="container login_container">
                <div class="left">
                    <div class="image">
                    <img src="assets/cal.svg" alt="image">
                    </div>
                </div>
                <div class="right">
                    <div class="forms">
                    <h3>Login</h3>
                    <p class="msg"><?php echo $msg ?></p>
                    <form action="index.php" method="POST">
                        <div class="input_container">
                            <label for="email">Email: <span class="required"> * </span></label>
                            <input type="email" name="email" placeholder="Email" required >
                        </div>
                        <div class="input_container">
                            <label for="password">Password: <span class="required"> * </span></label>
                            <input type="password" name="password" placeholder="Password" required>
                        </div>
                        <button name="submit" type="submit" class="btn btn-primary">login</button>
                    </form>
                    <div class="register" ><p>Do not have account </p> 
                        <a href="register.php">create new account</a>
                    </div>
                    <div class="credentials" ><p>Try: user1@gmail.com password:12345678<br>user2@gmail.com password:12345678</p>
                    </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>