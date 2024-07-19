<?php

require_once('./models/AlbumModel.php');

class AlbumController {
    private $albumModel;

    public function __construct(AlbumModel $albumModel) {
        $this->albumModel = $albumModel;
    }

    public function getAllAlbums() {
        $albums = $this->albumModel->getAllAlbums();

        return $albums;
    }

    public function getSpecifiedAlbum($album_id) {
        if($album_id) {
            $album = $this->albumModel->getSpecifiedAlbum($album_id);
            return $album ? $album : false;
        }
        return false;
    }

    public function getSongsByAlbum($album_id) {
        if($album_id) {
            $songs = $this->albumModel->getSongsByAlbum($album_id);
            return $songs ? $songs : false;
        }
        return false;
    }   
}

?>