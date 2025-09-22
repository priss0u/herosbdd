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

        //Verifie si l'utilisateur ( si l'adresse mail ) existe:
        //On prepare la requete:
        $queryMail = "SELECT * FROM `user` WHERE email = :email";
        // Je prepare ma requete sql a l'envoie
        $mailStatement = $pdo->prepare($queryMail);
        // Je modifie la valeur du mail reçu
        $mailStatement->bindParam(':email', $valueEmail);
        //On execute la requete avec le param' mail
        $mailStatement->execute();
        //dans la variable userMail je met la reponse de ma requete
        $userMail = $mailStatement->fetch();
        //var_dump($userMail);
        
        // si mon userMail existe dans la base de donner alors
        if($userMail){
            //On appel la fonction errorMessage
            errorMessage("Cette adresse email existe déjà !");
        }else{
            //Sinon
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

            redirectToRoute('/', 201);
        }

    }

    require_once( __DIR__ . "/../Views/register.view.php" );
}else{

    require_once( __DIR__ . "/../Views/register.view.php" );
}
    