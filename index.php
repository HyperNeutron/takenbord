<!doctype html>
<html lang="nl">
<?php
session_start();
require_once 'config/conn.php';

$query = "SELECT * FROM tasks ORDER BY id DESC";
$statement = $conn->prepare($query);
$statement->execute();
$tasks = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

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
            <a class="link" href="takenbord.php">takenbord</a>
        </div>
    </div>
</body>

</html>