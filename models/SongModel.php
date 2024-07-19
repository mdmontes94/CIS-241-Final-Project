<?php

require_once(__DIR__ . '/../config/database.php');

class SongModel {

    // Establishes a connection with the database.
    private $conn;

    public function __construct() {
        $this->conn = getConnection(); // Assumes getConnection() function from database.php
    }

    // The following function gets all of the information of the songs table and returns that query so it can be used by the controller.
    public function getAllSongs() {
        $querySongs = 'SELECT *
                       FROM songs';
        $statement = $this->conn->prepare($querySongs);
        $statement->execute();
        $allSongs = $statement->fetchAll();
        $statement->closeCursor();

        return $allSongs;
    }

    // The following function get all of the information from the songs view, orders it by the song_title column
    // and returns it for use in the controller for the list view.
    public function getSongList() {
        $querySongList = 'SELECT *
                          FROM songs_view
                          ORDER BY song_title';
        $statement = $this->conn->prepare($querySongList);
        $statement->execute();
        $songList = $statement->fetchAll();
        $statement->closeCursor();

        return $songList;
    }

    // The following function adds a song to the song table, given some arguments. If the variables of song_title and artist_id
    // are true, then the function runs the query to add a song to the database given the information that the user provides.
    public function addSong($song_title, $artist_id, $album_id, $genre_id, $length, $year_released) {
        if($song_title !== false && $artist_id !== false) {
            $query = 'INSERT INTO songs (song_title, artist_id, album_id, genre_id, length, year_released)
                      VALUES (:song_title, :artist_id, :album_id, :genre_id, :length, :year_released)';
            $statement = $this->conn->prepare($query);
            $statement->bindValue(':song_title', $song_title);
            $statement->bindValue(':artist_id', $artist_id);
            $statement->bindValue(':album_id', $album_id);
            $statement->bindValue(':genre_id', $genre_id);
            $statement->bindValue(':length', $length);
            $statement->bindValue(':year_released', $year_released);
            $success = $statement->execute();
            $statement->closeCursor();
            
            return $success;
        }
    }

    // The following function deletes a song from the songs table given the argument of song_id. Once that is provided,
    // the function will run the query to delete the song from the songs table.
    public function deleteSong($song_id) {
        if($song_id !== false) {
            $deleteQuery = 'DELETE FROM songs
                            WHERE song_id = :song_id';
            $statement = $this->conn->prepare($deleteQuery);
            $statement->bindValue(':song_id', $song_id);
            $success = $statement->execute();
            $statement->closeCursor();

            return $success;
        }
    }

    // The following function updates a song in the songs table using the same arguments as the addSong() function.
    // However, in order to run the query, the variables of song_id. song_title and artist_id must be true, so the
    // user can update the song information should they choose to.
    public function updateSong($song_id, $song_title, $artist_id, $album_id, $genre_id, $length, $year_released) {
        if($song_id !== false && $song_title && false && $artist_id !== false) {
            $updateQuery = 'UPDATE songs 
                            SET song_title = :song_title, artist_id = :artist_id, album_id = :album_id, genre_id = :genre_id, length = :length, year_released = :year_released
                            WHERE song_id = :song_id';
            $statement = $this->conn->prepare($updateQuery);
            $statement->bindValue(':song_id', $song_id);
            $statement->bindValue(':song_title', $song_title); 
            $statement->bindValue(':artist_id', $artist_id); 
            $statement->bindValue(':album_id', $album_id); 
            $statement->bindValue(':genre_id', $genre_id); 
            $statement->bindValue(':length', $length);
            $statement->bindValue(':year_released', $year_released);
            $success = $statement->execute();
            $statement->closeCursor();
            
            return $success;
        }
    }

    // The following function runs a query when the variable of song_id is provided as an argument that returns
    // a row from the songs_view table where the song_id variables match in order to get the specific song information
    // for song_view.php.
    public function getSongByID($song_id) {
        $idQuery = 'SELECT *
                    FROM songs_view
                    WHERE song_id = :song_id';
        $statement = $this->conn->prepare($idQuery);
        $statement->bindValue(':song_id', $song_id);
        $statement->execute();
        $success = $statement->fetch(PDO::FETCH_ASSOC);
        $statement->closeCursor();

        return $success;
    }
}

?>