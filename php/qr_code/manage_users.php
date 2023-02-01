<?php
require('container/header.php');
islogin();
isAdmin();
$msg = "";
$name = '';
$email = '';
$password='';
$total_qr = 0;
$total_hit = 0;
$password_required = "required";
$id = 0;

if(isset($_GET['id']) && $_GET['id']>0){
    $id = getSafeValue($_GET['id']);
    $res = mysqli_query($con, "select * from users where id='$id'");
    if(mysqli_num_rows($res)>0){
        $row = mysqli_fetch_assoc($res);

        $name = $row['name'];
        $email = $row['email'];
        $total_qr = $row['totalqr'];
        $total_hit = $row['totalhit'];
        $password_required = "";
    }else{
        redirect('users.php');
    }
}

if(isset($_POST['submit'])){
    $name = getSafeValue($_POST['name']);
    $email = getSafeValue($_POST['email']);
    $password = password_hash(getSafeValue($_POST['password']),PASSWORD_DEFAULT);
    $total_qr = getSafeValue($_POST['total_qr']);
    $total_hit = getSafeValue($_POST['total_hit']);

    $email_sql="";
    if($id>0){
        $email_sql = " and id!='$id'";
    }

    $res = mysqli_query($con,"select * from users where email='$email'$email_sql");
    if(mysqli_num_rows($res)>0){
        $msg = "email already exist";
    }else{
        if($id>0){
            $password_sql = "";
            if($password!=''){
                $password_sql = ",password='$password'";
            }
            mysqli_query($con, "update users set name='$name',email='$email',totalqr='$total_qr',totalhit='$total_hit' $password_sql where id='$id'");
            redirect("users.php");
        }else{
            $status=1;
            $role=1;
            $date=date('Y-m-d h:i:s');
            mysqli_query($con, "insert into users(name,email,password,totalqr,totalhit,role,status,addedon) values ('$name','$email','$password','$total_qr','$total_hit','$role','$status','$date')");
            redirect("users.php");
        }
    }
}

?>


<?php
require('container/navigation.php');
?>

<section class="forma_section">
    <div class="container form_container">
        <h2>Manage User</h2>
        <div class="form">
            <form action="" method="POST">
                <div>
                    <label>Name<span>*</span></label>
                    <input type="text" name="name" placeholder="Name" required value="<?php echo $name ?>">
                </div>
                <div>
                    <label>Email<span>*</span></label>
                    <input type="email" name="email" placeholder="Email" required value="<?php echo $email ?>">
                </div>
                <div>
                    <label>Password<span>*</span></label>
                    <input type="password" name="password" autocomplete="new-password" placeholder="Password" <?php echo $password_required ?> >
                </div>
                <div>
                    <label>Total QR</label>
                    <input type="number" name="total_qr" placeholder="Total QR" value="<?php echo $total_qr ?>">
                </div>
                <div>
                    <label>Total Hit</label>
                    <input type="number" name="total_hit" placeholder="Total Hit" value="<?php echo $total_hit ?>">
                </div>
                <p class="message"><?php echo $msg?></p>
                <button type="submit" name="submit" class="btn btn_primary">Submit</button>
            </form>
        </div>
    </div>
</section>


<?php
require('container/footer.php');
?>