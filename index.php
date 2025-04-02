<?php
session_start();
?>
<!doctype html>
<html lang="nl">

<head>
    <?php require_once "components/head.php" ?>
    <title>Takenbord</title>
</head>

<body>
    <?php require_once "components/header.php" ?>
    <div class="container">
        <h1>Takenbord</h1>
        <div>
            <a class="link" href="login/login.php">Inloggen</a> |
            <a class="link" href="takenbord.php">Takenbord</a>
        </div>
    </div>
</body>

</html>