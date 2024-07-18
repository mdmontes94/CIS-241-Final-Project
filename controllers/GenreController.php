<?php

require_once('./models/GenreModel.php');

class GenreController {
    private $genreModel;

    public function __construct(GenreModel $genreModel) {
        $this->genreModel = $genreModel;
    }

    public function getAllGenres() {
        $genres = $this->genreModel->getAllGenres(); 
 
        return $genres;
     }
}

?>