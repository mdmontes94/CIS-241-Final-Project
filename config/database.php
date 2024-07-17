<?php

function getConnection() {
    $dataURL = 'mysql:host=localhost;dbname=music_site;charset=utf8';
    $user = 'AHon209';
    $pass = '5outh3ast';

    try {
        $db = new PDO($dataURL, $user, $pass);
        return $db;
    } 
    catch(PDOException $e) {
        $error = $e->getMessage();
        echo "<p>Connection Error: $error </p>";
        return null;
    }
}

?>