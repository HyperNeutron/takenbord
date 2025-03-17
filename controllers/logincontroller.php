<?php
session_start();

require_once "../config/conn.php";

if ($_POST["action"] == "register") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users(username, password, email) VALUES(:username, :password, :email)"; 

    $statement = $conn->prepare($query); 

    $statement->execute([
        ":username" => $username,
        ":password" => $password,
        ":email" => $email,
    ]);

    $query = "SELECT * FROM users WHERE :username = username"; 
    $statement = $conn->prepare($query); 
    $statement->execute([
        ":username" => $username,
    ]);

    $user = $statement->fetch(PDO::FETCH_ASSOC);

    $_SESSION["user_id"] = $user["id"];

    header("location: ../index.php");
}
elseif ($_POST["action"] == "login"){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM users WHERE username = :username"; 

    $statement = $conn->prepare($query); 
    $statement->execute([
        ":username" => $username,
    ]);

    if ($statement->rowCount() < 1) {
        die("Error: account bestaat niet");
    }

    $user = $statement->fetch(PDO::FETCH_ASSOC);
    
    if (!password_verify($password, $user['password'])) {
    
        die("Error: wachtwoord niet juist!");
    }

    $_SESSION["user_id"] = $user["id"];

    header("location: ../index.php?msg=logged in");
}