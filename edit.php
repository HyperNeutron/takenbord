<?php
require_once 'config/conn.php';

require_once "components/head.php";
require_once "components/header.php";

// Kijkt of de ID in de link zit.
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Ongeldige taak-ID!");
}

$id = (int)$_GET['id'];

$query = "SELECT * FROM tasks WHERE id = :id";
$statement = $conn->prepare($query);
$statement->execute([":id" => $id]);
$task = $statement->fetch(PDO::FETCH_ASSOC);

if (!$task) {
    die("Taak niet gevonden!");
}
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taak Bewerken</title>
</head>

<body>
    <div class="container">
        <h2>Taak Bewerken</h2>

        <form action="controllers/taskcontroller.php" method="POST">
            <input type="hidden" name="action" value="edit">
            <div class="formGroupTask">
                <input type="hidden" name="id" value="<?= htmlspecialchars($task['id']) ?>">
            </div>

            <div class="formGroupTask">
                <label for="title">Titel:</label>
                <input type="text" name="title" value="<?= htmlspecialchars($task['title']) ?>" required>
            </div>

            <div class="formGroupTask">
                <label for="user">gebruiker:</label>
                <input type="user" name="user" value="<?= htmlspecialchars($task['user']) ?>" required>
            </div>

            <div class="formGroupTask">
                <label for="description">Omschrijving:</label>
                <textarea name="description"><?= htmlspecialchars($task['description']) ?></textarea>
            </div>

            <div class="formGroupTask">
                <label for="department">Afdeling:</label>
                <select name="department">
                    <option value="IT" <?= ($task['department'] == 'IT') ? 'selected' : '' ?>>IT</option>
                    <option value="HR" <?= ($task['department'] == 'HR') ? 'selected' : '' ?>>HR</option>
                    <option value="Finance" <?= ($task['department'] == 'Finance') ? 'selected' : '' ?>>Finance</option>
                </select>
            </div>

            <div class="formGroupTask">
                <label for="priority">Prioriteit:</label>
                <select name="priority">
                    <option value="1" <?= ($task['priority'] == 1) ? 'selected' : '' ?>>Hoog</option>
                    <option value="2" <?= ($task['priority'] == 2) ? 'selected' : '' ?>>Normaal</option>
                    <option value="3" <?= ($task['priority'] == 3) ? 'selected' : '' ?>>Laag</option>
                </select>
            </div>

            <div class="formGroupTask">
                <label for="status">Status:</label>
                <select name="status">
                    <option value="To do" <?= ($task['status'] == 'Todo') ? 'selected' : '' ?>>TODO</option>
                    <option value="Doing" <?= ($task['status'] == 'Doing') ? 'selected' : '' ?>>Bezig</option>
                    <option value="Done" <?= ($task['status'] == 'Done') ? 'selected' : '' ?>>Klaar</option>
                </select>
            </div>

            <div class="formGroupTask">
                <button type="submit">Opslaan</button>
            </div>
        </form>

        <form action="controllers/taskcontroller.php" method="POST" onsubmit="return confirm('Weet je zeker dat je deze taak wilt verwijderen?');">
            <div class="formGroupTask">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="id" value="<?= htmlspecialchars($task['id']) ?>">
                <button type="submit" style="background-color: red; color: white;">Verwijder</button>
            </div>
        </form>

        <br>
        <a href="index.php">Terug naar Takenlijst</a>
    </div>
</body>

</html>