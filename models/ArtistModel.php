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

    public function deleteArtist($artist_id) {
        if($artist_id !== false) {
            $deleteQuery = 'DELETE FROM artists
                            WHERE artist_id = :artist_id';
            $statement = $this->conn->prepare($deleteQuery);
            $statement->bindValue(':artist_id', $artist_id);
            $success = $statement->execute();
            $statement->closeCursor();

            return $success;
        }
    }

    public function updateArtist($artist_id, $artist_name) {
        if($artist_id !== false && $artist_name !== false) {
            $updateQuery = 'UPDATE artists
                            SET artist_name = :artist_name
                            WHERE artist_id = :artist_id';
            $statement = $this->conn->prepare($updateQuery);
            $statement->bindValue(':artist_name', $artist_name);
            $statement->bindValue(':artist_id', $artist_id);
            $success = $statement->execute();
            $statement->closeCursor();

            return $success;
        }
    }

}

?>