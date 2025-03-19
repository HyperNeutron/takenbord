<!doctype html>
<html lang="nl">
<?php session_start();

if (!(isset($_SESSION['user_id']) && $_SESSION['user_id'] != '')) {
    header ("Location: ../login.php");
}
?>
<head>
    <?php require_once "../components/head.php" ?>
    <title>Nieuwe taak</title>
</head>

<body>
    <?php require_once "../components/header.php" ?>
    <div class="container">
        <form action="../controllers/taskcontroller.php" method="post">
            <input type="hidden" name="action" value="create">
            <div class="formGroupTask">
                <label for="title">Titel:</label>
                <input type="text" name="title" required>
            </div>

            <div class="formGroupTask">
                <label for="department">Afdeling:</label><br>
            </div>

            <div class="formGroupTask">
                <select name="department" id="departments">
                    <option value="IT">IT</option>
                    <option value="HR">Human Resources</option>
                    <option value="Reception">Receptie</option>
                    <option value="Skibidi">Skibidi department</option>
                </select>
            </div>

            <div class="formGroupTask">
                <label for="priority">Prioriteit:</label><br>
                <select name="priority">
                    <option value="1">Laag</option>
                    <option value="2" selected>Normaal</option>
                    <option value="3">Hoog</option>
                </select>
            </div>

            <div class="formGroupTask">
                <label for="description">beschrijving:</label>
                <textarea name="description"></textarea>

                <button type="submit">Stuur melding</button>
        </form>
        </form>
    </div>
</body>

</html>