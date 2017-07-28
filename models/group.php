<?php
/*
 * 
 */
class group extends database {

    /**
     * Création des attributs
     */
    public $id = 0;
    public $name = '';
    protected $pdo;

    /**
     * Fonction permettant de construire la classe user
     */
    public function __construct() {
        parent::__construct();
        $this->connectDB();
    }

    public function groupList() {
        $select = 'SELECT `id`, `name` FROM `projettp_group`';
        $queryPrepare = $this->pdo->query($select);
        return $queryPrepare->fetchAll(PDO::FETCH_OBJ);
    }

}
