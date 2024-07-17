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
}

?>