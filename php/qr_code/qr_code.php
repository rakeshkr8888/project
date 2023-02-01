<?php
require('container/header.php');
$msg = "";
islogin();
$is_admin=true;
$condition ='';
if($_SESSION['user_role']==1){
    $is_admin = false;
    $condition = " and qrcode.addedby=".$_SESSION['user_id'];
}

if(isset($_GET['status']) && $_GET['status']!='' && isset($_GET['id']) && $_GET['id']>0){
    $status = getSafeValue($_GET['status']);
    $id = getSafeValue($_GET['id']);
    if($status=="active"){
        $status = 1;
    }else{
        $status = 0;
    }
    mysqli_query($con, "update qrcode set status='$status' where id='$id' $condition");
    redirect("qr_code.php");
}

if(isset($_GET['type']) && $_GET['type']=="download"){
    $link="https://chart.googleapis.com/chart?cht=qr&chco=".$_GET['chco']."&chs=".$_GET['chs']."&chl=".$_GET['chl'];
    echo $link;
    header('content-type:application/x-file-to-save');
    header('content-Disposition:attachment;filename=' . time() . '.jpg');
    ob_end_clean();
    readfile($link);
    redirect("qr_code.php");
}

$res = mysqli_query($con, "select qrcode.* from qrcode,users where qrcode.addedby=users.id $condition order by qrcode.addedon desc");


?>


<?php
require('container/navigation.php');
?>


<section class="table">
        <div class='container table_container'>
            <h2>QR Table</h2>
            <a href="manage_qr_code.php" class="btn btn_primary">Add QR</a>
            <div class="table_content">
                <table>
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>QR code</th>
                            <th>Link</th>
                            <th>Size</th>
                            <th>Color</th>
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
                            $get_user_info = getUserInfo($row['addedby']);
                            ?>
                            
                        <tr>
                            <td><?php echo $i++ ?></td>
                            <td>
                                <?php echo $row['name'] ?>
                                <?php
                                if($_SESSION['user_role']==0){ ?>
                                    
                                    <p><?php echo $get_user_info['email']?></p>
                                <?php } 
                                ?>
                                <a href="report.php?id=<?php echo $row['id']?>" class="btn_table">Report</a>
                            </td>
                            <td style="display:flex;flex-direction:column; align-items: center;">
                                <a href="https://chart.googleapis.com/chart?cht=qr&chco=<?php echo $row['color']?>&chs=<?php echo $row['size']?>&chl=<?php echo $qr_file_path?>?id=<?php echo $row['id']?>"  target="_blank"><img src="https://chart.googleapis.com/chart?cht=qr&chco=<?php echo $row['color']?>&chs=<?php echo $row['size']?>&chl=<?php echo $qr_file_path?>?id=<?php echo $row['id']?>" style="width:4rem"></a>
                                <a class="btn_table" href="?type=download&chco=<?php echo $row['color']?>&chs=<?php echo $row['size']?>&chl=<?php echo $qr_file_path?>?id=<?php echo $row['id']?>">Download</a>
                            </td>
                            <td><?php echo $row['link'] ?></td>
                            <td><?php echo $row['size'] ?></td>
                            <td><?php echo $row['color']."  "?><span style="background: <?php echo "#".$row['color'] ?>;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
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
                                <a class="btn_table" href="manage_qr_code.php?id=<?php echo $row['id']?>">Edit</a>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    <?php }else{
                        $msg = "No data found";
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