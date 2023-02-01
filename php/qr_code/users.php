<?php
require('container/header.php');
islogin();
isAdmin();

$msg = "";
if(isset($_GET['id']) && $_GET['id']>0 && isset($_GET['status']) && $_GET['status']!=''){
    $id = getSafeValue($_GET['id']);
    $status = getSafeValue($_GET['status']);
    if($status=="active"){
        $status = 1;
    }else{
        $status = 0;
    }

    mysqli_query($con, "update users set status='$status' where id='$id'");
    redirect('users.php');
}

if(isset($_SESSION['user_login']) && $_SESSION['user_login']!='' && isset($_SESSION['user_id']) && $_SESSION['user_id']>0){
    $res = mysqli_query($con, "select * from users where role='1' order by name asc");
}
?>






<?php
require('container/navigation.php');
?>


    <section class="table">
        <div class='container table_container'>
            <h2>User Table</h2>
            <a href="manage_users.php" class="btn btn_primary">Add User</a>
            <div class="table_content">
                <table>
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Totol Created/Total QR</th>
                            <th>Totol Hit used/Total Hit</th>
                            <th>Added On</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php
                    if(mysqli_num_rows($res)>0){ ?>
                        
                    
                    <tbody>
                        <?php
                        $i = 1;
                        while($row=mysqli_fetch_assoc($res)){
                            $get_user_total_qr = getUserTotalQr($row['id']);
                            $get_user_total_hit= getUserTotalhit($row['id']);
                            ?>
                        <tr>
                            <td><?php echo $i++ ?></td>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $get_user_total_qr['total_qr']?>/<?php echo $row['totalqr']?></td>
                            <td><?php echo $get_user_total_hit['total_hit']?>/<?php echo $row['totalhit']?></td>
                            <td><?php echo customDate($row['addedon'])?></td>
                            <td>
                                <?php
                                $status = "active";
                                $str_status = "deactive";
                                if($row['status']==1){
                                    $str_status = "active";
                                    $status = "deactive";
                                }
                                ?>
                                <a class="btn_table" href="?id=<?php echo $row['id']?>&status=<?php echo $status?>"><?php echo $str_status?></a>
                                <?php
                                ?>
                                <a class="btn_table" href="manage_users.php?id=<?php echo $row['id']?>">Edit</a>
                            </td>
                        </tr>
                            <?php }
                        ?>
                        
                    </tbody>
                    <?php } else{
                        $msg= "No data found";
                    }
                    ?>
                </table>
            </div>
            <p><?php echo $msg ?></p>
        </div>
    </section>



<?php
require('container/footer.php');
?>



