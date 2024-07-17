<?php
 require_once('controllers/SongController.php')
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>List View</title>
    </head>
    <body>
        <div class="contatiner">
            <div class ="sub-container">
            </div>
            <div class="sub-container">
                <table>
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
                        <td><?php echo $card['artist_name']; ?></td>
                        <td><?php echo $card['album_title']; ?></td>
                        <td><?php echo $card['genre_name']; ?></td>
                        <td><?php echo $card['length']; ?></td>
                        <td><?php echo $card['year_released']; ?></td>   
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </body>
</html>