<?php
session_start();

require_once '../config/conn.php';

$action = isset($_POST['action']) ? $_POST['action'] : '';


// Dit gaat over de creatie van een melding
if ($action == "create") {
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';
    $user = $_SESSION['user_id'];
    $department = isset($_POST['department']) ? $_POST['department'] : '';
    $priority = isset($_POST['priority']) ? (int) $_POST['priority'] : 2;
    
    $status = "TODO";

    if (empty($title) || empty($description)) {
        die("Vul alle verplichte velden in!");
    }

    try {
        $query = "INSERT INTO tasks (title, description, user, priority, department, status) 
                  VALUES(:title, :description, :user, :priority, :department, :status)";
        $statement = $conn->prepare($query);
        $statement->execute([
            ":title" => $title,
            ":description" => $description,
            ":user" => $user,
            ":priority" => $priority,
            ":department" => $department,
            ":status" => $status
        ]);
        header("Location: ../takenbord.php?msg=Taak toegevoegd");
        exit();
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}

// Dit gaat over het veranderen van een melding
if ($action == "edit") {
    $id = isset($_POST['id']) ? (int) $_POST['id'] : 0;
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';
    $user = $_SESSION['user_id'];
    $department = isset($_POST['department']) ? $_POST['department'] : '';
    $status = isset($_POST['status']) ? $_POST['status'] : 'TODO';
    $priority = isset($_POST['priority']) ? (int) $_POST['priority'] : 2;

    if (empty($title) || empty($description)) {
        die("Vul alle verplichte velden in!");
    }

    try {
        $query = "UPDATE tasks SET title = :title, description = :description, user = :user, priority = :priority, department = :department, status = :status WHERE id = :id";
        $statement = $conn->prepare($query);
        $statement->execute([
            ":id" => $id,
            ":title" => $title,
            ":description" => $description,
            ":user" => $user,
            ":priority" => $priority,
            ":department" => $department,
            ":status" => $status
        ]);
        header("Location: ../takenbord.php?msg=Bericht aangepast");
        exit();
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}

// Dit gaat over het verwijderen van een melding
if ($action == "delete") {
    $id = isset($_POST['id']) ? (int) $_POST['id'] : 0;

    if ($id == 0) {
        die("Ongeldige taak-ID");
    }

    try {
        $query = "DELETE FROM tasks WHERE id = :id";
        $statement = $conn->prepare($query);
        $statement->execute([
            ":id" => $id
        ]);

        header("Location: ../index.php?msg=Bericht verwijderd");
        exit();
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}

// Dit is voor als er iets niet goed ging
die("Ongeldige actie!");
