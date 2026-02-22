<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter d'un livre </title>

    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/footer.css">
</head>

<body>

    <?php require_once '../src/templates/_header.php'; ?>

    <main class="edit-book-page-wrapper">
        <div class="edit-book-container">

            <nav class="edit-back-navigation">
                <a href="index.php?action=profile" class="edit-btn-back">
                    <img src="img/min/line4.svg" alt="Ligne retour" class="edit-back-icon">
                    retour
                </a>
            </nav>

            <h1 class="edit-main-title">Ajouter un livre</h1>

            <section class="edit-card-white">
                <form action="index.php?action=addBookPost" method="POST" enctype="multipart/form-data" class="edit-main-form">

                    <div class="edit-columns-flex">

                        <div class="edit-col-left-photo">
                            <span class="edit-label-light">Photo</span>

                            <div class="edit-image-frame">
                                <img src="img/books/Book_default.png" alt="Couverture du livre par défaut" id="book-preview">
                            </div>

                            <label for="book-image-upload" class="edit-link-modify-photo">Modifier la photo</label>
                            <input type="file" name="image" id="book-image-upload" accept="image/png, image/jpeg" style="display: none;" required>
                        </div>

                        <div class="edit-col-right-inputs">

                            <div class="edit-form-group">
                                <label for="title" class="edit-label-light">Titre</label>
                                <input type="text" name="title" id="title" required>
                            </div>

                            <div class="edit-form-group">
                                <label for="author" class="edit-label-light">Auteur</label>
                                <input type="text" name="author" id="author" required>
                            </div>

                            <div class="edit-form-group">
                                <label for="description" class="edit-label-light">Commentaire</label>
                                <textarea name="description" id="description" rows="20" required></textarea>
                            </div>

                            <div class="edit-form-group">
                                <label for="disponibilite" class="edit-label-light">Disponibilité</label>
                                <div class="edit-select-wrapper">
                                    <select name="disponibilite" id="disponibilite">
                                        <option value="disponible">disponible</option>
                                        <option value="non disponible">non disponible</option>
                                    </select>
                                </div>
                            </div>

                            <div class="edit-submit-zone">
                                <button type="submit" class="edit-btn-validate">Valider</button>
                            </div>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </main>

    <?php require_once '../src/templates/_footer.php'; ?>

    <script>
        document.getElementById('book-image-upload').addEventListener('change', function(e) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('book-preview').src = e.target.result;
            }
            if (this.files[0]) {
                reader.readAsDataURL(this.files[0]);
            }
        });
    </script>
</body>

</html>