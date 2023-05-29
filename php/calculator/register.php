<?php
require("database.php");
require("function.php");
$msg = "";
session_start();
if(isset($_SESSION['user_login'])){
    redirect("dashboard.php");
}

if(isset($_POST['submit'])){
    $name = getSafeValue($_POST['name']);
    $email = getSafeValue($_POST['email']);
    $password = getSafeValue($_POST['password']);
    $password_confirmation = getSafeValue($_POST['password_confirmation']);

    if(!empty($email) && !empty($password)){
        $res = mysqli_query($conn, "select * from users where email='$email'");
        if(mysqli_num_rows($res)==0){
            if($password==$password_confirmation){
                $hash_password=password_hash($password,PASSWORD_DEFAULT);
                $sql="INSERT INTO users (name,email,password) VALUES ('$name','$email','$hash_password')";

                if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }

                // header("location: register.php?success=registersuccessfully");
                redirect("index.php");
                exit();
            }else{
                $msg="confirmed password does not match";
            }
        }else{
            $msg = "Email alreay exists";
        }
    }else{
        $mgs="Enter required fields";
    }
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
    <style>
        .login_container{
            display:grid;
            grid-template-columns: 1fr;
        }

        @media screen and (max-width:680px){
            .right{
                margin:3rem 0;
            }
            .input_container{
                display: flex;
                flex-direction: column;
                justify-content: center;
            }
            .forms{
                padding:2rem;
            }
    }
    </style>

    </head>
    <body>
        <section class="login">
            <div class="container login_container">
                <div class="right">
                <div class="forms">
                <h3>Register</h3>
                <p class="msg"><?php echo $msg ?></p>
                <form action="register.php" method="POST">
                <div class="input_container">
                            <label for="name">Name: <span class="required"> * </span></label>
                    <input type="text" name="name" placeholder="Name" required >
                </div>
                <div class="input_container">
                            <label for="email">Email: <span class="required"> * </span></label>
                    <input type="email" name="email" placeholder="Email" required >
                </div>
                <div class="input_container">
                            <label for="password">Password: <span class="required"> * </span></label>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div class="input_container">
                            <label for="password_confirmation">confirm password: <span class="required"> * </span></label>
                    <input type="password" name="password_confirmation" placeholder="Re enter Password" required>
                </div>
                    <button name="submit" type="submit" class="btn btn-primary">Register</button>
                </form>
                <div class="register" ><p>have an account </p> 
                        <a href="index.php">click here to login</a>
                    </div>
                </div>
                </div>
            </div>
        </section>
    </body>
</html>