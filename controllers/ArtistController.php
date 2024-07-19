<?php

require_once('./models/ArtistModel.php');

class ArtistController {
    private $artistModel;

    public function __construct(ArtistModel $artistModel) {
        $this->artistModel = $artistModel;
    }

    public function getAllArtists() {
        $artists = $this->artistModel->getAllArtists();

        return $artists;
    }

    public function addArtist() {
        $artist_name = filter_input(INPUT_POST, 'artist_name');
        $success = $this->artistModel->addArtist($artist_name);
        
        if ($success) {
            header("Location: index.php?action=add_artist&status=success");
            exit;
        } 
        else {
            header("Location: index.php?action=add_artist&status=error");
            exit;
        }
    }

    public function getSongsByArtist($artist_id) {
        if($artist_id) {
            $songs = $this->artistModel->getSongsByArtist($artist_id);
            return $songs ? $songs : false;
        }
        return false;
    }

    public function getAlbumsByArtist($artist_id) {
        if($artist_id) {
            $albums = $this->artistModel->getAlbumsByArtist($artist_id);
            return $albums ? $albums : false;
        }
        return false;
    }

    public function getSpecifiedArtist($artist_id) {
        if($artist_id) {
            $artist = $this->artistModel->getSpecifiedArtist($artist_id);
            return $artist ? $artist : false;
        }
        return false;
    }
}

?>