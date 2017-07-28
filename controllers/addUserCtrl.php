<?php

//Si on lance l'appel AJAX
if (isset($_POST['verifUsername'])) {
    //on inclut le modèle car on n'appelle pas la page index.php
    include_once '../configuration.php';
    include_once '../class/database.php';
    include_once '../models/user.php';
    //On instancie la classe user
    $user = new user();
    //on pass à l'attribut username ce que l'AJAX à mis en POST
    $user->username = $_POST['verifUsername'];
    //on stock le résultat. Soit 0 ou 1
    $result = $user->checkUser();
    //Avec le echo on passe à data dans l'appel AJAX le JSON
    echo json_encode(array('response' => $result));
} else { //On est dans un cas sans AJAX

    //Si on lance l'appel AJAX
    if (isset($_POST['verifEmail'])) {
        //on inclut le modèle car on n'appelle pas la page index.php
        include_once '../configuration.php';
        include_once '../class/database.php';
        include_once '../models/user.php';
        //On instancie la classe user
        $user = new user();
        //on pass à l'attribut username ce que l'AJAX à mis en POST
        $user->email = $_POST['verifEmail'];
        //on stock le résultat. Soit 0 ou 1
        $result = $user->checkEmail();
        //Avec le echo on passe à data dans l'appel AJAX le JSON
        echo json_encode(array('response' => $result));
    } else { //On est dans un cas sans AJAX
    
        
        //Instanciation de l'objet user
        $user = new user();
        $regexUsername = '/(?=^.{3,20}$)^[a-zA-Z][a-zA-Z0-9]*[._-]?[a-zA-Z0-9]+$/';
        $regexEmail = '/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/';
        $errorList = array();
        $message = '';
        $createdMessage = '';
        $errorCreatedMessage = '';

        //On vérifie si l'on a bien appuyé sur le bouton Enregistrer
        if (isset($_POST['save'])) {
            $user->id_projettp_group = 3;
            //Si la variable POST n'est pas vide
            if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {
                //On stocke sa valeur dans l'attribut username de l'objet user en sécurisant (strip_tags)
                $user->username = strip_tags($_POST['username']);
                //On vérifie avec la méthode checkUser que username n'existe pas
                //S'il existe, on passe $userError à true (nous permet d'afficher notre message d'erreur dans la vue)
                if (!preg_match($regexUsername, $user->username)) {
                    $errorList['username'] = 'Le nom d\'utilsateur renseigné est incorrect.';
                }
                $user->password = strip_tags($_POST['password']);
                $user->email = strip_tags($_POST['email']);
                if (!preg_match($regexEmail, $user->email)) {
                    $errorList['email'] = 'L\'adresse email renseigné est incorrect.';
                }
                // On vérifie avec la méthode checkUser que le username n'existe pas
                // S'il existe, on passe $errorList à true (nous permet d'afficher notre message d'erreur dans la vue)
                if ($user->checkUser() != 0) {
                    // Si $_POST est vide, on passe $errorList à true (nous permet d'afficher notre message d'erreur dans la vue)
                    $errorList['checkUser'] = true;
                }
                //On vérifie si les $_POST password et confirmPassword sont bien remplis et qu'ils sont bien identiques
                if ($_POST['password'] == $_POST['confirmPassword']) {
                    //Si tout va bien, on stocke dans l'attribut password de l'objet user, la version chiffrée du mot de passe
                    //On chiffre le mot de passe avec la fonction password_hash qui prend en paramètre le mot de passe envoyée et la méthode de chiffrement (cf PHP.net)
                    $user->password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                } else {
                    //Si un des $_POST est vide ou que les mots de passes ne sont pas identiques, on passe $errorList à true (nous permet d'afficher notre message d'erreur dans la vue)
                    $errorList['password'] = 'Les mots de passe sont incorrects ou ne sont pas identiques.';
                }
                //S'il n'y a pas d'erreur, on ajoute l'utilisateur
                if (empty($errorList)) {
                    if ($user->addUser()) {
                        $createdMessage = 'Félicitations ! Votre compte a été créé avec succès !';
                    }
                        } else {
                            // Si un des $_POST est vide ou que les mots de passes ne sont pas identiques, on stocke une erreur dans $errorMessage
                            $errorCreatedMessage = ' Votre compte n\'a pas été créé .';
                        }
                    }
                }
            }
        }

        $isOk = 0;
        //On vérifie que l'on a bien appuyé sur le bouton connexion
        if (isset($_POST['passwordUp']) AND isset($_POST['username'])) {
            //On stocke la valeur de $_POST['username'] dans l'attribut mail de l'objet user en sécurisant (strip_tags)
            $user->username = strip_tags($_POST['co_username']);
            $_SESSION['username'] = $_POST['co_username'];
            //On utilise notre méthode getHashByUser pour récupérer le hash stocké dans notre base
            $user->getHashByUser();
            //On vérifie que le mot de passe saisi et le mot de passe présent dans la base sont les même grâce ) password_verify
            $isOk = password_verify($_POST['passwordUp'], $user->password);
            if ($isOk) {
                header('location: accueil');
                exit();
            } else {
                $errorMessage = 'Veuillez inscrire vos identifiants svp !';
            }
        }
    

