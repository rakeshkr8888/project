<?php
require_once 'includes/header.php';
?>

<section class="form">
    <div class="container form_container">
        <form class="form" action="includes/register-inc.php" method="POST">
            <input type="text" name="username" placeholder="Username">
            <input type="text" name="password" placeholder="password">
            <input type="text" name="confirmpassword" placeholder="Confirm password">
            <button type="submit" name="submit">SUBMIT</button>
        </form>
    </div>
</section>

<?php
require_once 'includes/footer.php';
?>