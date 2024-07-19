<?php

require_once(__DIR__ . '/../config/database.php');

class SongModel {

    private $conn;

    public function __construct() {
        $this->conn = getConnection(); // Assumes getConnection() function from database.php
    }

    public function getAllSongs() {
        $querySongs = 'SELECT *
                       FROM songs';
        $statement = $this->conn->prepare($querySongs);
        $statement->execute();
        $allSongs = $statement->fetchAll();
        $statement->closeCursor();

        return $allSongs;
    }

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