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

    public function addAlbum($album_name) {
        if ($album_name !== false) {
            $query = 'INSERT INTO albums (album_name)
                      VALUES (:album_name)';
            $statement = $this->conn->prepare($query);
            $statement->bindValue(':album_name', $album_name);
            $success = $statement->execute();
            $statement->closeCursor();

            return $success;
        }
    }

}

?>