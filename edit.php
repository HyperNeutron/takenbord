<?php
require_once 'config/conn.php';

// Check if 'id' is in the URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Ongeldige taak-ID!");
}

$id = (int)$_GET['id']; // Convert to integer for security

// Fetch the task from the database
$query = "SELECT * FROM tasks WHERE id = :id";
$statement = $conn->prepare($query);
$statement->execute([":id" => $id]);
$task = $statement->fetch(PDO::FETCH_ASSOC);

// If no task is found
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
    <h2>Taak Bewerken</h2>

    <form action="taskcontroller.php" method="post">
        <input type="hidden" name="action" value="edit">
        <input type="hidden" name="id" value="<?= htmlspecialchars($task['id']) ?>">

        <label for="title">Titel:</label>
        <input type="text" name="title" value="<?= htmlspecialchars($task['title']) ?>" required>

        <label for="description">Omschrijving:</label>
        <textarea name="description"><?= htmlspecialchars($task['description']) ?></textarea>

        <label for="department">Afdeling:</label>
        <select name="department">
            <option value="IT" <?= ($task['department'] == 'IT') ? 'selected' : '' ?>>IT</option>
            <option value="HR" <?= ($task['department'] == 'HR') ? 'selected' : '' ?>>HR</option>
            <option value="Finance" <?= ($task['department'] == 'Finance') ? 'selected' : '' ?>>Finance</option>
        </select>

        <label for="priority">Prioriteit:</label>
        <select name="priority">
            <option value="1" <?= ($task['priority'] == 1) ? 'selected' : '' ?>>Hoog</option>
            <option value="2" <?= ($task['priority'] == 2) ? 'selected' : '' ?>>Normaal</option>
            <option value="3" <?= ($task['priority'] == 3) ? 'selected' : '' ?>>Laag</option>
        </select>

        <label for="status">Status:</label>
        <select name="status">
            <option value="TODO" <?= ($task['status'] == 'TODO') ? 'selected' : '' ?>>TODO</option>
            <option value="In Progress" <?= ($task['status'] == 'In Progress') ? 'selected' : '' ?>>Bezig</option>
            <option value="Done" <?= ($task['status'] == 'Done') ? 'selected' : '' ?>>Klaar</option>
        </select>

        <button type="submit">Opslaan</button>
    </form>

    <h3>Taak Verwijderen</h3>
    <form action="taskcontroller.php" method="post" onsubmit="return confirm('Weet je zeker dat je deze taak wilt verwijderen?');">
        <input type="hidden" name="action" value="delete">
        <input type="hidden" name="id" value="<?= htmlspecialchars($task['id']) ?>">
        <button type="submit" style="background-color: red; color: white;">Verwijder</button>
    </form>

    <br>
    <a href="../index.php">Terug naar Takenlijst</a>
</body>
</html>
