<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>

<head>
    <?php require_once  "../components/head.php"; ?>
    <title>login</title>
</head>

<body>
    <?php require_once "../components/header.php" ?>
    <div class="container">
        <h1>Inloggen</h1>
        <a class="link" href="register.php">Nog geen account?</a>
        <?php if (isset($_GET["msg"])): ?>
            <div class="error">
                <?php echo $_GET["msg"]; ?>
            </div>
        <?php endif ?>
        <form action="../controllers/logincontroller.php" method="post" class="login">
            <div class="formField">
                <input type="hidden" name="action" value="login">
                <div class="formgroup">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div class="formgroup">
                    <label for="password">Wachtwoord</label>
                    <input type="password" name="password" id="password" required>
                </div>
            </div>
            <input type="submit" value="inloggen">
        </form>
    </div>
</body>

</html>