<?php
//ici on delete le hero ! et renvoie vers le /
if((isset($_SESSION['user'])) && ($_SESSION['user']['role'] === "admin")){

    if(isset($_GET['id'])){
        $id = htmlspecialchars($_GET['id']);

        $query = "SELECT `id` FROM `heros` WHERE `id` = :id";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':id', $id);
        $statement->execute();

        $hero = $statement->fetch();

        if(!$hero){
            redirectToRoute('404', 404);
        }else{

            $queryDelete = "DELETE FROM `heros` WHERE `id` = :id";
            $statementDelete = $pdo->prepare($queryDelete);
            $statementDelete->bindParam(':id', $id);
            $statementDelete->execute();

            redirectToRoute('/', 200);
        }
    }else{
        redirectToRoute('404', 404);
    }

}else{
    redirectToRoute('404', 404);
}