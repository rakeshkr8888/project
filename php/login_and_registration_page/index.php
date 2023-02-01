<?php
require_once 'includes/header.php';
?>
<?php
if(isset($_SESSION['sessionId'])){
    echo "welcome " . $_SESSION['sessionUser'];
}else{
    echo 'HOME';
}
?>
<?php
require_once 'includes/footer.php';
?>