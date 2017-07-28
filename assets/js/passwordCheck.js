$(function () {
    // Fonction qui vérifie si les deux champs mot de passe sont indentiques quand on perd le focus du champ
    $('#confirmPassword').blur(function(){
        // On récupère la valeur de l'input password et confirmPassword
        var password = $('#password').val();
        var password_confirm = $('#confirmPassword').val();
        // Si aucune valeur n'a été entrée
        if(password_confirm == ''){
            // On cache le message d'erreur
            $('#password_confirm_error').hide();
            $('#password_confirm_success').hide();
        } else if(password_confirm == password){
            // Sinon si les champs sont identiques, on affiche le message de succès et on cache celui d'erreur
            $('#password_confirm_success').show();
            $('#password_confirm_error').hide();
        } else{
            // Sinon si ils ne sont pas indentiques, on affiche le message d'erreur et on cache celui de succès
            $('#password_confirm_error').show();
            $('#password_confirm_success').hide();
        }
    });
});