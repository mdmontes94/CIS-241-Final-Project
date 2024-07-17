<?php

require_once('./models/SongModel.php');

class SongController {
    private $songModel;

    public function __construct(SongModel $songModel) {
        $this->songModel = $songModel;
    }

    public function getAllSongs() {
       $songs = $this->songModel->getAllSongs(); 
    }

    public function getSongList() {
        $songList = $this->songModel->getSongList();

        include('views/list_view.php');
    }
}

?>