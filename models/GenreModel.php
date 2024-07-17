<?php

require_once(__DIR__ . '/../config/database.php');

class GenreModel {
    
    private $conn;

    public function __construct() {
        $this->conn = getConnection(); // Assumes getConnection() function from database.php
    }

    public function getAllGenres() {
        $queryGenres = 'SELECT *
                       FROM genres
                       ORDER BY genre_name';
        $statement = $this->conn->prepare($queryGenres);
        $statement->execute();
        $allGenres = $statement->fetchAll();
        $statement->closeCursor();

        return $allGenres;
    }

}

?>