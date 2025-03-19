<header>
    <nav>
        <a href="<?php echo $base_url ?>/index.php">Home</a>
        <div>
            <?php if (isset($_SESSION["user_id"])): ?>
                <a href="<?php echo $base_url ?>/takenbord.php">Jouw takenbord</a> | 
                <a href="<?php echo $base_url ?>/login/logout.php">Uitloggen</a>
            <?php else: ?>
                <a href="<?php echo $base_url ?>/login/login.php">Inloggen</a>
            <?php endif ?>
        </div>
    </nav>
</header>