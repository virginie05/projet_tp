<?php

class image extends database {

    /**
     * Création des attributs
     */
    public $id = 0;
    public $name = '';
    public $link = '';
    public $id_projettp_films = 0;
    protected $pdo;

    /**
     * connection a la base de donnée
     */
    public function __construct() {
        parent::__construct();
        $this->connectDB();
    }

    /**
     * Fonction permettant l'ajout d'une image
     */
    public function addImage() {
        $insert = 'INSERT INTO `projettp_images` (`name`,`link`,`id_projettp_films`) VALUES (:name,:link,:id_projettp_films)';
        $queryPrepare = $this->pdo->prepare($insert);
        $queryPrepare->bindValue(':name', $this->name, PDO::PARAM_STR);
        $queryPrepare->bindValue(':link', $this->link, PDO::PARAM_STR);
        $queryPrepare->bindValue(':id_projettp_films', $this->id_projettp_films, PDO::PARAM_INT);
        if ($queryPrepare->execute()) {
            return true;
        }
    }

}
