<?php

function isNotEmpty ($value){
    //Création d'un tableau vide
    global $arrayError;

    //si le post avec la valeur est vide alors
    if(empty($_POST[$value])){
        //On rapelle le tableau et on lui donne en clé le nom de la $value et en valeur une string
        $arrayError[$value] = "Le champs $value ne peut pas être vide.";
        //On retour le tableau
        return $arrayError;
    }

    //sinon on retourne false
    return false;
}

function checkFormat($nameInput, $value){
    //Création d'un tableau vide
    global $arrayError;

    //Vos regex = vos filtres
    $regexPseudo = '/^([0-9a-z_\-.A-Zà-üÀ-Ü]){3,255}$/';
    $regexPassword = '/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/';

    //on prend le nom de l'input
    switch($nameInput){

        //Si l'input s'appel pseudo alors 
        case 'pseudo':

            //si la valeur de l'input n'arrive pas a passer le filtre alors
            if(!preg_match($regexPseudo, $value)){
                //on appel notre tableau et on ajoute en clé pseudo et en valeur la string
                $arrayError['pseudo'] = 'Merci de renseigner un pseudo correcte!';
            }
            break;

        case 'password':

            if(!preg_match($regexPassword, $value)){
                 $arrayError['password'] = 'Merci de donné un mot de passe avec au minimum : 8 caractères, 1 majuscule, 1 miniscule, 1 caractère spécial!';
            }
            break;

        case 'email':

            if(!filter_var($value, FILTER_VALIDATE_EMAIL)){
                $arrayError['mail'] = 'Merci de renseigner un e-mail correcte!';
            }
            break;
    }
}


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
    var_dump($arrayError);
    
    //Si mon tableau d'erreur est vide alor :
    if(empty($arrayError)){

        // 0- Je creer la requête SQL:
        $query = "INSERT INTO `user` (`pseudo`, `password`, `email`) 
        VALUES (:pseudo, :password, :email)";

        // 1- prépare la requête :
        $queryStatement = $pdo->prepare($query);

        // 2- lier les marqueurs aux valeurs :
        $queryStatement->bindValue(':pseudo', $valuePseudo);
        $queryStatement->bindValue(':password', $valuePassword);
        $queryStatement->bindValue(':email', $valueEmail);

        // 3- exécuter la requête :
        $queryStatement->execute();

    }

    require_once( __DIR__ . "/../Views/register.view.php" );
}else{

    require_once( __DIR__ . "/../Views/register.view.php" );
}
    