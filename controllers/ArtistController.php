<?php

require_once('./models/ArtistModel.php');

class AlbumController {
    private $artistModel;

    public function __construct(ArtistModel $artistModel) {
        $this->artistModel = $artistModel;
    }
}

?>