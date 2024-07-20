document.addEventListener("DOMContentLoaded", function() {
    const artistForm = document.getElementById('artistForm');
    const albumForm = document.getElementById('albumForm');
    const genreForm = document.getElementById('genreForm');
    const songTableBody = document.getElementById('songTableBody');

    artistForm.addEventListener('submit', function(event) {
        event.preventDefault();
        filterSongs(artistForm.elements['artistSelect'].value, '', '');
    });

    albumForm.addEventListener('submit', function(event) {
        event.preventDefault();
        filterSongs('', albumForm.elements['albumSelect'].value, '');
    });

    genreForm.addEventListener('submit', function(event) {
        event.preventDefault();
        filterSongs('', '', genreForm.elements['genreSelect'].value);
    });

    function filterSongs(artistValue, albumValue, genreValue) {
        Array.from(songTableBody.rows).forEach(function(row) {
            const artist = row.getAttribute('data-artist');
            const album = row.getAttribute('data-album');
            const genre = row.getAttribute('data-genre');

            const showArtist = artistValue === '' || artist === artistValue;
            const showAlbum = albumValue === '' || album === albumValue;
            const showGenre = genreValue === '' || genre === genreValue;

            row.style.display = showArtist && showAlbum && showGenre ? '' : 'none';
        });
    }
});

