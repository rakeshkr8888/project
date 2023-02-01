<?php
require('container/header.php');
islogin();
$condition='';
if(isset($_GET['id']) && $_GET['id']>0){
    $id = getSafeValue($_GET['id']);

    if($_SESSION['user_role']==1){
        $condition=" and qrcode.addedby=".$_SESSION['user_id'];
    }

    $res = mysqli_query($con, "select * from qrcode where id='$id' $condition");

    if(mysqli_num_rows($res)>0){
        $count_res = mysqli_query($con, "select count(*) as total_record,qrtraffic.* from qrtraffic,qrcode where qrtraffic.qrcodeid=qrcode.id and qrcode.id='$id' $condition group by qrtraffic.addedonstr");
        
        if(mysqli_num_rows($count_res)>0){
            while($count_row=mysqli_fetch_assoc($count_res)){
                $arr[] = $count_row;
            }

            $count = 0;
            foreach($arr as $val){
                $count=$count+$val['total_record'];
            }

            //pie chart
            $res_device = mysqli_query($con, "select count(*) as total_record,qrtraffic.device from qrtraffic,qrcode where qrtraffic.qrcodeid=qrcode.id and qrcode.id='$id' group by qrtraffic.device");
            
            while($row_device = mysqli_fetch_assoc($res_device)){
                $arr_device[] = $row_device;
            }

            $res_os = mysqli_query($con, "select count(*) as total_record, qrtraffic.os from qrtraffic,qrcode where qrtraffic.qrcodeid=qrcode.id and qrcode.id='$id' group by qrtraffic.os");
            
            while($row_os = mysqli_fetch_assoc($res_os)){
                $arr_os[] = $row_os;
            }

            $res_browser = mysqli_query($con, "select count(*) as total_record, qrtraffic.browser from qrtraffic,qrcode where qrtraffic.qrcodeid=qrcode.id and qrcode.id='$id' group by qrtraffic.browser");
            
            while($row_browser = mysqli_fetch_assoc($res_browser)){
                $arr_browser[] = $row_browser;
            }
            
        }else{
            die("no data present");
        }
        

    }else{
        redirect('qr_code.php');
    }
}else{
    redirect('qr_code.php');
}

?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load("current", { packages: ["corechart"] });
    google.charts.setOnLoadCallback(drawDeviceChart);
    function drawDeviceChart() {
        var data = google.visualization.arrayToDataTable([
            ['Device', 'Customer'],
            <?php
            foreach($arr_device as $data){
                echo "['" . $data['device'] . "', " . $data['total_record'] . "],";
            }
            ?>
        ]);

        var options = {
            title: 'Device',
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('device'));
        chart.draw(data, options);
    }
</script>

<script type="text/javascript">
    google.charts.load("current", { packages: ["corechart"] });
    google.charts.setOnLoadCallback(drawOSChart);
    function drawOSChart() {
        var data = google.visualization.arrayToDataTable([
            ['Name', 'OS users'],
            <?php 
            foreach($arr_os as $data){
                echo "['" . $data['os'] . "', " . $data['total_record'] . "],";
            }
            ?>
        ]);

        var options = {
            title: 'OS',
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('os'));
        chart.draw(data, options);
    }
</script>

<script type="text/javascript">
    google.charts.load("current", { packages: ["corechart"] });
    google.charts.setOnLoadCallback(drawBrowserChart);
    function drawBrowserChart() {
        var data = google.visualization.arrayToDataTable([
            ['Name', 'user'],
            <?php
            foreach($arr_browser as $data){
                echo "['" . $data['browser'] . "', " . $data['total_record'] . "],";
            }
            ?>
        ]);

        var options = {
            title: 'Browser',
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('browser'));
        chart.draw(data, options);
    }
</script>

<?php
require('container/navigation.php');
?>

<section class="report">
    <div class="container report_container">
        <h2>Report</h2>
        <div>
            <a href="detail_report.php?id=<?php echo $id?>" class="btn_table">Detail Report</a>
            <h3> COUNT=<?php echo $count?></h3>
        </div>
        <div class="report_graph">
            <div id="device"></div>
            <div id="os"></div>
            <div id="browser"></div>
        </div>
        <h3>Traffic per Day</h3>
        <div class="table_content">
            <table>
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Date</th>
                        <th>Total Hit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach($arr as $data){
                        ?>
                    <tr>
                        <td><?php echo $i++ ?></td>
                        <td><?php echo $data['addedonstr'] ?></td>
                        <td><?php echo $data['total_record'] ?></td>
                    </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>

    </div>
    </div>
</section>

<?php
require('container/footer.php');
?>