<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Song</title>
    <link rel="stylesheet" href="./assets/add_form.css" />
</head>
<body>
    <nav class="navMenu">
        <a href="index.php">Home Page</a>
        <a href="index.php?action=list">Song List</a>
        <a href="index.php?action=add_song"><b>Add Song</b></a>
        <a href="index.php?action=add_artist">Add Artist</a>      
    </nav>
    <div class="container">
        <h1>Add a Song to the Database Here!</h1>
        <div class="sub-container">
            <?php if (isset($_GET['status'])): ?>
                <?php if ($_GET['status'] === 'success'): ?>
                    <p style="color: green;">Successfully added song to database!</p>
                <?php elseif ($_GET['status'] === 'error'): ?>
                    <p style="color: red;">Error adding song.</p>
                <?php endif; ?>
            <?php endif; ?>
            <form action="index.php?action=add_song" method="post">
                <labe for="song_title">Song to Add:</label>
                <input type="text" name="song_title" id="song_title" required />
                <br>
                
                <label for="artist_id">Artist:</label>
                <select id="artist_id" name="artist_id" required>
                    <option value="" selected>Select Artist</option>
                    <?php foreach($artists as $artist) : ?>
                        <option value="<?php echo $artist['artist_id']; ?>"><?php echo $artist['artist_name']; ?></option>
                    <?php endforeach; ?>
                </select>
                <br>

                <label for="album_id">Album:</label>
                <select id="album_id" name="album_id">
                    <option value="" selected>Select Album</option>
                    <?php foreach($albums as $album) : ?>
                        <option value="<?php echo $album['album_id']; ?>"><?php echo $album['album_title']; ?></option>
                    <?php endforeach; ?>
                </select>
                <br>
                
                <label for="genre_id">Genre:</label>
                <select id="genre_id" name="genre_id">
                    <option value="" selected>Select Genre</option>
                    <?php foreach($genres as $genre) : ?>
                        <option value="<?php echo $genre['genre_id']; ?>"><?php echo $genre['genre_name']; ?></option>
                    <?php endforeach; ?>
                </select>
                <br>
                
                <label for="length">Length:</label>
                <input type="text" name="length" id="length" />
                <br>
                
                <label for="year_released">Year Released:</label>
                <input type="text" name="year_released" id="year_released" />
                <br><br>

                <button type="submit">Add Song</button>
            </form>
        </div>
        <br><br>
        <div class="sub-container">
            <p>If the artist for the song you are adding is not in the list of available artists, please add them by going to the 
            <a href="index.php?action=add_artist">Add Artist</a> page as you cannot add a song without the proper artist.</p>
        </div>
    </div>
</body>
</html>
