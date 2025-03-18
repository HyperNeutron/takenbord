<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>

<head>
    <?php require_once "components/head.php"; ?>
    <title>login</title>
</head>

<body>
    <?php require_once "components/header.php" ?>
    <div class="container">
        <h1>Inloggen</h1>
        <a href="register.php">registreren</a>
        <?php if (isset($_GET["msg"])): ?>
            <div class="error">
                <?php echo $_GET["msg"]; ?>
            </div>
        <?php endif ?>
        <form action="controllers/logincontroller.php" method="post">
            <input type="hidden" name="action" value="login">
            <div class="formgroup">
                <label for="email">e-mail</label>
                <input type="text" name="email" id="email" required>
            </div>
            <div class="formgroup">
                <label for="password">wachtwoord</label>
                <input type="password" name="password" id="password" required>
            </div>
            <input type="submit" value="inloggen">
        </form>
    </div>
</body>

</html>