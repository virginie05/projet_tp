<?php
session_start();
include_once '../configuration.php';
include_once '../class/database.php';
include_once '../models/user.php';
include_once '../models/group.php';
include_once '../models/films.php';
include_once '../models/image.php';
include_once '../models/video.php';
include_once '../controllers/adminCtrl.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Accueil CINELIFE</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="<?= SITEURL ?>/assets/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="<?= SITEURL ?>/assets/css/dropzone.css" rel="stylesheet" type="text/css"/>
        <link href="<?= SITEURL ?>/assets/css/main.css" rel="stylesheet" type="text/css"/>
        <link href="<?= SITEURL ?>/assets/css/admin.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Fira+Sans|Metamorphous" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat+Subrayada" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="<?= SITEURL ?>/assets/js/dropzone.js" type="text/javascript"></script>
    </head>
    <body>
        <?php
        include_once '../navbar_modal.php';
        ?>
        <div id="header">
            <img id="ban" src="<?= SITEURL ?>/assets/img/banniere_v3.jpg" alt="" class="en_tete"/>
            <a class="link_arrow_l fs11" href="#">Accueil</a>
            <div class="breaker"></div>
            <div class="acount">
                <div id="logo">
                    <a href="../accueil">Accueil</a>
                    <h1>Administrateur</h1>
                </div>
                <form action="indexAdmin.php" method="POST">
                    <hr>
                    <div class="form-group">
                        <label for="title">Titre du film</label>
                        <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" name="title" autocomplete="off" id="title" placeholder="Titre du film">                    
                    </div>
                    <div class="form-group">
                        <label for="actor">Acteurs</label>
                        <input type="text" class="form-control" name="actor" id="actor" autocomplete="off" placeholder="Acteurs">
                    </div>
                    <div class="form-group"> 
                        <label for="releaseDate">Date</label>
                        <input type="text" class="form-control" name="releaseDate" id="releaseDate" autocomplete="off" placeholder="Date">
                    </div>
                    <div class="form-group">
                        <label for="textarea">Description</label>
                        <textarea  class="form-control mb-2 mr-sm-2 mb-sm-0" name="synopsis" placeholder="Description" id="synopsis" rows="3"></textarea>
                    </div>
                     <input type="submit" class="btn btn-success" name="save" value="Créer"/>
                     <hr>
                </form>
                <h2>Videos bandes annonces</h2>
                <form action="indexAdmin.php" method="POST" class="dropzone" id="video">
                    <div class="form-group">
                        <input type="hidden" class="form-control mb-2 mr-sm-2 mb-sm-0" id="movie">                    
                    </div>
                </form>
                <h2>Images films</h2>
                <form action="indexAdmin.php" method="POST" class="dropzone" id="pictureFilm">
                    <div class="form-group">
                        <input type="hidden" class="form-control mb-2 mr-sm-2 mb-sm-0" id="picture">                    
                    </div>
                </form>
                <hr>
                <input type="submit" id="create"  class="btn btn-success" name="create" value="Créer"/>
                <div class="footer">
                    <footer>
                        <hr>
                    </footer>
                </div>
            </div>
        </div>
        <script src="../assets/js/script.js" type="text/javascript"></script>
    </body>
</html>
