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
        include('views/artist_view.php');
        break;

    case 'song_view':
        require_once('controllers/SongController.php');
        $controller = new SongController($songModel, $albumModel, $artistModel, $genreModel);
        
        include('views/song_view.php');
        break;

    case 'add_song':
        require_once('controllers/SongController.php');
        $controller = new SongController($songModel, $albumModel, $artistModel, $genreModel);

        include('views/add_song.php');
        break;

    case 'add_artist':
        include('views/add_artist.php');
    default:
        # code...
        break;
}

?>