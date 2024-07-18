<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Song View</title>
        <link rel="stylesheet" href="./assets/song_view.css">
    </head>
    <body>
        <nav class="navMenu">
            <a href="index.php">Home Page</a>
            <a href="index.php?action=list">Song List</a>
            <a href="index.php?action=artist_view">Artists</a>
            <a href="index.php?action=add_song">Add Song</a>
            <a href="index.php?action=add_artist">Add Artist</a>
        </nav>
        <div class="container">
            <?php if ($songDetails): ?>
                <h1>Song: <?php echo htmlspecialchars($songDetails['song_title']); ?></h1>
                <p><strong>Artist:</strong> <?php echo htmlspecialchars($songDetails['artist_name']); ?></p>
                <p><strong>Album:</strong> <?php echo htmlspecialchars($songDetails['album_title']); ?></p>
                <p><strong>Genre:</strong> <?php echo htmlspecialchars($songDetails['genre_name']); ?></p>
                <p><strong>Length:</strong> <?php echo htmlspecialchars($songDetails['length']); ?></p>
                <p><strong>Year Released:</strong> <?php echo htmlspecialchars($songDetails['year_released']); ?></p>
            <?php else: ?>
                <p>Song not found.</p>
            <?php endif; ?>
        </div>
    </body>
</html>
