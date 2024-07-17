<?php

require_once('./models/AlbumModel.php');

class AlbumController {
    private $albumModel;

    public function __construct(AlbumModel $albumModel) {
        $this->albumModel = $albumModel;
    }
}

?>