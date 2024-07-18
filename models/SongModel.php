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
                          ORDER BY artist_name, year_released';
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

}

?>