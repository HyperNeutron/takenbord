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
}
