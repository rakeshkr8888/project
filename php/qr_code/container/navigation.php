<?php
$url=( $_SERVER['SCRIPT_NAME']);
$url_arr = explode('/',$url);
$url = end($url_arr);

$user_selected = '';
if($url=='users.php' || $url=='manage_users.php'){
    $user_selected = 'active';
}

$qr_code_selected = '';
if($url=="qr_code.php" || $url=='manage_qr_code.php' || $url=='report.php' || $url=='detail_report.php'){
    $qr_code_selected = 'active';
}

$profile_selected = '';
if($url=='profile.php'){
    $profile_selected = 'active';
}

?>
</head>

<body>

    <nav>
        <div class="container nav_container">
            <div class="nav_items_container">
                <ul class="nav_items">
                    <li>
                        <h3><?php echo $_SESSION['user_name'] ?></h3>
                        <p><?php
                            if($_SESSION['user_role']==1){
                            echo "User";
                            }else{
                            echo "Admin";
                            }
                         ?></p>
                    </li>
                    <li>
                        <a href="profile.php" class="<?php echo $profile_selected ?>">
                            <span><i class="uil uil-user-circle"></i></i></span>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="qr_code.php" class='<?php echo $qr_code_selected?>'>
                            <span><i class="uil uil-qrcode-scan"></i></span>
                            <span>QR Code</span>
                        </a>
                    </li>
                    <?php 
                    if($_SESSION['user_role']==0){
                        ?>
                       
                    <li >
                        <a href="users.php" class="<?php echo $user_selected ?>">
                            <span><i class="uil uil-user"></i></span>
                            <span>User</span>
                        </a>
                    </li>
                    <?php
                    }
                    ?>
                    <li>
                        <a href="logout.php">
                            <span><i class="uil uil-signout"></i></span>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
                <div class="nav_menu_btn">
                    <span><i class="uil uil-bars"></i><span>
                </div>
            </div>
            <div class="Welcome">
                <h4>Welcome <?php echo $_SESSION['user_name'] ?></h4>
            </div>
        </div>
    </nav>
    <!-- ================== END OF NAVBAR =====================  -->

