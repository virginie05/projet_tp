<?php
session_start();
include_once 'configuration.php';
include_once 'class/database.php';
include_once 'models/user.php';
include_once 'models/films.php';
include_once 'controllers/indexCtrl.php';
?>
<!DOCTYPE html>


<title>Accueil CINELIFE</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/accueil.css">
<link href="assets/css/unite-gallery.css" rel="stylesheet" type="text/css"/>
<link href="https://fonts.googleapis.com/css?family=Fira+Sans|Metamorphous" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat+Subrayada" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="assets/js/unitegallery.min.js" type="text/javascript"></script>
<script src="assets/js/script.js" type="text/javascript"></script>
<script src="assets/js/ug-theme-tiles.js" type="text/javascript"></script>
<script src="assets/js/Ajax.js" type="text/javascript"></script>

<body>
    <?php
    include 'navbar_modal.php';
    ?>
    <!-- Carousel -->
    <div class="container">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicateurs -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <!-- Wrapper pour diapositives -->
            <div class="carousel-inner">
                <div class="item active">
                    <a href="/actu"><img src="assets/img/bande_annonce_2_arthur.jpg" alt="bande-annonce" style="width:100%;"></a>
                    <div class="carousel-caption">
                        <h3>LE ROI ARTHUR</h3>
                        <p>Redécouvrez la légende</p>
                    </div>
                </div>
                <div class="item">
                    <img src="assets/img/36857_b0fe481417c5386c57ec4dc2fdc4e12d.jpg" alt="Chicago" style="width:100%;">
                    <div class="carousel-caption">
                        <h3>NOS PATRIOTES</h3>
                        <p>Découvrez la bande-annonce</p>
                    </div>
                </div>
                <div class="item">
                    <img src="assets/img/36854_0f677aecc8dc698cba608970a045ba8b.jpg" alt="New York" style="width:100%;">
                    <div class="carousel-caption">
                        <h3>IT COMES AT NIGHT</h3>
                        <p>Les premières images glaçantes</p>
                    </div>
                </div>
            </div>
            <!-- Commandes gauche et droite -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="container" id="color_text">
        <div class="row">
            <div class="col-lg-offset-5">
                <h2> Films a l'affiche </h2>
            </div>
        </div>
    </div>
    <!--image films-->

    <div class="container">
        <div id="gallery" style="display:none;">
            <?php foreach ($films as $filmInfo) { ?>
                <a href="bande-annonce.php?id=<?= $filmInfo->id ?>">
                    <img alt="<?= $filmInfo->title ?>"
                         src="<?= $filmInfo->link ?>"
                         data-image="<?= $filmInfo->link ?>"
                         data-description="<?= $filmInfo->title ?>"
                         style="display:none">
                </a>
                <?php
            }
            ?>
        </div>
    </div>
</body>
</html>

