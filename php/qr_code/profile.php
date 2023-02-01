<?php
require('container/header.php');
islogin();

$id=$_SESSION['user_id'];
$row = getUserInfo($_SESSION['user_id']);
$name = $row['name'];
$email = $row['email'];
$total_qr = $row['totalqr'];
$total_hit = $row['totalhit'];

if(isset($_POST['submit'])){
    $name = getSafeValue($_POST['name']);
    $password = getSafeValue($_POST['password']);
    
    $password_sql = '';
    if($password!=''){
        $password = password_hash($password, PASSWORD_DEFAULT);
        $password_sql =",password='$password'";
    }
    mysqli_query($con, "update users set name='$name'$password_sql where id='$id'");
}

?>


<?php
require('container/navigation.php');
?>

<section class="forma_section">
    <div class="container form_container">
        <h2>Profile</h2>
        <div class="form">
            <form action="" method="POST">
                <div>
                    <label>Name<span></span></label>
                    <input type="text" name="name" placeholder="Name" required value="<?php echo $name ?>">
                </div>
                <div>
                    <label>Email<span></span></label>
                    <input type="email" name="email" placeholder="Email" required value="<?php echo $email ?>" disabled>
                </div>
                <div autocomplete="false">
                    <label>Password<span></span></label>
                    <input type="password" name="password"   placeholder="Password" autocomplete="new-password" >
                </div>
                <?php 
                if($_SESSION['user_role']==1){
                    ?>
                <div>
                    <label>Total QR</label>
                    <input type="number" name="total_qr" placeholder="Total QR" value="<?php echo $total_qr ?>" disabled>
                </div>
                <div>
                    <label>Total Hit</label>
                    <input type="number" name="total_hit" placeholder="Total Hit" value="<?php echo $total_hit ?>" disabled>
                </div>
                <?php
                }
                 ?>
                <button type="submit" name="submit" class="btn btn_primary">Submit</button>
            </form>
        </div>
    </div>
</section>


<?php
require('container/footer.php');
?>