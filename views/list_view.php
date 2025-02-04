<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>List View</title>
        <link rel="stylesheet" href="./assets/list.css">
        <script>window.songListData = <?php echo json_encode($songList); ?>;</script>
        <script src="./assets/filterList.js"></script>
    </head>
    <body>
        <nav class="navMenu">
            <a href="index.php">Home Page</a>
            <a href="index.php?action=list"><b>Song List</b></a>
            <a href="index.php?action=add_song"><b>Add Song</b></a>
            <a href="index.php?action=add_artist">Add Artist</a>          
        </nav>
        <div class="container">
            <div class="sub-container">
                <h1>Filter Options</h1>
                <form id="artistForm">
                    <label>Filter by Artist:</label>
                    <select id="artistSelect" name="artistSelect">
                        <option value="">All Artists</option>
                        <?php foreach($artists as $artist) : ?>
                        <option value="<?php echo $artist['artist_name']; ?>"><?php echo $artist['artist_name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <button type="submit">Filter Artists</button>
                </form>
                <br>
                <form id="albumForm">
                    <label>Filter by Album:</label>
                    <select id="albumSelect" name="albumSelect">
                        <option value="">All Albums</option>
                        <?php foreach($albums as $album) : ?>
                        <option value="<?php echo $album['album_title']; ?>"><?php echo $album['album_title']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <button type="submit">Filter Albums</button>
                </form>
                <br>
                <form id="genreForm">
                    <label>Filter by Genre:</label>
                    <select id="genreSelect" name="genreSelect">
                        <option value="">All Genres</option>
                        <?php foreach($genres as $genre) : ?>
                        <option value="<?php echo $genre['genre_name']; ?>"><?php echo $genre['genre_name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <button type="submit">Filter Genres</button>
                </form>
            </div>
            <br><br>
            <div class="sub-container">
                <h1>Song List</h1>
                <table id="songTable" class="songs">
                    <thead>
                        <tr>
                            <th>Song Title</th>
                        </tr>
                    </thead>
                    <tbody id="songTableBody">
                        <?php foreach ($songList as $song) : ?>
                        <tr data-artist="<?php echo $song['artist_name']; ?>" data-album="<?php echo $song['album_title']; ?>" data-genre="<?php echo $song['genre_name']; ?>">
                            <td><a href="index.php?action=song_view&song_id=<?php echo $song['song_id']; ?>"><?php echo $song['song_title']; ?></a></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
