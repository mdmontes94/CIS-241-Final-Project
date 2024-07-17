<?php
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>List View</title>
        <link rel="stylesheet" href="./assets/list.css">
    </head>
    <body>
        <div class="container">
            <div class ="sub-container">
                <select>
                    <?php foreach($artists as $artist) : ?>
                    <option><?php echo $artist['artist_name']; ?></option>
                    <?php endforeach; ?>
                </select>
                <select>
                    <?php foreach($albums as $album) : ?>
                    <option><?php echo $album['album_title']; ?></option>
                    <?php endforeach; ?>
                </select>
                <select>
                    <?php foreach($genres as $genre) : ?>
                    <option><?php echo $genre['genre_name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="sub-container">
                <table class="songs">
                    <tr>
                        <th>Song Title</th>
                        <th>Artist</th>
                        <th>Album</th>
                        <th>Genre</th>
                        <th>Length</th>
                        <th>Year Released</th>
                    </tr>
                    <?php foreach ($songList as $song) : ?>
                    <tr>
                        <td><?php echo $song['song_title']; ?></td>
                        <td><?php echo $song['artist_name']; ?></td>
                        <td><?php echo $song['album_title']; ?></td>
                        <td><?php echo $song['genre_name']; ?></td>
                        <td><?php echo $song['length']; ?></td>
                        <td><?php echo $song['year_released']; ?></td> 
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </body>
</html>