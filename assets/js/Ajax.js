$(function () {
    // L'evenement blur fonctionne au moment où le champ perd le focus
    $('#username').blur(function () {
        $.post('controllers/addUserCtrl.php',
                {
                    verifUsername: $('#username').val() // Le $_POST['verifUsername'] prend le contenu de l'input
                },
                function (data) {
                    // Dans data c'est le json généré dans le controlleur grâce à la méthode json_encode
                    response = data.response;
                    // Si le champ du username est vide
                    if ($('#username').val() == '') {
                        // On cache les messages d'erreur et de succès
                        $('#username_error').hide();
                        $('#username_success').hide();
                    } else if (response == 0) {
                        // Sinon si il le username est diponible on affiche le message de succès et on cache le message d'erreur
                        $('#username_error').hide();
                        $('#username_success').show();
                    } else {
                        // Sinon
                        $('#username_error').show();
                        $('#username_success').hide();
                    }
                },
                'JSON');
    });
    //L'evenement blur fonctionne au moment où le champ perd le focus
    $('#email').blur(function () {
        /**La méthode post attends plusieurs commentaires : 
         * _L'url de la page PHP à executer
         * _Les paramètres à passer en POST
         * _Les actions à effectuer avec le retour du PHP
         * _Le format de donnée utilisé en retour de PHP
         **/
        $.post('controllers/addUserCtrl.php',
                {
                    verifEmail: $('#email').val() //le $_POST['verifEmail'] prend le contenu de l'input
                },
                function (data) {
                    //dans data c'est le json généré dans le controlleur grâce à la méthode json_encode
                    response = data.response;
                    // Si le champ de l'email est vide
                    if ($('#email').val() == '') {
                        // On cache les messages d'erreur et de succès
                        $('#email_error').hide();
                        $('#email_success').hide();
                    } else if (response == 0) {
                        // Sinon si il le username est diponible on affiche le message de succès et on cache le message d'erreur
                        $('#email_error').hide();
                        $('#email_success').show();
                    } else {
                        // Sinon
                        $('#email_error').show();
                        $('#email_success').hide();
                    }
                },
                'JSON');
    });
});
/*
 * fonction qui permet a la modal de reste ouverte et afficher les message d'erreur en cas d'erreur dans les champ au moment de la connection
 */
$(function () {
    $('#connexion').click(function () {
        $.post('controllers/indexCtrl.php',
                {
                    verifUsername: $('#co_username').val(),
                    verifPassword: $('#passwordUp').val()
                },
                function (data) {
                    result = data.result;
                    if (result == true) {
                        location.reload();
                    } else {
                        $('.connectError').show();
                    }
                },
                'JSON');
    });
});


