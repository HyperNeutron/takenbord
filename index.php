<!doctype html>
<html lang="nl">
<?php session_start() ?>

<?php require_once "components/head.php" ?>

<body>
    <h1>Takenbord</h1>
    <div>
        <a href="login.php">inloggen</a>
        <a href="create.php">Nieuwe Ticket</a>
    </div>
    <div>
        <p>
            <?php if (isset($_GET["msg"])) {
                echo $_GET["msg"];
            } ?>
        </p>
    </div>
</body>

</html>