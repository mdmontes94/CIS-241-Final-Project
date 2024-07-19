<?php

require_once('./models/SongModel.php');
require_once('./models/AlbumModel.php');
require_once('./models/ArtistModel.php');
require_once('./models/GenreModel.php');

class SongController {
    
    // The conrtoller is constructed using the SongModel, AlbumModel, ArtistModel and GenreModel.
    private $songModel;
    private $albumModel;
    private $artistModel;
    private $genreModel;

    public function __construct(SongModel $songModel, AlbumModel $albumModel, ArtistModel $artistModel, GenreModel $genreModel) {
        $this->songModel = $songModel;
        $this->albumModel = $albumModel;
        $this->artistModel = $artistModel;
        $this->genreModel = $genreModel;
    }

    // The following function uses the getAllSongs function from the SongModel, 
    // and returns an array in order to be used for the site.
    public function getAllSongs() {
       $songs = $this->songModel->getAllSongs(); 

       return $songs;
    }

    // The following function uses the getSongList() function from the SongModel.
    // and returns an array in order for the songs to be listed in list_view.php.
    public function getSongList() {
        $songList = $this->songModel->getSongList();

        return $songList;
    }

    // The following function uses the getAllArtists() function from the ArtistModel in order to 
    // help with the filtering functions in list_view.php.
    public function getAllArtists() {
        $artists = $this->artistModel->getAllArtists();

        return $artists;
    }

    // The following function uses the getAllAlbums() function from the AlbumModel in order to 
    // help with the filtering functions in list_view.php.
    public function getAllAlbums() {
        $albums = $this->albumModel->getAllAlbums();

        return $albums;
    }

    // The following function uses the getAllGenres() function from the ArtistModel in order to 
    // help with the filtering functions in list_view.php.
    public function getAllGenres() {
        $genres = $this->genreModel->getAllGenres();

        return $genres; 
    }

    /* The following function uses the addSong() function from the SongModel in order to
       successfully add a song to the database. It sets the variables to the user input via
       the filter_input function using the post method. Depending on if it is successful,
       the page will reload with either a success/error message.
    */
    public function addSong() {
        $song_title = filter_input(INPUT_POST, 'song_title');
        $artist_id = filter_input(INPUT_POST, 'artist_id', FILTER_VALIDATE_INT);
        $album_id = filter_input(INPUT_POST, 'album_id', FILTER_VALIDATE_INT);
        $genre_id = filter_input(INPUT_POST, 'genre_id', FILTER_VALIDATE_INT);
        $length = filter_input(INPUT_POST, 'length');
        $year_released = filter_input(INPUT_POST, 'year_released', FILTER_VALIDATE_INT);
        $success = $this->songModel->addSong($song_title, $artist_id, $album_id, $genre_id, $length, $year_released);
        
        if ($success) {
            header("Location: index.php?action=add_song&status=success");
            exit;
        } 
        else {
            header("Location: index.php?action=add_song&status=error");
            exit;
        }
    }

    // The following function implements the getSongByID function from the SongModel and returns that result
    // to the song_view.php page if it is successful. If not, it returns "false" and an error message.
    public function getSongByID($song_id) {
        if ($song_id) {
            $song = $this->songModel->getSongById($song_id);
            return $song ? $song : false;
        }
        return false;
    }
    
}

?>