<?php
$title = isset($_POST['title']) ? $_POST['title'] : '';
$description = isset($_POST['description']) ? $_POST['description'] : '';
$department = isset($_POST['department']) ? $_POST['department'] : '';
$status = isset($_POST['status']) ? $_POST['status'] : 'TODO'; // Default status to 'TODO'
$priority = isset($_POST['priority']) ? $_POST['priority'] : 'Normal'; // Default priority if not set


require_once '/../config/conn.php';

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

    header("location: ../index.php");
    exit();
} catch (PDOException $e) {
    // Show error message if something goes wrong
    die("Error: " . $e->getMessage());
}
?>
