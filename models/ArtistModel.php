<?php

require_once(__DIR__ . '/../config/database.php');

class ArtistModel {

    private $conn;

    public function __construct() {
        $this->conn = getConnection(); // Assumes getConnection() function from database.php
    }
    
}

?>