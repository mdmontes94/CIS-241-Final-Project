<?php

require_once('./models/AlbumModel.php');
require_once('./models/ArtistModel.php');
require_once('./models/GenreModel.php');
require_once('./models/SongModel.php');

$albumModel = new AlbumModel();
$artistModel = new ArtistModel();
$genreModel = new GenreModel();
$songModel = new SongModel();

$action = $_GET['action'] ?? 'home_page';

switch ($action) {
    case 'home_page':
        include('views/home_page.php');
        break;
    
    case 'list':
        require_once('controllers/SongController.php');
        $controller = new SongController($songModel, $albumModel, $artistModel, $genreModel);

        $songList = $controller->getSongList();
        $artists = $controller->getAllArtists();
        $albums = $controller->getAllAlbums();
        $genres = $controller->getAllGenres();

        include('views/list_view.php');
        break;

    case 'artist_view':
        require_once('controllers/ArtistController.php');
        $controller = new ArtistController($artistModel);
        $artist_id = $_GET['artist_id'] ?? '';

        if($artist_id) {
            $artist = $controller->getSpecifiedArtist($artist_id);
            $songs = $controller->getSongsByArtist($artist_id);
            $albums = $controller->getAlbumsByArtist($artist_id);
        }
        
        include('views/artist_view.php');
        break;

    case 'song_view':
        require_once('controllers/SongController.php');
        $controller = new SongController($songModel, $albumModel, $artistModel, $genreModel);
        $song_id = $_GET['song_id'] ?? '';

        if ($song_id) {
            $songDetails = $controller->getSongByID($song_id);
        }
    
        include('views/song_view.php');
        break;

    case 'add_song':
        require_once('controllers/SongController.php');
        $controller = new SongController($songModel, $albumModel, $artistModel, $genreModel);

        $artists = $controller->getAllArtists();
        $albums = $controller->getAllAlbums();
        $genres = $controller->getAllGenres();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->addSong();
        } 
        else {
            include('views/add_song.php');
        }
        break;

    case 'add_artist':
        require_once('controllers/ArtistController.php');
        $controller = new ArtistController($artistModel);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->addArtist();
        } 
        else {
            include('views/add_artist.php');
        }
        break;
    default:
        # code...
        break;
}

?>