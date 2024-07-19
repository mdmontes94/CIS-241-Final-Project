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

    public function getSongsByArtist($artist_id) {
        $artistQuery = 'SELECT song_id, song_title
                       FROM songs_view
                       WHERE artist_id = :artist_id';
        $statement = $this->conn->prepare($artistQuery);
        $statement->bindValue(':artist_id', $artist_id);
        $statement->execute();
        $success = $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();

        return $success;
    }

    public function getAlbumsByArtist($artist_id) {
        $albumQuery = 'SELECT DISTINCT album_title, album_id
                       FROM songs_view
                       WHERE artist_id = :artist_id';
        $statement = $this->conn->prepare($albumQuery);
        $statement->bindValue(':artist_id', $artist_id);
        $statement->execute();
        $success = $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();

        return $success;
    }

    public function getSpecifiedArtist($artist_id) {
        $artistQuery = 'SELECT artist_name FROM artists WHERE artist_id = :artist_id';
        $statement = $this->conn->prepare($artistQuery);
        $statement->bindValue(':artist_id', $artist_id);
        $statement->execute();
        $success = $statement->fetch(PDO::FETCH_ASSOC);
        $statement->closeCursor();

        return $success;
    }

}

?>