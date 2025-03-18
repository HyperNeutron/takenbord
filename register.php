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
        <form action="controllers/logincontroller.php" method="post">
            <input type="hidden" name="action" value="register">
            <div class="formgroup">
                <label for="username">gebruikersnaam</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div class="formgroup">
                <label for="email">email</label>
                <input type="text" name="email" id="email" required>
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