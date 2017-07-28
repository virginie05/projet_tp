<?php
session_start();
include_once '../configuration.php';
include_once '../class/database.php';
include_once '../models/user.php';
include_once '../models/group.php';
include_once '../models/films.php';
include_once '../models/image.php';
include_once '../models/video.php';
include_once '../controllers/statusUtilisateur.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Accueil CINELIFE</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="<?= SITEURL ?>/assets/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="<?= SITEURL ?>/assets/css/main.css" rel="stylesheet" type="text/css"/>
        <link href="<?= SITEURL ?>/assets/css/admin.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Fira+Sans|Metamorphous" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat+Subrayada" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
                <?php if ($_SESSION['id_projettp_group'] == 1) { ?>
                <form action="statusUtilisateur.php" method="POST">
                        <select name="groupUser">
                            <?php foreach ($groupLists as $groupList) { ?>
                                <option value="<?= $groupList->id ?>"><?= $groupList->name ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <div class="form-group">
                            <label for="username">Ajouter un admin</label>
                            <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" name="username" autocomplete="off" id="username" placeholder="Ajouter un admin"> 
                            <small id="groupSucces"><?= $groupSucces ?></small>
                            <small id="groupError"><?= $groupError ?></small>
                        </div>
                        <input type="submit" class="btn btn-success" name="changeGroup" value="Modifier"/>
                    </form>
                    <hr>
                <?php } ?>
                <div class="footer">
                    <footer>
                        
                    </footer>
                </div>
            </div>
        </div>
    </body>
</html>
