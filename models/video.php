<?php

class video extends database {

    /**
     * Création des attributs
     */
    public $id = 0;
    public $name = '';
    public $addDate = '';
    public $isPrimary = '';
    public $image = '';
    public $url = '';
    public $id_projettp_films = 0;
    protected $pdo;
    /**
     * Fonction permettant de construire la classe video
     */
     public function __construct() {
        parent::__construct();
        $this->connectDB();
    }
    /**
     * Fonction permettant l'ajout d'une video
     */
    public function addVideo() {
        $insert = 'INSERT INTO `projettp_video` (`name`,`addDate`,`url`, `id_projettp_films`) VALUES (:name,NOW(),:url,:id_projettp_films)';
        $queryPrepare = $this->pdo->prepare($insert);
        $queryPrepare->bindValue(':name', $this->name, PDO::PARAM_STR);
        $queryPrepare->bindValue(':url',$this->url, PDO::PARAM_STR);
        $queryPrepare->bindValue(':id_projettp_films', $this->id_projettp_films, PDO::PARAM_INT);
        return $queryPrepare->execute();
    }

}
