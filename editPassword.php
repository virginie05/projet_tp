<?php
session_start();
//Incusion du model et du controller
include_once 'configuration.php';
include_once 'class/database.php';
include_once 'models/user.php';
include_once 'controllers/editPasswordCtrl.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Modification de l'adresse email</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/main.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Fira+Sans|Metamorphous" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat+Subrayada" rel="stylesheet">
    </head>
    <body>
        <div id="header">
            <img id="ban" src="assets/img/film.png" alt="" class="en_tete"/>
            <a class="link_arrow_l fs11" href="">Accueil</a>
            <div class="breaker"></div>
            <div class="acount">
                <div id="logo">
                    <a class="" href="/accueil">Accueil</a>
                    <h1>Modifier</h1>
                    <hr>
                </div>
                <form action="editPassword.php" method="POST">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="row form-group">
                                <label for="editPassword">Nouveau mot de passe</label>
                                <input type="password" class="form-control mb-2 mr-sm-2 mb-sm-0" name="editPassword" autocomplete="off" id="editPassword" placeholder="Nouveau mot de passe">                      
                            </div>
                            <div class="row form-group">
                                <label for="confirmPassword">Confirmer le nouveau mot de passe</label>
                                <input type="password" class="form-control mb-2 mr-sm-2 mb-sm-0" name="confirmPassword" autocomplete="off" id="confirmPassword" placeholder="Confirmer le nouveau mot de passe"> 
                                <small id="errorMessage"><?= $errorMessage ?></small>
                                <h2 id="successMessage" class="text-center"><?= $successMessage ?></h2>
                                <hr>
                                <button type="button" class="btn btn-info" name=" ">Annuler</button>
                                <button type="submit" class="btn btn-success" name="newPassword">Modifier</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
