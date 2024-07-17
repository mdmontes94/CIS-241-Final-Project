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
            footer("Successfully added artist to database!");
        } 
        else {
            echo "Error adding artist.";
        }
        exit; 
    }
}

?>