<div>
    <nav>
        <a href="index.php">Home</a>
        <?php if(isset($_SESSION["user_id"])): ?>
        <a href="logout.php">uitloggen</a>
        <?php else: ?>
        <a href="login.php">inloggen</a>
        <?php endif ?>
    </nav>
</div>