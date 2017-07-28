<?php

$film = new film();
$image = new image();
$video = new video();
$group = new group();
$user = new user();
$groupSucces = '';
$groupError = '';

if ($_SESSION['id_projettp_group'] == 3 OR empty($_SESSION)) {
    header('location: /');
    exit();
} else {

    $groupLists = $group->groupList();
    if (isset($_POST['groupUser']) AND isset($_POST['username'])) {
//On stocke la valeur de $_POST['username'], $_POST['groupUser'] dans l'attribut mail de l'objet user en sécurisant (strip_tags)
        $user->username = strip_tags($_POST['username']);
        $user->id_projettp_group = strip_tags($_POST['groupUser']);
        if ($user->checkUser()) {
            if ($user->changeGroupUser()) {
                $groupSucces = 'L\'utilisateur a bien changer de groupe';
                $user->getUser();
                //$_SESSION['id_projettp_group'] = $user->id_projettp_group;
                if ($user->id_projettp_group == 1 OR $user->id_projettp_group == 2) {
                    $addUsersDir = $user->email . '_' . $user->username;
                    $path = '../assets/usersFiles/' . $addUsersDir;
                    $pathVideos = '../assets/usersFiles/' . $addUsersDir . '/Videos';
                    $pathImages = '../assets/usersFiles/' . $addUsersDir . '/Images';
                    //si ce dossier n'existe pas alors je creee le dossier artiste
                    if (!is_dir($path)) {
                        mkdir($path);
                        mkdir($pathVideos);
                        mkdir($pathImages);
                        //permet de créer un index vide pour sécuriser
                        $securFile = fopen($path . '/index.html', 'w');
                        fclose($securFile);
                        $securFileVideos = fopen($pathVideos . '/index.html', 'w');
                        fclose($securFileVideos);
                        $securFileImages = fopen($pathImages . '/index.html', 'w');
                        fclose($securFileImages);
                    }
                }
            } else {
                $groupError = 'Un problème a été rencontré';
            }
        } else {
            $groupError = 'Le nom d\'utilisateur n\'existe pas ';
        }
    }
}
