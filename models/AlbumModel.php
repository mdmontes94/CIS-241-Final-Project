<?php

require_once(__DIR__ . '/../config/database.php');

class AlbumModel {

    private $conn;

    public function __construct() {
        $this->conn = getConnection(); // Assumes getConnection() function from database.php
    }

    public function getAllAlbums() {
        $queryAlbums = 'SELECT *
                       FROM albums
                       ORDER BY album_title';
        $statement = $this->conn->prepare($queryAlbums);
        $statement->execute();
        $allAlbums = $statement->fetchAll();
        $statement->closeCursor();

        return $allAlbums;
    }

    public function addAlbum($album_title) {
        if ($album_name !== false) {
            $query = 'INSERT INTO albums (album_title)
                      VALUES (:album_title)';
            $statement = $this->conn->prepare($query);
            $statement->bindValue(':album_title', $album_title);
            $success = $statement->execute();
            $statement->closeCursor();

            return $success;
        }
    }

    public function deleteAlbum($album_id) {
        if($album_id !== false) {
            $deleteQuery = 'DELETE FROM albums
                            WHERE album_id = :album_id';
            $statement = $this->conn->prepare($deleteQuery);
            $statement->bindValue(':album_id', $album_id);
            $success = $statement->execute();
            $statement->closeCursor();

            return $success;
        }
    }

    public function updateAlbum($album_id, $album_title) {
        if($album_id !== false && $album_title !== false) {
            $updateQuery = 'UPDATE albums
                            SET album_title = :album_title
                            WHERE album_id = :album_id';
            $statement = $this->conn->prepare($updateQuery);
            $statement->bindValue(':album_title', $album_title);
            $statement->bindValue(':album_id', $album_id);
            $success = $statement->execute();
            $statement->closeCursor();

            return $success;
        }
    }

    public function getSpecifiedAlbum($album_id) {
        $artistQuery = 'SELECT album_title 
                        FROM albums
                        WHERE album_id = :album_id';
        $statement = $this->conn->prepare($artistQuery);
        $statement->bindValue(':album_id', $album_id);
        $statement->execute();
        $success = $statement->fetch(PDO::FETCH_ASSOC);
        $statement->closeCursor();

        return $success;
    }

    public function getSongsByAlbum($album_id) {
        $songsQuery = 'SELECT song_id, song_title
                       FROM songs_view
                       WHERE album_id = :album_id';
        $statement = $this->conn->prepare($songsQuery);
        $statement->bindValue(':album_id', $album_id);
        $statement->execute();
        $success = $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();

        return $success;
    }

}

?>