<?php

require_once('./models/AlbumModel.php');
require_once('./models/ArtistModel.php');
require_once('./models/GenreModel.php');
require_once('./models/SongModel.php');

$albumModel = new AlbumModel();
$artistModel = new ArtistModel();
$genreModel = new GenreModel();
$songModel = new SongModel();

$action = $_GET['action'] ?? 'main_page';

switch ($action) {
    case 'home_page':
        include('views/home_page.php');
        break;
    
    case 'list':
        require_once('controllers/SongController.php');
        $controller = new SongController($songModel);
        $controller->getSongList();
        break;

    default:
        # code...
        break;
}

?>