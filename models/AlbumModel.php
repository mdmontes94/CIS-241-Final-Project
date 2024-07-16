<?php

require_once(__DIR__ . '/../config/database.php');

class AlbumModel {

    private $conn;

    public function __construct() {
        $this->conn = getConnection(); // Assumes getConnection() function from database.php
    }

    public function getAllAlbums () {
        $queryAlbums = 'SELECT *
                       FROM albums';
        $statement = $this->conn->prepare($querySongs);
        $statement->execute();
        $allAlbums = $statement->fetchAll();
        $statement->closeCursor();

        return $allAlbums;
    }

}

?>