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

    public function addGenre($genre_name) {
        if ($genre_name !== false) {
            $query = 'INSERT INTO genres (genre_name)
                      VALUES (:genre_name)';
            $statement = $this->conn->prepare($query);
            $statement->bindValue(':genre_name', $genre_name);
            $success = $statement->execute();
            $statement->closeCursor();

            return $success;
        }
    }

}

?>