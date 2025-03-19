<header>
    <nav>
        <a href="<?php echo $base_url ?>/index.php">Home</a>
        <?php if(isset($_SESSION["user_id"])): ?>
        <a href="<?php echo $base_url ?>/login/logout.php">Uitloggen</a>
        <?php else: ?>
        <a href="<?php echo $base_url ?>/login/login.php">Inloggen</a>
        <?php endif ?>
    </nav>
</header>