<?php

require_once(__DIR__ . '/../config/database.php');

class GenreModel {
    
    // Establishes a connection with the database.
    private $conn;

    public function __construct() {
        $this->conn = getConnection(); // Assumes getConnection() function from database.php
    }

    // The following function gets all of the information of the genres table and returns that query so it can be used by the controller
    // for listing purposes.
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

    // The following function adds an genre to the genres table, given the argument of genre_name. If the variable
    // is true, then the function runs the query to add a genre to the database given the information that the user provides.
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

    // The following function deletes an album from the albums table given the argument of album_id. Once that is 
    // provided, the function will run the query to delete the album from the albums table.
    public function deleteGenre($genre_id) {
        if($genre_id !== false) {
            $deleteQuery = 'DELETE FROM genres
                            WHERE genre_id = :genre_id';
            $statement = $this->conn->prepare($deleteQuery);
            $statement->bindValue(':genre_id', $genre_id);
            $success = $statement->execute();
            $statement->closeCursor();

            return $success;
        }
    }

    // The following function updates an album in the albums table needing the arguments of genre_id and
    // genre_name in order for the function to operate. If those variables return the boolean of true,
    // then the function will run the query updating the genre name.
    public function updateGenre($genre_id, $genre_name) {
        if($genre_id !== false && $genre_name !== false) {
            $updateQuery = 'UPDATE genres
                            SET genre_name = :genre_name
                            WHERE genre_id = :genre_id';
            $statement = $this->conn->prepare($updateQuery);
            $statement->bindValue(':genre_name', $genre_name);
            $statement->bindValue(':genre_id', $genre_id);
            $success = $statement->execute();
            $statement->closeCursor();

            return $success;
        }
    }

}

?>