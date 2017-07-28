<?php

class user extends database{

    /**
     * Création des attributs
     */
    public $id = 0;
    public $username = '';
    public $password = '';
    public $email = '';
    public $id_projettp_group = 0;
    protected $pdo;
    /**
     * Fonction permettant de construire la classe user
     */
    public function __construct() {
        parent::__construct();
        $this->connectDB();
    }
    /**
     * Fonction permettant l'ajout d'un utilisateur
     */
    public function addUser() {
        $insert = 'INSERT INTO `projettp_users` (`username`,`password`,`email`,`id_projettp_group`) VALUES (:username,:password,:email,:id_projettp_group)';
        $queryPrepare = $this->pdo->prepare($insert);
        $queryPrepare->bindValue(':username', $this->username, PDO::PARAM_STR);
        $queryPrepare->bindValue(':password', $this->password, PDO::PARAM_STR);
        $queryPrepare->bindValue(':email', $this->email, PDO::PARAM_STR);
        $queryPrepare->bindValue(':id_projettp_group', $this->id_projettp_group, PDO::PARAM_STR);
        return $queryPrepare->execute();
    }

    /**
     * Fonction qui permet de recupéré les info de l'utilisateur
     */
    public function getUser() {
        $select = 'SELECT `id`, `username`,`email`, `id_projettp_group` FROM `projettp_users` WHERE `username`= :username';
        $queryPrepare = $this->pdo->prepare($select);
        $queryPrepare->bindValue(':username', $this->username, PDO::PARAM_STR);
        $queryPrepare->execute();
        $getUser = $queryPrepare->fetch(PDO::FETCH_OBJ);
        $this->id = $getUser->id;
        $this->email = $getUser->email;
        $this->id_projettp_group = $getUser->id_projettp_group;
    }

    /**
     * Fonction permettant de récupérer le hash en fonction du username
     */
    public function getHashByUser() {
        $isOk = false;
        $select = 'SELECT `password` FROM `projettp_users` WHERE `username`= :username ';
        $queryPrepare = $this->pdo->prepare($select);
        $queryPrepare->bindValue(':username', $this->username, PDO::PARAM_STR);
        //Si la requête s'éxecute sans erreur
        if ($queryPrepare->execute()) {
            //On récupère le hash
            $result = $queryPrepare->fetch(PDO::FETCH_OBJ);
            //Si resulte est un objet (donc si on a récupéré et stocké notre résultat dans result)
            if (is_object($result)) {
                //On donne à l'attribut de notre objet créé dans le controller la valeur de l'attribut password de notre objet resultat
                $this->password = $result->password;
                //On passe notre variable à true, pour dire qu'il n'y a pas d'erreur
                $isOk = true;
            }
        }
        //Si $isOk est à false, aucune condition n'est remplie, il y a une erreur, on pourra afficher un message
        //Si elle est à true, toutes les conditions sont remplies est on pourra éxécuter la suite
        return $isOk;
    }

    /**
     * Fonction permettant verifier si l'username n'existe pas deja
     * @return INT
     */
    public function checkUser() {
        $select = 'SELECT COUNT(*) AS `exists` FROM `projettp_users` WHERE `username` = :username';
        $queryPrepare = $this->pdo->prepare($select);
        $queryPrepare->bindValue(':username', $this->username, PDO::PARAM_STR);
        if ($queryPrepare->execute()) {
            $result = $queryPrepare->fetch(PDO::FETCH_OBJ);
            if (is_object($result)) {
                $this->exists = $result->exists;
            }
        }
        return $result->exists;
    }

    /**
     * Fonction qui permet de verifier si l'adresse email existe dans la BDD
     * @return type
     */
    public function checkEmail() {
        $select = 'SELECT COUNT(*) AS `exists` FROM `projettp_users` WHERE `email` = :email';
        $queryPrepare = $this->pdo->prepare($select);
        $queryPrepare->bindValue(':email', $this->email, PDO::PARAM_STR);
        if ($queryPrepare->execute()) {
            $result = $queryPrepare->fetch(PDO::FETCH_OBJ);
            if (is_object($result)) {
                $this->exists = $result->exists;
            }
        }
        return $result->exists;
    }

    /**
     * Fonction qui permet de modifier l'adresse email d'un utilisateur 
     */
    public function editUser() {
        $update = 'UPDATE `projettp_users` SET `email`= :email WHERE `id`= :userId';
        $queryPrepare = $this->pdo->prepare($update);
        $queryPrepare->bindValue(':userId', $this->id, PDO::PARAM_STR);
        $queryPrepare->bindValue(':email', $this->email, PDO::PARAM_STR);
        if ($queryPrepare->execute()) {
            $editUser = $queryPrepare->fetch(PDO::FETCH_OBJ);
            if (is_object($editUser)) {
                $this->email = $editUser->email;
            }
        }
    }

    /**
     *  Fonction qui permet de modifier le mot de passe d'un utilisateur 
     */
    public function editPasseword() {
        $update = 'UPDATE `projettp_users` SET `password`= :password WHERE `id`= :userId';
        $queryPrepare = $this->pdo->prepare($update);
        $queryPrepare->bindValue(':userId', $this->id, PDO::PARAM_STR);
        $queryPrepare->bindValue(':password', $this->password, PDO::PARAM_STR);
        if ($queryPrepare->execute()) {
            $editUser = $queryPrepare->fetch(PDO::FETCH_OBJ);
            if (is_object($editUser)) {
                $this->password = $editUser->password;
            }
        }
    }

    /**
     *  Fonction qui permet de changer l'utilisateur de group 
     */
    public function changeGroupUser() {
        $update = 'UPDATE `projettp_users` SET `id_projettp_group`= :id_projettp_group WHERE `username`= :username';
        $queryPrepare = $this->pdo->prepare($update);
        $queryPrepare->bindValue(':username', $this->username, PDO::PARAM_STR);
        $queryPrepare->bindValue(':id_projettp_group', $this->id_projettp_group, PDO::PARAM_INT);
        return $queryPrepare->execute();
    }

}
