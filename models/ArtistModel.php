<?php

require_once(__DIR__ . '/../config/database.php');

class ArtistModel {

    private $conn;

    public function __construct() {
        $this->conn = getConnection(); // Assumes getConnection() function from database.php
    }

    public function getAllArtists() {
        $queryArtists = 'SELECT *
                         FROM artists
                         ORDER BY artist_name';
        $statement = $this->conn->prepare($queryArtists);
        $statement->execute();
        $allArtists = $statement->fetchAll();
        $statement->closeCursor();

        return $allArtists;
    }

    public function addArtist($artist_name) {
        if ($artist_name !== false) {
            $query = 'INSERT INTO artists (artist_name)
                      VALUES (:artist_name)';
            $statement = $this->conn->prepare($query);
            $statement->bindValue(':artist_name', $artist_name);
            $success = $statement->execute();
            $statement->closeCursor();

            return $success;
        }
    }

}

?>