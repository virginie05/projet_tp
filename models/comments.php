<?php

class comments extends database {

    /**
     * Création des attributs
     */
    public $id = 0;
    public $content = '';
    public $addDate = '';
    public $title = '';
    public $idComment = 0;
    public $id_projettp_users = 0;
    public $id_projettp_films = 0;
    protected $pdo;

    /**
     * Fonction permettant de construire la classe user
     */
    public function __construct() {
        parent::__construct();
        $this->connectDB();
    }

}
