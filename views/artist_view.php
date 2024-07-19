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
            <?php if ($artist): ?>
                <h1>Artist: <?php echo htmlspecialchars($artist['artist_name']); ?></h1>
            </div>
            <div class="sub-container">
                <h3>Albums</h3>
                <?php foreach ($albums as $album) : ?>
                    <p><a href="index.php?action=album_view&album_id=<?php echo $album['album_id']; ?>"><?php echo htmlspecialchars($album['album_title']); ?></a></p>
                <?php endforeach; ?>
            </div>
            <div class="sub-container">
                <h3>Songs</h3>
                <?php foreach ($songs as $song) : ?>
                    <p><a href="index.php?action=song_view&song_id=<?php echo $song['song_id']; ?>"><?php echo htmlspecialchars($song['song_title']); ?></a></p>
                <?php endforeach; ?>
            </div>
            <?php else: ?>
                <p>Artist not found.</p>
            <?php endif; ?>
        </div>
    </body>
</html>