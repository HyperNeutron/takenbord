<!DOCTYPE html>
<html lang="en">
<?php session_start() ?>
<?php require_once "components/head.php" ?>

<body>
    <form action="controllers/logincontroller.php" method="post">
        <input type="hidden" name="action" value="register">
        <div class="formgroup">
            <label for="username">gebruikersnaam</label>
            <input type="text" name="username" id="username">
        </div>
        <div class="formgroup">
            <label for="email">email</label>
            <input type="text" name="email" id="email">
        </div>
        <div class="formgroup">
            <label for="password">wachtwoord</label>
            <input type="password" name="password" id="password">
        </div>
        <div class="formgroup">
            <label for="passwordcheck">herhaal wachtwoord</label>
            <input type="password" name="passwordcheck" id="passwordcheck">
        </div>
        <input type="submit" value="sturen">
    </form>
</body>

</html>