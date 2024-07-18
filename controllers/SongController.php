<?php

require_once('./models/SongModel.php');
require_once('./models/AlbumModel.php');
require_once('./models/ArtistModel.php');
require_once('./models/GenreModel.php');

class SongController {
    private $songModel;
    private $albumModel;
    private $artistModel;
    private $genreModel;

    public function __construct(SongModel $songModel, AlbumModel $albumModel, ArtistModel $artistModel, GenreModel $genreModel) {
        $this->songModel = $songModel;
        $this->albumModel = $albumModel;
        $this->artistModel = $artistModel;
        $this->genreModel = $genreModel;
    }

    public function getAllSongs() {
       $songs = $this->songModel->getAllSongs(); 

       return $songs;
    }

    public function getSongList() {
        $songList = $this->songModel->getSongList();

        return $songList;
    }

    public function getAllArtists() {
        $artists = $this->artistModel->getAllArtists();

        return $artists;
    }

    public function getAllAlbums() {
        $albums = $this->albumModel->getAllAlbums();

        return $albums;
    }

    public function getAllGenres() {
        $genres = $this->genreModel->getAllGenres();

        return $genres; 
    }

    public function addSong() {
        $song_title = filter_input(INPUT_POST, 'song_title');
        $artist_id = filter_input(INPUT_POST, 'artist_id', FILTER_VALIDATE_INT);
        $album_id = filter_input(INPUT_POST, 'album_id', FILTER_VALIDATE_INT);
        $genre_id = filter_input(INPUT_POST, 'genre_id', FILTER_VALIDATE_INT);
        $length = filter_input(INPUT_POST, 'length');
        $year_released = filter_input(INPUT_POST, 'year_released', FILTER_VALIDATE_INT);
        $success = $this->songModel->addSong($song_title, $artist_id, $album_id, $genre_id, $length, $year_released);
        
        if ($success) {
            header("Location: index.php?action=add_song&status=success");
            exit;
        } 
        else {
            header("Location: index.php?action=add_song&status=error");
            exit;
        }
    }
}

?>