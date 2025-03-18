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

<?php require_once "components/head.php" ?>
<?php require_once "components/header.php" ?>

<body>
    <h1>Takenbord</h1>
    <div>
        <a href="login.php">Inloggen |</a>
        <a href="create.php">Nieuwe Ticket</a>
    </div>

    <table border="1">
        <tr>
            <th>Titel</th>
            <th>Afdeling</th>
            <th>gebruiker</th>
            <th>Prioriteit</th>
            <th>Taak</th>
            <th>Status</th>
            <th>Acties</th>
        </tr>
        <?php if (!empty($tasks)): ?>
            <?php foreach($tasks as $task): ?>
                <tr>
                    <td><?php echo htmlspecialchars($task['title']); ?></td>
                    <td><?php echo htmlspecialchars($task['department']); ?></td>
                    <td><?php echo htmlspecialchars($task['user']); ?></td>
                    <td><?php echo htmlspecialchars($task['priority']); ?></td>
                    <td><?php echo htmlspecialchars($task['description']); ?></td>
                    <td><?php echo htmlspecialchars($task['status']); ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $task['id']; ?>">Verander Ticket</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">Geen taken gevonden.</td>
            </tr>
        <?php endif; ?>
    </table>

    <div>
        <p>
            <?php if (isset($_GET["msg"])) {
                echo htmlspecialchars($_GET["msg"]);
            } ?>
        </p>
    </div>
</body>
</html>
