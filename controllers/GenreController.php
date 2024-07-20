<?php

require_once('./models/GenreModel.php');

class GenreController {
    
    // The conrtoller is constructed using the GenreModel.
    private $genreModel;

    public function __construct(GenreModel $genreModel) {
        $this->genreModel = $genreModel;
    }

    // The following function uses the getAllGenres function from the GenreModel, 
    // and returns an array in order to be used for the site.
    public function getAllGenres() {
        $genres = $this->genreModel->getAllGenres(); 
 
        return $genres;
     }
}

?>