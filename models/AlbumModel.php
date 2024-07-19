<?php

require_once(__DIR__ . '/../config/database.php');

class AlbumModel {

    // Establishes a connection with the database.
    private $conn;

    public function __construct() {
        $this->conn = getConnection(); // Assumes getConnection() function from database.php
    }

    // The following function gets all of the information of the albums table and returns that query so it can be used by the controller
    // for listing purposes.
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

    // The following function adds an album to the albums table, given the argument of album_title. If the variable
    // is true, then the function runs the query to add an album to the database given the information that the user provides.
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

    // The following function deletes an album from the albums table given the argument of album_id. Once that is 
    // provided, the function will run the query to delete the album from the albums table.
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

    // The following function updates an album in the albums table needing the arguments of album_id and
    // album_title in order for the function to operate. If those variables reurn the boolean of true,
    // then the function will run the query updating the album title.
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

    // The following function gets an album title from the albums table given the album_id as an argument
    // in order to narrow down the serach results of the query. It returns those results for the controller
    // to use for album_view.php.
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

    // The following function runs a query to get the songs that have the corresponding album_id that is used
    // as an argument for the function to operate. It returns hose results for the controller to use for
    // album_view.php.
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