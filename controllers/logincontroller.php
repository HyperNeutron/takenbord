<?php
session_start();

require_once "../config/conn.php";

if ($_POST["action"] == "register") {
    if(empty($_POST["username"])) {
        header("location: register.php?msg=Gebruikersnaam is niet ingevuld");
        exit;
    }
    if(empty($_POST["password"])){
        header("location: register.php?msg=Wachtwoord is niet ingevuld");
        exit;
    }
    if(empty($_POST["email"])){
        header("location: register.php?msg=Email is niet ingevuld");
        exit;
    }

    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users(username, password, email) VALUES(:username, :password, :email)"; 

    $statement = $conn->prepare($query); 

    if(!$statement->execute([
        ":username" => $username,
        ":password" => $password,
        ":email" => $email,
    ])){
        header("location: register.php?msg=Email is al gebruikt");
        exit;
    }

    $_SESSION["user_id"] = $conn->lastInsertId();

    header("location: ../index.php?msg=account aangemaakt");
}
elseif ($_POST["action"] == "login"){

    if(empty($_POST["password"])){
        header("location: register.php?msg=Wachtwoord is niet ingevuld");
        exit;
    }
    if(empty($_POST["email"])){
        header("location: register.php?msg=Email is niet ingevuld");
        exit;
    }

    $email = $_POST["email"];
    $password = $_POST["password"];

    $query = "SELECT * FROM users WHERE email = :email"; 

    $statement = $conn->prepare($query); 
    $statement->execute([
        ":email" => $email,
    ]);

    if ($statement->rowCount() < 1) {
        header("location: login/login.php?msg=wachtwoord of email incorrect");
        exit;
    }

    $user = $statement->fetch(PDO::FETCH_ASSOC);
    
    if (!password_verify($password, $user['password'])) {
    
        header("location: login.php?msg=wachtwoord of email incorrect");
        exit;
    }

    $_SESSION["user_id"] = $user["id"];

    header("location: ../index.php?msg=logged in");
}