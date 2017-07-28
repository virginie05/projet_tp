<?php
//Incusion du model et du controller
include_once 'configuration.php';
include_once 'class/database.php';
include_once 'models/user.php';
include_once 'controllers/addUserCtrl.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Inscription</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Fira+Sans|Metamorphous" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="assets/js/Ajax.js" type="text/javascript"></script>
        <script src="assets/js/passwordCheck.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="header">
            <img id="ban" src="assets/img/film.png" alt="" class="en_tete"/>
            <a class="link_arrow_l fs11" href="">Accueil</a>
            <div class="breaker"></div>
            <div class="acount">
                <div id="logo">
                    <a class="" href="/accueil">Accueil</a>
                    <h1>Inscription</h1>
                    <h2 id="successMessage" class="text-center"><?= $createdMessage ?></h2>
                    <h2 id="successMessage" class="text-center"><?= $errorCreatedMessage ?></h2>
                </div>
                <form action="addUser.php" method="POST">
                    <hr>
                    <div class="form-group">
                        <label for="username">Nom d'utilisateur *</label>
                        <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" name="username" autocomplete="off" id="username" placeholder="Nom d'utilisateur">
                        <small id="username_success">Le nom d'utilisateur est disponible.</small>
                        <small id="username_error">Le nom d'utilisateur n'est pas disponible.</small>
                        <small id="errorList"><?= (isset($errorList['username'])) ? $errorList['username'] : '' ?></small>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe*</label>
                        <input type="password" class="form-control" name="password" id="password" autocomplete="off" placeholder="Mot de passe">
                    </div>
                    <div class="form-group"> 
                        <label for="confirmPassword">Confirmer le mot de passe *</label>
                        <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" autocomplete="off" placeholder="Confirmer le mot de passe ">
                        <small id="password_confirm_success">Les mots de passe sont identiques.</small>
                        <small id="password_confirm_error">Les mots de passe ne sont pas identiques.</small>
                        <small id="errorList"><?= (isset($errorList['password'])) ? $errorList['password'] : '' ?></small>
                    </div>
                    <div class="form-group">
                        <label for="email">Adresse email *</label>
                        <input type="email" class="form-control mb-2 mr-sm-2 mb-sm-0" name="email" autocomplete="off" id="email" placeholder="Adress email">
                        <small id="email_error">L'adresse email renseigné existe deja.</small>
                        <small id="errorList"><?= (isset($errorList['email'])) ? $errorList['email'] : '' ?></small>
                    </div>
                    <input type="submit" class="btn btn-success" name="save" value="Enregistrer"/>
                </form>
                <div class="footer">
                    <footer>
                        <hr>
                        <p> * Obligatoire</p>
                        <hr>
                    </footer>
                </div>
            </div>
        </div>
    </body>
</html>
