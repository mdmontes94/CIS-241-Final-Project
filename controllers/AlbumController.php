<?php

require_once('./models/AlbumModel.php');

class AlbumController {
    
    // The conrtoller is constructed using the AlbumModel.
    private $albumModel;

    public function __construct(AlbumModel $albumModel) {
        $this->albumModel = $albumModel;
    }

    // The following function uses the getAllAlbums function from the AlbumModel, 
    // and returns an array in order to be used for the site.
    public function getAllAlbums() {
        $albums = $this->albumModel->getAllAlbums();

        return $albums;
    }

    // The following function implements the getSpecifiedAlbum function from the AlbumModel and returns that result
    // to the album_view.php page if it is successful. If not, it returns "false" and an error message.
    public function getSpecifiedAlbum($album_id) {
        if($album_id) {
            $album = $this->albumModel->getSpecifiedAlbum($album_id);
            return $album ? $album : false;
        }
        return false;
    }

    // The following function implements the getSongsByAlbum function from the AlbumModel and returns that result
    // to the album_view.php page if it is successful. If not, it returns "false" and an error message.
    public function getSongsByAlbum($album_id) {
        if($album_id) {
            $songs = $this->albumModel->getSongsByAlbum($album_id);
            return $songs ? $songs   : false;
        }
        return false;
    }   
}

?>