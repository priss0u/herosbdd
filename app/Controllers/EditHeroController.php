<?php 
require_once (__DIR__ . '/../Utils/checkForm.php');

//Si la personne est connecté + admin alors:
if( (isset($_SESSION['user'])) && ($_SESSION['user']['role'] === "admin")){

    if(isset($_GET['id'])){
        $id = htmlspecialchars($_GET['id']);

        //Je fais une requête sql pour récupérer le heros par l'id
        $query = "SELECT `id`, `name`, `magic_power`, `image`, `description` 
        FROM `heros` WHERE `id` = :id";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':id', $id);
        $statement->execute();
        //on met la reponse dans la variable hero
        $hero = $statement->fetch();

        //Si il y a un hero alors:
        if($hero){

            if(isset($_POST['name'])){
                $valueName = htmlspecialchars($_POST['name']);
                $valuePower = htmlspecialchars($_POST['power']);
                $valueDescription = htmlspecialchars($_POST['description']);
                $valueImg = htmlspecialchars($_POST['image']);

                checkFormat('name', $valueName);
                checkFormat('power', $valuePower);
                checkFormat('description', $valueDescription);
                checkFormat('image', $valueImg);

                isNotEmpty('name');
                isNotEmpty('power');
                isNotEmpty('description');

                if(empty($arrayError)){
                    $queryUpdate = "UPDATE `heros` 
                    SET `name` = :name, `magic_power` = :magic_power, `description`= :description, `image` = :image
                    WHERE `id` = :id";

                    $statementUpdate = $pdo->prepare($queryUpdate);
                    $statementUpdate->bindValue(':name', $valueName);
                    $statementUpdate->bindValue(':magic_power', $valuePower);
                    $statementUpdate->bindValue(':description', $valueDescription);
                    $statementUpdate->bindValue(':image', $valueImg);
                    $statementUpdate->bindValue(':id', $id);
                    $statementUpdate->execute();

                    redirectToRoute('/', 200);
                }
            }

            require_once(__DIR__ . '/../Views/edithero.view.php');
        }else{
            redirectToRoute('404', 404);
        }

    }else{
        redirectToRoute('404', 404);
    }

}else{
    redirectToRoute('404', 404);
}