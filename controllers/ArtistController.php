<?php

require_once('./models/ArtistModel.php');

class ArtistController {
    private $artistModel;

    public function __construct(ArtistModel $artistModel) {
        $this->artistModel = $artistModel;
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
}

?>