//previsualisation image dans ajout d'un livre 
document.getElementById('book-image-upload').addEventListener('change', function (e) {
    const reader = new FileReader();
    reader.onload = function (e) {
        document.getElementById('book-preview').src = e.target.result;
    }
    if (this.files[0]) {
        reader.readAsDataURL(this.files[0]);
    }
});


// recherche dynamique dans nos livres à l'échange 
// On cible la barre de recherche et toutes les cartes des livres
const searchInput = document.querySelector('input[name="search"]');
const bookCards = document.querySelectorAll('.book-card');

// On écoute l'événement "input" (se déclenche à chaque lettre tapée)
searchInput.addEventListener('input', function () {

    // On récupère le texte tapé et on le met en minuscules
    const searchText = searchInput.value.toLowerCase();

    // On vérifie chaque livre un par un
    bookCards.forEach(function (card) {
        // On récupère le titre du livre (en minuscules aussi)
        const title = card.querySelector('.book-title').textContent.toLowerCase();

        //  Si le titre contient les lettres tapées, on l'affiche. Sinon, on le cache.
        if (title.includes(searchText)) {
            card.style.display = ''; // Laisse le livre visible
        } else {
            card.style.display = 'none'; // Cache le livre
        }
    });
});