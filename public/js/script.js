// ==========================================================
// 1. PRÉVISUALISATION DE L'IMAGE (Page "Ajouter un livre")
// ==========================================================

let champImage = document.getElementById('book-image-upload');

if (champImage !== null) {

    champImage.addEventListener('change', function () {

        // On isole le fichier que l'utilisateur vient de sélectionner
        let fichierChoisi = this.files[0];

        if (fichierChoisi) {

            // On crée un outil capable de lire le fichier
            let lecteur = new FileReader();

            // On prépare ce qui se passe QUAND la lecture sera finie
            lecteur.onload = function (evenement) {
                // On remplace la fausse image par le résultat de la lecture
                document.getElementById('book-preview').src = evenement.target.result;
            };

            lecteur.readAsDataURL(fichierChoisi);
        }
    });
}

// ==========================================================
// 2. RECHERCHE DYNAMIQUE (Page "Nos livres à l'échange")
// ==========================================================

let barreRecherche = document.querySelector('input[name="search"]');

if (barreRecherche !== null) {

    let cartesLivres = document.querySelectorAll('.book-card');

    barreRecherche.addEventListener('input', function () {

        // On récupère ce qu'il a tapé, et on force tout en minuscules
        let texteTape = barreRecherche.value.toLowerCase();

        // On passe en revue chaque livre un par un
        cartesLivres.forEach(function (carte) {

            let titreLivre = carte.querySelector('.book-title').textContent.toLowerCase();

            if (titreLivre.includes(texteTape)) {
                carte.style.display = ''; // On laisse la carte visible
            } else {
                carte.style.display = 'none';
            }
        });
    });
}

// ==========================================================
// 3. PRÉVISUALISATION AVATAR (Page "Mon Compte")
// ==========================================================
let avatarUpload = document.getElementById('avatar_upload');

if (avatarUpload !== null) {
    avatarUpload.addEventListener('change', function () {
        let fichierChoisi = this.files[0];
        if (fichierChoisi) {
            let lecteur = new FileReader();
            lecteur.onload = function (evenement) {
                document.getElementById('avatar-preview').src = evenement.target.result;
            };
            lecteur.readAsDataURL(fichierChoisi);
        }
    });
}

// ==========================================================
// 4. SCROLL AUTOMATIQUE (Page "Messagerie")
// ==========================================================
let fenetreChat = document.querySelector('.chat-messages-area');

if (fenetreChat !== null) {
    fenetreChat.scrollTop = fenetreChat.scrollHeight;
}
