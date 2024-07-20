<?php

require_once('./models/ArtistModel.php');

class ArtistController {
    
    // The conrtoller is constructed using the ArtistModel.
    private $artistModel;

    public function __construct(ArtistModel $artistModel) {
        $this->artistModel = $artistModel;
    }

    // The following function uses the getAllArtists function from the ArtistModel, 
    // and returns an array in order to be used for the site.
    public function getAllArtists() {
        $artists = $this->artistModel->getAllArtists();

        return $artists;
    }

    /* The following function uses the addArtist() function from the ArtistModel in order to
       successfully add a song to the database. It sets the variables needed for the function
       to the user input via the filter_input function using the post method. Depending on if 
       it is successful, the page will reload with either a success/error message.
    */
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

    // The following function implements the getSongsByArtist function from the ArtistModel and returns that result
    // to the artist_view.php page if it is successful. If not, it returns "false" and an error message.
    public function getSongsByArtist($artist_id) {
        if($artist_id) {
            $songs = $this->artistModel->getSongsByArtist($artist_id);
            return $songs ? $songs : false;
        }
        return false;
    }

    // The following function implements the getAlbumsByArtist function from the ArtistModel and returns that
    // result to the artist_view.php page if it is successful. If not, it returns "false" and an error message.
    public function getAlbumsByArtist($artist_id) {
        if($artist_id) {
            $albums = $this->artistModel->getAlbumsByArtist($artist_id);
            return $albums ? $albums : false;
        }
        return false;
    }

    // The following function implements the getSpecifiedArtist function from the ArtistModel and returns that result
    // to the artist_view.php page if it is successful. If not, it returns "false" and an error message.
    public function getSpecifiedArtist($artist_id) {
        if($artist_id) {
            $artist = $this->artistModel->getSpecifiedArtist($artist_id);
            return $artist ? $artist : false;
        }
        return false;
    }
}

?>