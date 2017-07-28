<?php
// On instancie l'objet user
$user = new user();

// On initialise $errorMessage et $successMessage à chaine vide
$errorMessage = '';
$successMessage = '';

// On vérifie si l'on a bien appuyé sur le bouton modifier
if (isset($_POST['newEmail'])) {
    // On vérifie si les $_POST editEmail et confirmEmail sont bien remplis et qu'ils sont bien identiques
    if ($_POST['editEmail'] == $_POST['confirmEmail']) {
        // Si tout va bien, on stocke dans l'attribut editEmail de l'objet user,
        $user->email = strip_tags($_POST['editEmail']);
        $user->id = $_SESSION['userId'];
        $user->editUser();
        $successMessage = 'L\'adresse email a bien été modifiée';
    } else {
        // Si un des $_POST est vide ou que les mots de passes ne sont pas identiques, on stocke une erreur dans $errorMessage
        $errorMessage = 'Les adresses email ne sont pas identiques.';
    }
}    
