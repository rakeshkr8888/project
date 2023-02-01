<?php
require_once 'includes/header.php';
?>

<section class="form">
    <div class="container form_container">
        <form class="form" action="includes/login-inc.php" method="POST">
            <input type="text" name="username" placeholder="Username">
            <input type="text" name="password" placeholder="password">
            <button type="submit" name="submit" class="btn btn_primary">SUBMIT</button>
        </form>
    </div>
</section>

<?php
require_once 'includes/footer.php';
?>