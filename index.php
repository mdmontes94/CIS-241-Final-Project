<?php

require_once('./models/SongModel.php');

$action = $_GET['action'] ?? 'main_page';

switch ($action) {
    case 'main_page':
        include('views/main_page.php');
        break;
    
    case 'list':
        include('views/list_view.php');
        break;

    default:
        # code...
        break;
}

?>