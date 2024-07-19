<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Song View</title>
        <link rel="stylesheet" href="./assets/view.css">
    </head>
    <body>
        <nav class="navMenu">
            <a href="index.php">Home Page</a>
            <a href="index.php?action=list">Song List</a>
            <a href="index.php?action=add_song">Add Song</a>
            <a href="index.php?action=add_artist">Add Artist</a>
        </nav>
        <div class="container">
            <div class="sub-container">
            <?php if ($songDetails): ?>
                <h1><?php echo htmlspecialchars($songDetails['song_title']); ?></h1>
            </div>
            <br><br>
            <div class="sub-container">
                <p><strong>Artist:</strong> <a href="index.php?action=artist_view&artist_id=<?php echo $songDetails['artist_id']; ?>"><?php echo htmlspecialchars($songDetails['artist_name']); ?></a></p>
                <p><strong>Album:</strong> <a href="index.php?action=album_view&album_id=<?php echo $songDetails['album_id']; ?>"><?php echo htmlspecialchars($songDetails['album_title']); ?></a></p>
                <p><strong>Genre:</strong> <?php echo htmlspecialchars($songDetails['genre_name']); ?></p>
                <p><strong>Length:</strong> <?php echo htmlspecialchars($songDetails['length']); ?></p>
                <p><strong>Year Released:</strong> <?php echo htmlspecialchars($songDetails['year_released']); ?></p>
            </div>
            <?php else: ?>            
                <p>Song not found.</p>
            <?php endif; ?>
        </div>
    </body>
</html>
