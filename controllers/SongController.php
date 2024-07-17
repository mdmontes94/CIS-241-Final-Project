<?php

require_once('./models/SongModel.php');

class SongController {
    private $songModel;

    public function __construct(SongModel $songModel) {
        $this->songModel = $songModel;
    }
}

?>