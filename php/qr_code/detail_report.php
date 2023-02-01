<?php
require('container/header.php');
islogin();
if(isset($_GET['id']) && $_GET['id']>0){
    $id = getSafeValue($_GET['id']);
    $condition = '';
    if($_SESSION['user_role']==1){
        $condition = " and qrcode.addedby=" . $_SESSION['user_id'];
    }

    if(mysqli_num_rows(mysqli_query($con,"select * from qrcode where id='$id' $condition"))>0){
        $res = mysqli_query($con, "select * from qrtraffic where qrcodeid='$id'");
        if(mysqli_num_rows($res)<=0){
            die("No data found");
        }
    }else{
        redirect('qr_code.php');
    }
}else{
    redirect("qr_code.php");
}
?>


<?php
require('container/navigation.php');
?>


    <section class="table">
        <div class='container table_container'>
            <h2>Detail Report Table</h2>
            <a href="report.php?id=<?php echo $id?>" class="btn_table">Go Back</a>
            <div class="table_content">
                <table>
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Device</th>
                            <th>OS</th>
                            <th>Browser</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Country</th>
                            <th>IP address</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        while($row=mysqli_fetch_assoc($res)){
                            ?>
                        <tr>
                            <td><?php echo $i++ ?></td>
                            <td><?php echo $row['device'] ?></td>
                            <td><?php echo $row['os'] ?></td>
                            <td><?php echo $row['browser']?></td>
                            <td><?php echo $row['city']?></td>
                            <td><?php echo $row['state']?></td>
                            <td><?php echo $row['country']?></td>
                            <td><?php echo $row['ipaddress']?></td>
                            <td><?php echo customDate($row['addedon'])?></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>



<?php
require('container/footer.php');
?>



