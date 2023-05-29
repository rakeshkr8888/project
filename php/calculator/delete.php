<?php
require('database.php');
require('function.php');
islogin();
if(isset($_POST['delete'])){
    $id=getSafeValue($_POST['id']);
    $user_id=$_SESSION['user_id'];
    $res = mysqli_query($conn, "select * from calculation where id='$id'");
    $row=mysqli_fetch_assoc($res);
    if($row['user_id']==$user_id){
        $res = mysqli_query($conn, "delete from calculation where id='$id'");
        if($res){
            // echo "deleted successfully";
            redirect('dashboard.php');
            exit();
        }else{
            // echo "something went wrong";
            redirect('dashboard.php');
            exit();
        }
    }else{
        // echo "userid does not match";
        redirect('dashboard.php');
        exit();
    }
}else{
    // echo "post reqest is accepted";
    redirect('dashboard.php');
    exit();
}
?>