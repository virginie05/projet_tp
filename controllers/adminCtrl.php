<?php

$film = new film();
$image = new image();
$video = new video();
$group = new group();
$user = new user();
/*
 * Si la variable POST n'est pas vide (films)
 */
if (isset($_POST['title']) AND isset($_POST['actor']) AND isset($_POST['releaseDate']) AND isset($_POST['synopsis'])) {
    $film->title = strip_tags($_POST['title']);
    $film->actor = strip_tags($_POST['actor']);
    $film->releaseDate = strip_tags($_POST['releaseDate']);
    $film->synopsis = strip_tags($_POST['synopsis']);
    $film->id_projettp_users = $_SESSION['userId'];
    if ($film->addFilms()) {
        $_SESSION['filmId'] = $film->id;
    }
}
/*
 * Si la variable FILES n'est pas vide (video)
 */

if (isset($_FILES['movie'])) {
    $user->name = strip_tags($_POST['name']);
    $user->addDate = strip_tags($_POST['addDate']);
    $user->isPrimary = strip_tags($_POST['isPrimary']);
    $user->image = strip_tags($_POST['image']);
    $user->url = strip_tags($_POST['url']);
    $user->id_projettp_users = strip_tags($_POST['id_projettp_films']);
}
/*
 * /Si la variable POST n'est pas vide (image)
 */
if (isset($_FILES['picture'])) {
    $files = $_FILES['picture'];
    if ($_FILES['picture']['size'] <= 50000000) {
        $filesName = pathinfo($_FILES['picture']['name']);
        $filesType = $filesName['extension'];
        $extentionImgAutorise = array('jpg', 'JPG', 'jpeg', 'JPEG', 'png', 'PNG', 'gif', 'GIF', 'tiff', 'TIFF', 'bmp', 'BMP');
        $extentionVideoAutorise = array('MP4', 'mp4', 'AVI', 'avi', 'MKV', 'mkv');
        $filesInfo = explode('.', $_FILES['picture']['name']);
        if (in_array($filesType, $extentionImgAutorise)) {
            $usersDir = $_SESSION['email'] . '_' . $_SESSION['username'];
            $pathImages = '../assets/usersFiles/' . $usersDir . '/Images';
            $image->link = $pathImages . '/' . basename($_FILES['picture']['name']);
            $image->id_projettp_films = intval($_SESSION['filmId']);
            $image->name = basename($_FILES['picture']['name']);
            if ($image->addImage()) {
                move_uploaded_file($_FILES['picture']['tmp_name'], $pathImages . '/' . basename($_FILES['picture']['name']));
            }
        } elseif (in_array($filesType, $extentionVideoAutorise)) {
            $usersDir = $_SESSION['email'] . '_' . $_SESSION['username'];
            $pathVideo = '../assets/usersFiles/' . $usersDir . '/Videos';
            $video->url = $pathVideo . '/' . basename($_FILES['picture']['name']);
            $video->id_projettp_films = intval($_SESSION['filmId']);
            $video->name = basename($_FILES['picture']['name']);
            if ($video->addVideo()) {
                move_uploaded_file($_FILES['picture']['tmp_name'], $pathVideo . '/' . basename($_FILES['picture']['name']));
            }
        }
    }
}
