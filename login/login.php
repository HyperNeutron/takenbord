<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once  "../components/head.php"; ?>
    <title>login</title>
</head>

<body>
    <?php require_once "../components/header.php" ?>
    <div class="container">
        <h1>Inloggen</h1>
        <?php if (isset($_GET["msg"])): ?>
            <div class="error">
                <?php echo $_GET["msg"]; ?>
            </div>
        <?php endif ?>
        <a class="link" href="register.php">Nog geen account?</a>
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
            <input type="submit" value="Inloggen">
        </form>
    </div>
</body>

</html>