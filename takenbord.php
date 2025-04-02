<!doctype html>
<html lang="nl">
<?php
session_start();

if (!(isset($_SESSION['user_id']) && $_SESSION['user_id'] != '')) {
    header ("Location: ../login/login.php?msg=Voor deze pagina moet je ingelogd zijn");
}

require_once 'config/conn.php';

$user_id = $_SESSION['user_id']; 

$query = "SELECT * FROM tasks WHERE user = :user ORDER BY id DESC";
$statement = $conn->prepare($query);
$statement->execute([":user" => $user_id]);
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
            <a class="link" href="tasks/create.php">Nieuwe Ticket</a>
        </div>

        <table border="1">
            <tr>
                <th>Titel</th>
                <th>Afdeling</th>
                <th>gebruiker</th>
                <th>Prioriteit</th>
                <th>Taak</th>
                <th>Status</th>
                <th>deadline</th>
                <th>Opties</th>
            </tr>
            <?php if (!empty($tasks)): ?>
                <?php foreach ($tasks as $task): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($task['title']); ?></td>
                        <td><?php echo htmlspecialchars($task['department']); ?></td>
                        <td><?php echo htmlspecialchars($task['user']); ?></td>
                        <td>
                            <?php 
                            // Vertaalt het naar nederlands (te lui om database aan te passen)
                            $priorities = [
                                'Low' => 'Laag',
                                'Normal' => 'Normaal',
                                'High' => 'Hoog'
                            ];
                            echo isset($priorities[$task['priority']]) ? $priorities[$task['priority']] : $task['priority'];
                            ?>
                        </td>
                        <td><?php echo htmlspecialchars($task['description']); ?></td>
                        <td>
                            <?php 
                            // Zelfde verhaal
                            $statuses = [
                                'Todo' => 'Te doen',
                                'Doing' => 'Bezig',
                                'Done' => 'Klaar'
                            ];
                            echo isset($statuses[$task['status']]) ? $statuses[$task['status']] : $task['status'];
                            ?>
                        </td>
                        <td style="color: <?php echo (!empty($task['deadline']) && strtotime($task['deadline']) < time()) ? 'red' : 'black'; ?>">
                            <?php 
                                echo !empty($task['deadline']) ? 
                                    htmlspecialchars(date("d-m-Y", strtotime($task['deadline']))) : 
                                    "Geen deadline"; 
                            ?>
                        </td>

                        </td>


                        <td>
                            <a href="tasks/edit.php?id=<?php echo $task['id']; ?>">Verander Ticket</a>
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
    </div>
</body>

</html>