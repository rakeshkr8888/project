<?php
include("database.php");
require("function.php");

islogin();

$answer=0;
$expression="";
$msg="";
$math_string ="";



if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['store']) ){
    if(empty($_POST['name'])){
        $expression=$expression;
        $msg="give name to the calculation";
    }else if(empty($_POST['solve'])){
        $msg="expression can not be empty";
    }else{
        $name=getSafeValue($_POST['name']);
    $result=getSafeValue($_POST['answer']);
    $store_expression=getSafeValue($_POST['solve']);
   
               $id=$_SESSION['user_id'];
            //    echo $expression;
               $sql = "INSERT INTO calculation (user_id, name, expression, result) VALUES ('$id','$name','$store_expression', '$result')";
               if (mysqli_query($conn, $sql)) {
                // echo "New record created successfully";
                redirect("dashboard.php");
                exit();
            } else {
                // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                redirect('dashboard.php');
                exit();
            }
    }
}

else if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['edit'])){
    $edit_expression=getSafeValue($_POST['expression']);
    $expression=$edit_expression;
}

else if($_SERVER['REQUEST_METHOD'] == "POST"){
    foreach($_POST as $key=>$value){
        if($key=="equal"){
            // $str="print(".$expression.");";
            $math_string="print(".$expression.");";
            // $answer=eval($str);
            // echo "answer called  ".$answer;
        }
        else if($key=="ce"){
            $expression=substr($expression, 0, -1);
            // echo"ce called";
        }else if($key=="c"){
            $expression="";
            $answer=0;
            // echo "c is called";
        }else{
            if($_POST['answer']=='' && $key!="answer"){
                // echo "1key=".$key." and value ".$value."  ";
                $expression=$expression.$value;
                // echo"value called  ".$expression."  ";
            }
            else if($_POST['answer']!='' && $key!="solve"){
                // echo "2key=".$key." and value ".$value."  ";
                if($key=="answer"){
                    $expression=="";
                }
                $expression=$expression.$value;
                // echo " ".$expression."   ";
            }
        }
    }


}else{
    $msg="post request is accepted only";
}




?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- style css-->
    <link rel="stylesheet" href="css/dashboard.css">

    <!-- font family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- ========== icons scout ===============-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">

        <title>Calculator</title>
    </head>
<body>

    <nav>
        <div class="container nav_container">
            <ul>
                
                    <li><a href="logout.php" class="btn">Logout</a></li>
            </ul>
        </div>
    </nav>

<section class="calculator">
    <h3>My Calculator</h3>
    <div class="container calculator_container">

    
<div class="left">
    <form method="post" action="dashboard.php">

    <div class="info">
        <div>
            <label for="solve">Expression: </label>
            <input type="text" name="solve" placeholder="expression eg. 2*(2+9)"  value="<?php echo $expression;?>">
        </div>
        <div>
            <label for="answer">Answer: </label>
            <input type="text" name="answer" placeholder="answer" id="nameValidation" value="<?php eval($math_string);  ?>">
        </div>
    </div>

    <table>
        <tr>
            <td><input type="submit" name="ce" value="CE"/></td>
            <td><input type="submit" name="c" value="C"/></td>
            <td><input type="submit" name="opening_parenthesis" value="("></td>
            <td><input type="submit" name="divide" value="/"></td>
        </tr>
        <tr>
            <td><input type="submit" name="7" value="7"/></td>
            <td><input type="submit" name="8" value="8"/></td>
            <td><input type="submit" name="9" value="9"/></td>
            <td><input type="submit" name="multiply" value="*"/></td>
        </tr>
        <tr>
            <td><input type="submit" name="4" value="4"/></td>
            <td><input type="submit" name="5" value="5"/></td>
            <td><input type="submit" name="6" value="6"/></td>
            <td><input type="submit" name="minus" value="-"/></td>
        </tr>
        <tr>
            <td><input type="submit" name="1" value="1"/></td>
            <td><input type="submit" name="2" value="2"/></td>
            <td><input type="submit" name="3" value="3"/></td>
            <td><input type="submit" name="add" value="+"/></td>
        </tr>
        <tr>
            <td><input type="submit" name="closing_parenthesis" value=")"></td>
            <td><input type="submit" name="zero" value="0"/></td>
            <td><input type="submit" name="." value="."/></td>
            <td><input type="submit" name="equal" value="="/></td>
        </tr>
    </table>
    <div class="store">
        <input type="text" name="name" placeholder="enter name to store">
        <button class="btn_primary btn " type="submit" name="store">save</button>
    </div>
    </form>

</div>

<div class="right">
    <div class="table_container">
        <table>
            <thead>
                <tr>
                    <th>S no.</th>
                    <th>Name</th>
                    <th>Expression</th>
                    <th>Result</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $id=$_SESSION['user_id'];
                $historys = mysqli_query($conn, "SELECT * FROM calculation where user_id='$id' order by created_at desc" );
                $i=1;
                if(mysqli_num_rows($historys)>0){

                
                while($rows = mysqli_fetch_array($historys)){

                    ?>
                        
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $rows['name']; ?></td>
                    <td><?php echo $rows['expression']; ?></td>
                    <td><?php echo $rows['result']; ?></td>
                    <td>
                        <form action="dashboard.php" method="post">
                            <input type="hidden" name="expression" value="<?php echo $rows['expression']?>">
                            <button type="submit" name="edit"><i class="uil uil-edit"></i></button>
                        </form>
                        <form action="delete.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $rows['id']?>">
                            <button type="submit" name="delete"><i class="uil uil-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
                <?php
                }
            }else{
                ?><p>No data found</p><?php
            }

                ?>

                
                
            </tbody>
        </table>
    </div>
</div>



</div>

</section>
</body>

</html>