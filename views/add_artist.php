<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Artist</title>
    <link rel="stylesheet" href="./assets/add_form.css" />
</head>
<body>
    <nav class="navMenu">
        <a href="index.php">Home Page</a>
        <a href="index.php?action=list">Song List</a>
        <a href="index.php?action=add_song">Add Song</a>
        <a href="index.php?action=add_artist"><b>Add Artist</b></a>  
    </nav>
    <div class="container">
        <h1>Add an Artist to the Database Here!</h1>
        <div class="sub-container" id="add-artist-form">
            <?php if (isset($_GET['status'])): ?>
                <?php if ($_GET['status'] === 'success'): ?>
                    <p style="color: green;">Successfully added artist to database!</p>
                <?php elseif ($_GET['status'] === 'error'): ?>
                    <p style="color: red;">Error adding artist.</p>
                <?php endif; ?>
            <?php endif; ?>
            <form action="index.php?action=add_artist" method="post">
                <label for="artist_name">Artist to Add:</label>
                <input type="text" name="artist_name" id="artist_name" required />
                <br><br>
                <button type="submit">Add Artist</button>
            </form>
        </div>
    </div>
</body>
</html>
