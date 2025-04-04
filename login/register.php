<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "../components/head.php"; ?>
    <title>registratie</title>
</head>

<body>
    <?php require_once "../components/header.php" ?>
    <div class="container">
        <h1>Registreren</h1>
        <?php if (isset($_GET["msg"])): ?>
            <div class="error">
                <b>Kan account niet aanmaken:</b><br>
                <?php echo $_GET["msg"]; ?>
            </div>
        <?php endif ?>
        <a class="link" href="login.php">Heb je al een account?</a>
        <form action="../controllers/logincontroller.php" method="post" class="register">
            <div class="formField">
                <input type="hidden" name="action" value="register">
                <div class="formgroup">
                    <label for="username">Gebruikersnaam</label>
                    <input type="text" name="username" id="username" required>
                </div>
                <div class="formgroup">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div class="formgroup">
                    <label for="password">Wachtwoord</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="formgroup">
                    <label for="passwordcheck">Herhaal wachtwoord</label>
                    <input type="password" name="passwordcheck" id="passwordcheck" required>
                </div>
            </div>
            <input type="submit" value="Registreren">
        </form>
    </div>
</body>

</html>