<?php
session_start();
$action = $_POST['action'];

if($action == 'create')
{
    //Validatie
    $date = $_POST['title'];
    if(empty($title))
    {
        $errors[] = "Titel mag niet leeg zijn";
    }

    $department = $_POST['department'];
    if(empty($department))
    {
        $errors[] = "Kies een afdeling!";
    }

    $task = $_POST['task'];
    if(empty($task))
    {
        $errors[] = "Taak mag niet leeg zijn!";
    }

    //Evt. errors dumpen
    if(isset($errors))
    {
        var_dump($errors);
        die();
    }

    $user = $_SESSION['user_id'];


    header("Location: ../index.php");
    exit;
}

if($action == "update")
{

}

if($action == "delete")
{

}
