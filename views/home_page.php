<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home Page</title>
        <link rel="stylesheet" href="./assets/home.css" />
    </head>
    <body>
        <nav class="navMenu">
            <a href="index.php"><b>Home Page</b></a>
            <a href="index.php?action=list">Song List</a>
            <a href="index.php?action=add_song">Add Song</a>
            <a href="index.php?action=add_artist">Add Artist</a>      
        </nav>
        <div class="container">
            <h1>It's a Mario's Music Manager!</h1>
            <h2>You can do things from:</h2>
            <ul>
                <li>Viewing all of the songs in a list</li>
                <li>Filtering that list by artist, genre, or album</li>
                <li>Viewing what songs and albums are under specific artists</li>
                <li>Getting specific song details</li>
                <li>And even adding songs and artists to the list!</li>
            </ul>
            <h1>So have fun with the Musical World of a me, Mario!</h1>
            <img id="conductor" src="./assets/mario_conductor.png" alt="Mario conducting" />
            <img id="sax" src="./assets/mario_sax.png" alt="Mario playing saxophone" />
            <img id="keyboard" src="./assets/musical_mario.png" alt="Mario playing keyboard" />
        </div>
    </body>
</html>