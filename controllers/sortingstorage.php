<?php
//dit bestand is er puur zodat mijn voortgang opgeslagen wordt op de github pagina. deze code zal later gebruikt worden op de paginas.
//sorteren op Done:

require_once "../config/conn.php";

    $query = "SELECT * FROM `tasks` WHERE `status` = 'done'";

    $statement = $conn->prepare($query);

    $statement->execute();

    $tasks = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
//sorteren op Not Done:

require_once "../config/conn.php";

    $query = "SELECT * FROM `tasks` WHERE `status` != 'done'";

    $statement = $conn->prepare($query);

    $statement->execute();

    $tasks = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<?php //dit zal ik toepassen op alle benodigde sites zodra die er zijn ?>