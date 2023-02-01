<?php
require('container/header.php');

islogin();
$msg = "";
$name = "";
$link = "";
$color = "";
$size = "";
$id = 0;
$is_admin = true;
$condition='';
if($_SESSION['user_role']==1){
    $condition=" and qrcode.addedby=".$_SESSION['user_id'];
}

if($_SESSION['user_role']==1){
    $is_admin = false;
}

if(isset($_GET['id']) && $_GET['id']>0){
    $id = getSafeValue($_GET['id']);

    $res = mysqli_query($con, "select * from qrcode where id='$id' $condition");
    if(mysqli_num_rows($res)>0){
        $row = mysqli_fetch_assoc($res);
        $name = $row['name'];
        $link = $row['link'];
        $color = $row['color'];
        $size = $row['size'];
    }else{
        redirect('qr_code.php');
    }
}

if(isset($_POST['submit'])){
    $name = getSafeValue($_POST['name']);
    $link = getSafeValue($_POST['link']);
    $color = getsafevalue($_POST['color']);
    $size = getSafeValue($_POST['size']);

    if($id>0){
        mysqli_query($con, "update qrcode set name='$name',link='$link',color='$color',size='$size' where id='$id' $condition");
        redirect('qr_code.php');
    }else{
        $added_by=$_SESSION['user_id'];
        $status=1;
        $date=date('Y-m-d h:i:s');
        mysqli_query($con, "insert into qrcode (name,link,color,size,addedby,status,addedon) values ('$name','$link','$color','$size','$added_by','$status','$date')");
        redirect('qr_code.php');
    }
}

?>


<?php
require('container/navigation.php');
?>

<section class="forma_section">
    <div class="container form_container">
        <h2>Manage QR Code</h2>
        <div class="form">
            <form action="" method="POST">
                <div>
                    <label>Name<span>*</span></label>
                    <input type="text" name="name" placeholder="Name" required value="<?php echo $name ?>">
                </div>
                <div>
                    <label>Link<span>*</span></label>
                    <input type="text" name="link" placeholder="Link" required value="<?php echo $link ?>">
                </div>
                <div>
                    <label>Color<span>*</span></label>
                    <select name="color" required>
                        <option value="">Select color</option>
                        <?php
                        $res_color = mysqli_query($con, "select * from color where status='1' order by color asc");
                        while($row_color=mysqli_fetch_assoc($res_color)){
                            $is_selected='';
                            if($color==$row_color['color']){
                                $is_selected = "selected";
                            }
                            echo "<option ". "value='".$row_color['color'] . "' ". $is_selected . ">" . $row_color['color'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <label>Size<span>*</span></label>
                    <select required name="size">
                        <option value="">Select size</option>
                        <?php
                        $res_size=mysqli_query($con,"select * from size where status=1 order by size asc");
                        while($row_size=mysqli_fetch_assoc($res_size)){
                            $is_selected = '';
                            if($size==$row_size['size']){
                                $is_selected = 'selected';
                            }
                            echo "<option " . "value='" . $row_size['size'] . "' " . $is_selected . ">" . $row_size['size'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <p class="message"><?php echo $msg?></p>
                <?php
                if($id==0 && !$is_admin){
                    $get_user_info = getUserInfo($_SESSION['user_id']);
                    $get_user_total_qr=getUserTotalQr($_SESSION['user_id']);
                    if ($get_user_info['totalqr'] > $get_user_total_qr['total_qr']){
                        ?>
                        <button type="submit" name="submit" class="btn btn_primary">Submit</button>
                        <?php
                    }else{
                        ?>
                        <p class="message">You can not create more QR</p>
                        <?php
                    }
                }else{
                    ?>
                    <button type="submit" name="submit" class="btn btn_primary">Submit</button>
                    <?php
                }
                ?>
            </form>
        </div>
    </div>
</section>


<?php
require('container/footer.php');
?>