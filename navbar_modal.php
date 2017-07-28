<!-- Modal conexion-->
<div class="container">
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <img src="assets/img/banniere_modal2.jpg" alt="banniere_Hobbit">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">CINELIFE</h3>
                </div>
                <div class="modal-body">
                    <p>Accédez à votre compte</p>
                    <img class="res-Image" src="assets/img/login_facebook.png" alt="image_login_facebook">
                    <img class="res-Image" src="assets/img/login_twitter.png" alt="image_login_Twitter">
                    <p>Ou</p>
                    <form class="form_connexion" action="/accueil" method="post">
                        <small class="connectError">L'identifiant ou le mot de passe saisi est incorrect</small>
                        <label for="co_username"></label><input type="text" name="co_username" placeholder="Nom d'utilisateur" id="co_username"><br>
                        <label for="passwordUp"></label><input type="password" name="passwordUp" placeholder="Mot de passe" id="passwordUp"><br>
                        <a id="passe_oublie" href="#">Mot de passe oublié ?</a>
                        <div class="checkbox_left">
                        </div>
                        <a href="/inscription"><button type="button" class="btn btn-primary btn-md">Créer un compte</button></a>
                        <input type="button" id="connexion" name="connection" class="btn btn-danger btn-md" value="Me connecter">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--navbar-->
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">CINELIFE</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="../accueil">Accueil</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Cinéma <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Films en salle</a></li>
                        <li><a href="#">Tous les films</a></li>
                        <li><a href="#">Nouveautés</a></li>
                        <li><a href="#">A venir</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Bandes-annonces <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Sorties de la semaine</a></li>
                        <li><a href="#">Nouveautés</a></li>
                        <li><a href="#">Prochainement</a></li>
                        <li><a href="#">A l'affiche</a></li>
                    </ul>
                </li>
                <form class="navbar-form navbar-left">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Recherche">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <i class="glyphicon glyphicon-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <?php if (!empty($_SESSION)) {
                        ?>
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span  id="button_conection" class="glyphicon glyphicon-user"></span> <?= $_SESSION['username'] ?><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/email" title="edit">Modifier votre adresse email</a></li>
                                <li><a href="/passe" title="edit">Modifier votre mot de passe</a></li>
                                <?php if ($_SESSION['id_projettp_group'] == 2 OR $_SESSION['id_projettp_group'] == 1) { ?>
                                    <li><a href="/admin/films" title="contents">Ajouter un film</a></li>
                                    <?php if ($_SESSION['id_projettp_group'] == 1) { ?>
                                        <li><a href="/admin/groupe" title="contents">Changer un utilisateur de groupe</a></li>
                                        <?php
                                    }
                                }
                                ?>

                                <li><a href="../index.php?disconnect" title="déconnexion">Déconnexion</a></li>
                            </ul>
                        </li>
                        <?php
                    } else {
                        ?>
                        <li><a id="connexion" href="#myModal" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in"></span> Me connecter</a></li>
                            <?php
                        }
                        ?>
                </ul>
        </div>
    </div>
</nav>
