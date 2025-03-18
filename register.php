<!DOCTYPE html>
<html lang="en">
<?php session_start() ?>

<head>
    <?php require_once "components/head.php"; ?>
    <title>registratie</title>
</head>

<body>
    <?php require_once "components/header.php" ?>
    <div class="container">
        <h1>Registreren</h1>
        <?php if (isset($_GET["msg"])): ?>
            <div class="error">
                Kan account niet maken:<br>
                <?php echo $_GET["msg"]; ?>
            </div>
        <?php endif ?>
        <form action="controllers/logincontroller.php" method="post">
            <input type="hidden" name="action" value="register">
            <div class="formgroup">
                <label for="username">gebruikersnaam</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div class="formgroup">
                <label for="email">email</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="formgroup">
                <label for="password">wachtwoord</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div class="formgroup">
                <label for="passwordcheck">herhaal wachtwoord</label>
                <input type="password" name="passwordcheck" id="passwordcheck" required>
            </div>
            <input type="submit" value="registreren">
        </form>
    </div>
</body>

</html>