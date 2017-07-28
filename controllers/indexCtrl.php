<?php

$isVerified = false;
$isOk = false;


//On vérifie que l'on a bien appuyé sur le bouton connexion 
if (isset($_POST['verifPassword']) && isset($_POST['verifUsername'])) {
    include_once '../configuration.php';
    include_once '../class/database.php';
    include_once '../models/user.php';
    $user = new user();
    //On stocke la valeur de $_POST['mail'] dans l'attribut mail de l'objet user en sécurisant (strip_tags)
    //$user->email = strip_tags($_POST['co_mail']);
    $password = $_POST['verifPassword'];
    $co_username = strip_tags($_POST['verifUsername']);
    $user->username = $co_username;
    //$_SESSION['username']= $currentUser->username;
    //On utilise notre méthode getHashByUser pour récupérer le hash stocké dans notre base
    $user->getHashByUser();
    //On vérifie que le mot de passe saisi et le mot de passe présent dans la base sont les même grâce ) password_verify
    $isVerified = password_verify($password, $user->password);
    if ($isVerified) {
        $userInfo = $user->getUser();
        session_start();
        $_SESSION['username'] = $user->username;
        $_SESSION['email'] = $user->email;
        $_SESSION['userId'] = $user->id;
        $_SESSION['id_projettp_group'] = $user->id_projettp_group;
        $isOk = true;
    } else {
        $isOk = false;
    }
    echo json_encode(array('result' => $isOk));
} else {
    $user = new user();
    if (isset($_GET['disconnect'])) {
        $isOk = false;
        session_destroy();
        header('location:/accueil');
    }

    $film = new film();
    $films = $film->viewAllMovies();
}


