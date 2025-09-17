<?php
require_once(__DIR__ . '/../Utils/checkForm.php');

if(isset($_POST['pseudo'])){

    $valueEmail = htmlspecialchars($_POST['email']);
    $valuePassword = htmlspecialchars($_POST['password']);
    $valuePseudo = htmlspecialchars($_POST['pseudo']);

    checkFormat('pseudo', $valuePseudo);
    checkFormat('password', $valuePassword);
    checkFormat('email', $valueEmail);

    isNotEmpty('pseudo');
    isNotEmpty('email');
    isNotEmpty('password');
    
    //nos erreurs sont dans :
    //var_dump($arrayError);
    
    //Si mon tableau d'erreur est vide alor :
    if(empty($arrayError)){

        //Hash le mot de passe :
        $passwordHash = password_hash($valuePassword, PASSWORD_DEFAULT);

        // 0- Je creer la requête SQL:
        $query = "INSERT INTO `user` (`pseudo`, `password`, `email`) 
        VALUES (:pseudo, :password, :email)";

        // 1- prépare la requête :
        $queryStatement = $pdo->prepare($query);

        // 2- lier les marqueurs aux valeurs :
        $queryStatement->bindValue(':pseudo', $valuePseudo);
        $queryStatement->bindValue(':password', $passwordHash);
        $queryStatement->bindValue(':email', $valueEmail);

        // 3- exécuter la requête :
        $queryStatement->execute();

    }

    require_once( __DIR__ . "/../Views/register.view.php" );
}else{

    require_once( __DIR__ . "/../Views/register.view.php" );
}+