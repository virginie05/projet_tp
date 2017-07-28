<?php

class film extends database {

    /**
     * Création des attributs
     */
    public $id = 0;
    public $title = '';
    public $actor = '';
    public $releaseDate = '';
    public $postingDate = '';
    public $synopsis = '';
    public $id_projettp_users = 0;
    protected $pdo;

    /**
     * Fonction permettant de construire la classe film
     */
    public function __construct() {
        parent::__construct();
        $this->connectDB();
    }

    /**
     * Fonction permettant l'ajout d'un film
     */
    public function addFilms() {
        $insert = 'INSERT INTO `projettp_films` (`title`,`actor`, `releaseDate`, `postingDate`, `synopsis`, `id_projettp_users`) VALUES (:title,:actor,STR_TO_DATE(:releaseDate, \'%d/%m/%Y\'),NOW(),:synopsis,:id_projettp_users)';
        $queryPrepare = $this->pdo->prepare($insert);
        $queryPrepare->bindValue(':title', $this->title, PDO::PARAM_STR);
        $queryPrepare->bindValue(':actor', $this->actor, PDO::PARAM_STR);
        $queryPrepare->bindValue(':releaseDate', $this->releaseDate, PDO::PARAM_STR);
        $queryPrepare->bindValue(':synopsis', $this->synopsis, PDO::PARAM_STR);
        $queryPrepare->bindValue(':id_projettp_users', $this->id_projettp_users, PDO::PARAM_INT);
        if ($queryPrepare->execute()) {
            $this->id = $this->pdo->lastInsertId('id');
            return TRUE;
        }
    }

    /*
     * function qui permet d'afficher le contenu d'un film
     */

    public function showFilmInfo() {
        $select = 'SELECT `projettp_films`.`id` '
                . '`projettp_films`.`title` '
                . '`projettp_films`.`actor` '
                . '`projettp_films`.`releaseDate` '
                . '`projettp_films`.`postingDate` '
                . '`projettp_films`.`synopsis` '
                . '`projettp_images`.`name` '
                . '`projettp_images`.`link` '
                . '`projettp_video`.`name` '
                . '`projettp_video`.`addDate` '
                . '`projettp_video`.`isPrimary` '
                . '`projettp_video`.`url` '
                . '`projettp_users`.`username` '
                . 'FROM `projettp_films` '
                . 'INNER JOIN `projettp_images` ON `projettp_films`.`id` = `projettp_images`.`id_projettp_films` '
                . 'INNER JOIN `projettp_video` ON `projettp_films`.`id` = `projettp_video`.`id_projettp_films` '
                . 'INNER JOIN `projettp_users` ON `projettp_films`.`id_projettp_users` = `projettp_users`.`id` '
                . 'WHERE `projettp_films`.`id` = :id';
        $queryPrepare = $this->pdo->prepare($select);
        $queryPrepare->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryPrepare->execute();
        return $queryPrepare->fetch(PDO::FETCH_OBJ);
    }

    public function viewAllMovies() {
        $select = 'SELECT `projettp_films`. `id`, `projettp_films`.`title`, `projettp_images`.`link`  FROM  projettp_films '
        . 'INNER JOIN `projettp_images` '
        . 'ON `projettp_films`.`id` = `projettp_images`.`id_projettp_films`';
        $queryPrepare = $this->pdo->query($select);
        return $queryPrepare->fetchAll(PDO::FETCH_OBJ);
    }

}
