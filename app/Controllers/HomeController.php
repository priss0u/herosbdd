<?php 
    $query = "SELECT `id`, `name`, `image` FROM `heros`";
    $statement = $pdo->prepare($query);
    $statement->execute();

    $heros = $statement->fetchAll(PDO::FETCH_ASSOC);
    //debug($heros);

    require_once( __DIR__ . "/../Views/home.view.php" );