<?php
require_once '../config/conn.php';

$action = isset($_POST['action']) ? $_POST['action'] : '';
// Handle Create
if ($action == "create") {
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';
    $department = isset($_POST['department']) ? $_POST['department'] : '';
    $priority = isset($_POST['priority']) ? (int) $_POST['priority'] : 2;
    
    // Always set status to "TODO" for new tasks
    $status = "TODO";

    if (empty($title) || empty($description)) {
        die("Vul alle verplichte velden in!");
    }

    try {
        $query = "INSERT INTO tasks (title, description, priority, department, status) 
                  VALUES(:title, :description, :priority, :department, :status)";
        $statement = $conn->prepare($query);
        $statement->execute([
            ":title" => $title,
            ":description" => $description,
            ":priority" => $priority,
            ":department" => $department,
            ":status" => $status
        ]);

        header("Location: ../index.php?msg=Taak toegevoegd");
        exit();
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}

// Handle Edit (Update)
if ($action == "edit") {
    $id = isset($_POST['id']) ? (int) $_POST['id'] : 0;
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';
    $department = isset($_POST['department']) ? $_POST['department'] : '';
    $status = isset($_POST['status']) ? $_POST['status'] : 'TODO';
    $priority = isset($_POST['priority']) ? (int) $_POST['priority'] : 2;

    if (empty($title) || empty($description)) {
        die("Vul alle verplichte velden in!");
    }

    try {
        $query = "UPDATE tasks SET title = :title, description = :description, priority = :priority, department = :department, status = :status WHERE id = :id";
        $statement = $conn->prepare($query);
        $statement->execute([
            ":id" => $id,
            ":title" => $title,
            ":description" => $description,
            ":priority" => $priority,
            ":department" => $department,
            ":status" => $status
        ]);

        header("Location: ../index.php?msg=Bericht aangepast");
        exit();
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}

// Handle Delete
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

// If no valid action is given
die("Ongeldige actie!");
