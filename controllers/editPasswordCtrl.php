<?php
// On instancie l'objet user
$user = new user();

// On initialise $errorMessage et $successMessage à chaine vide
$errorMessage = '';
$successMessage = '';

// On vérifie si l'on a bien appuyé sur le bouton modifier
if (isset($_POST['newPassword'])) {
    // On vérifie si les $_POST editEmail et confirmEmail sont bien remplis et qu'ils sont bien identiques
    if ($_POST['editPassword'] == $_POST['confirmPassword']) {
        // Si tout va bien, on stocke dans l'attribut editEmail de l'objet user,
        $user->password = password_hash($_POST['editPassword'], PASSWORD_BCRYPT);
        $user->id = $_SESSION['userId'];
        $user->editPasseword();
        $successMessage = 'Le mot de passe a bien été modifiée';
    } else {
        // Si un des $_POST est vide ou que les mots de passes ne sont pas identiques, on stocke une erreur dans $errorMessage
        $errorMessage = 'Les mots de passe ne sont pas identiques.';
    }
}    