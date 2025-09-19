<?php

if(isset($_GET['id'])){
    //var_dump($_GET['id']);
    $id = htmlspecialchars($_GET['id']);

    //Je fais une requête sql pour récupérer le heros par l'id
    $query = "SELECT `id`, `name`, `magic_power`, `image`, `description` 
    FROM `heros` WHERE `id` = :id";
    $statement = $pdo->prepare($query);
    $statement->bindParam(':id', $id);
    $statement->execute();
    
    //Je met la response de la reque ( donc mon hero) dans la variable
    $hero = $statement->fetch();

    
    //Si je n'ai pas d'hero alors:
    if(!$hero){
        redirectToRoute('404', 404);
    } else{
        //debug($hero);
        require_once( __DIR__ . "/../Views/hero.view.php");
    }

}else{
    redirectToRoute('404', 404);
}