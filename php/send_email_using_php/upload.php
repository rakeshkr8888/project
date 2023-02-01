<?php
if(isset($_POST['submit'])){
    echo $name = trim($_POST['name']);
    echo $email = trim($_POST['email']);
    echo $subject = trim($_POST['subject']);
    echo $message = trim($_POST['message']);

    if(empty($name) || empty($email) || empty($subject) || empty($message)){
        header("location:index.php?error=emptyfied");
        exit();
    }
    if(!str_contains($email,"@")){
        header("location:index.php?error=invalidemail");
        exit();
    }
    else{
        $myEmail="rakeshkr888899@gmail.com";
        $header = "From:" . $email;
        echo mail($myEmail, $subject, $message, $header);
        header("location:index.php?mailsend=success");
        exit();
    }

}else{
    header("location:index.php?accessforbidden");
    exit();
}
?>