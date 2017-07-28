<?php
session_start();
include_once 'configuration.php';
include_once 'class/database.php';
include_once 'models/user.php';
include_once 'models/films.php';
include_once 'models/image.php';
include_once 'models/likes.php';
include_once 'models/video.php';
include_once 'models/comments.php';
include_once 'controllers/bandeAnnonceCtrl.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Bande-Annonces</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="assets/css/bande-A.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="assets/css/nav_modal.css">
        <link href="https://fonts.googleapis.com/css?family=Fira+Sans|Metamorphous" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat+Subrayada" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
        include_once 'navbar_modal.php';
        ?>
        <!-- video Bande-annonce-->
        <div class="container">
            <div class="row">
                <div class="col-lg-offset-1">
                    <video id="video_arthur" controls="controls" poster="<?=$movie->link?>">
                        <source src="<?=$movie->url?>" type="video/mp4">
                        </div>
                        </div>
                        </div>
                        <div class='container'>
                            <!-- container résumer -->
                            <div id="globalcontainer">
                                <div class="col-lg-offset-2 col-sm-offset-2 col-md-xs-2">
                                    <h2><br>Bande-Annonce <small> <?=$movie->title?></small></h2>
                                    <hr>
                                    <small>Film : </small><a href=""> <?=$movie->title?></a>
                                    <i class="fa fa-star fa-lg"></i>
                                    <i class="fa fa-star fa-lg"></i>
                                    <i class="fa fa-star fa-lg"></i>
                                    <i class="fa fa-star fa-lg"></i>
                                    <i class="fa fa-star fa-lg"></i>
                                    <span class="color">3,8</span>
                                    <p><small>Stars : </small><?=$movie->actor?></p>
                                    <p><small>Mise en ligne : </small> <?=$movie->releaseDate?></p>         
                                    <br>
                                    <h2>Résumé</h2>
                                    <p><?=$movie->synopsis?></p>
                                    
                                    <hr>
                                    <h2><span>Autres vidéos<small>(4 vidéos)</small></span></h2>
                                    <br>
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <video id="bande_annonce_video_arthur" controls="controls" poster="assets/img/157722.jpg-c_208_117_x-f_jpg-q_x-xxyxx.jpg">
                                                    <source src="assets/video/le-roi-arthur-la-legende-dexcalibur-bande-annonce-officielle-2-vf-charlie-hunnam.mp4" type="video/mp4">
                                                </video>
                                                <strong>Le Roi Arthur: La Légende d'Excalibur</strong>
                                                <p>Bande-annonce (2) VF</p>
                                            </div>
                                            <div class="col-lg-offset-1 col-lg-3">
                                                <video id="bande_annonce_video_arthur" controls="controls" poster="assets/img/314034.jpg-c_208_117_x-f_jpg-q_x-xxyxx.jpg">
                                                    <source src="assets/video/le-roi-arthur-la-legende-dexcalibur-bande-annonce-officielle-2-vf-charlie-hunnam-jude-law.mp4" type="video/mp4">
                                                </video>
                                                <strong>Le Roi Arthur: La Légende d'Excalibur</strong>
                                                <p>Bande-annonce (3) VF</p>
                                            </div>
                                            <div class="col-lg-offset-1 col-lg-2">
                                                <video id="bande_annonce_video_arthur" controls="controls" poster="assets/img/566366.jpg-c_208_117_x-f_jpg-q_x-xxyxx.jpg">
                                                    <source src="assets/video/le-roi-arthur-la-legende-dexcalibur-bande-annonce-officielle-2-vf-charlie-hunnam.mp4" type="video/mp4">
                                                </video>
                                                <strong>Le Roi Arthur: La Légende d'Excalibur</strong>
                                                <p>Bande-annonce (4) VF</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class=" col-lg-3">
                                                <video id="bande_annonce_video_arthur" controls="controls" poster="assets/img/074880.jpg-c_208_117_x-f_jpg-q_x-xxyxx.jpg">
                                                    <source src="assets/video/le-roi-arthur-la-legende-dexcalibur-bande-annonce-finale-vost-charlie-hunnam-jude-law.mp4" type="video/mp4">
                                                </video>
                                                <strong>Le Roi Arthur: La Légende d'Excalibur</strong>
                                                <p>Bande-annonce (5) VOSTF</p>
                                            </div>
                                        </div>
                                        <h2><span>Vos avis sur ce film</span></h2>
                                        <form class="" action="index.html" method="post">
                                            <div class="form-group">
                                                <label for="commentaire"></label>
                                                <textarea class="form-control" id="commentaire" placeholder="Exprimez-vous" rows="3"></textarea>
                                            </div>
                                        </form>
                                    </div>
                                </div>          
                            </div>
                        </div>
   
                        <footer>
                            <a href="index.php">Accueil</a>
                            <a href="index.php">Accueil</a>
                            <a href="index.php">Accueil</a>
                            <a href="index.php">Accueil</a>
                        </footer>
                        <script type="text/javascript" src="asset/js/script.js"></script>
                        <script src="https://use.fontawesome.com/a85a823305.js"></script>
                        </body>
                        </html>
