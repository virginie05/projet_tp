<?php

class likes extends database {

    /**
     * Création des attributs
     */
    public $id = 0;
    public $vote = '';
    public $id_projettp_video = 0;
    public $id_projettp_users = 0;
    protected $pdo;

    /**
     * Fonction permettant de construire la classe user
     */
    public function __construct() {
        parent::__construct();
        $this->connectDB();
    }

}
