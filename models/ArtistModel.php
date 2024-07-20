<?php

require_once(__DIR__ . '/../config/database.php');

class ArtistModel {

    // Establishes a connection with the database.
    private $conn;

    public function __construct() {
        $this->conn = getConnection(); // Assumes getConnection() function from database.php
    }

    // The following function gets all of the information of the artists table and returns that query so it can be used by the controller
    // for listing purposes.
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

    // The following function adds an artist to the artists table, given the argument of artist_name. If the variable
    // is true, then the function runs the query to add an artist to the database given the information that the user provides
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

    // The following function deletes an artist from the artists table given the argument of artist_id. Once that is 
    // provided, the function will run the query to delete the artist from the artists table
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

    // The following function updates an artist in the artists table needing the arguments of artist_id and
    // artist_name in order for the function to operate. If those variables reurn the boolean of true,
    // then the function will run the query updating the artist name.
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

    // The following function runs a query to get the songs that have the corresponding artist_id that is used
    // as an argument for the function to operate. It returns hose results for the controller to use for
    // artist_view.php.
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

    // The following function gets a distinct album title and album id from the songs_view table using artist_id
    // as an argument for the function to properly operate. It returns those results for the controller to use
    // for artist_view.php.
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

    // The following function gets an artist name from the artists table given the artist_id as an argument
    // in order to narrow down the serach results of the query. It returns those results for the controller
    // to use for artist_view.php.
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