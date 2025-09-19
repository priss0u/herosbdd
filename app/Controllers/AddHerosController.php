<?php 
require_once(__DIR__ . '/../Utils/checkForm.php');
//var_dump($_SESSION);

//Si il est connecté ET que le role est bien admin alors
if((isset($_SESSION['user'])) && ($_SESSION['user']['role']==="admin")){

    //Si la personne à clicker sur le bouton submit alors
    if(isset($_POST['name'])){
        $valueName = htmlspecialchars($_POST['name']);
        $valuePower = htmlspecialchars($_POST['power']);
        $valueDescription = htmlspecialchars($_POST['description']);
        $valueImage = htmlspecialchars($_POST['image']);

        checkFormat('name', $valueName);
        checkFormat('power', $valuePower);
        checkFormat('description', $valueDescription);
        checkFormat('image', $valueImage);

        isNotEmpty('name');
        isNotEmpty('power');
        isNotEmpty('description');

        //var_dump($arrayError);

        if(empty($arrayError)){
            $today = date('Y-m-d');

            $query = "INSERT INTO `heros` (`name`, `magic_power`, `description`, `image`, `creation_date`)
            VALUES (:name, :magic_power, :description, :image, :creation_date)"; 
            $statement = $pdo->prepare($query); 
            $statement->bindValue(':name', $valueName);
            $statement->bindValue(':magic_power', $valuePower);
            $statement->bindValue(':description', $valueDescription);
            $statement->bindValue(':image', $valueImage);
            $statement->bindValue(':creation_date', $today);
            $statement->execute();

            redirectToRoute('/', 200);
        }

        require_once( __DIR__ . "/../Views/addheros.view.php" ); 
    }else{
        require_once( __DIR__ . "/../Views/addheros.view.php" ); 
    }
}else{
    redirectToRoute('/404', 404);
}

