<div>
    <nav>
        <a href="index.php">Home</a>
        <a href=""></a>
        <a href=""></a>
        <?php if(isset($_SESSION["user_id"])): ?>
        <a href="index.php">uitloggen</a>
        <?php else: ?>
        <a href="login.php">inloggen</a>
        <?php endif ?>
    </nav>
</div>