<?php require_once '../src/templates/_header.php'; ?>

<div class="add-book-container">
    <h1>Ajouter un livre</h1>
    
    <form action="index.php?action=addBookPost" method="post" enctype="multipart/form-data">
        
        <p>
            <label for="title">Titre du livre</label><br>
            <input type="text" name="title" id="title" required>
        </p>

        <p>
            <label for="author">Auteur</label><br>
            <input type="text" name="author" id="author" required>
        </p>

        <p>
            <label for="description">Description</label><br>
            <textarea name="description" id="description"  required></textarea>
        </p>

        <p>
            <label for="disponibilite">Disponibilité</label><br>
            <select name="disponibilite" id="disponibilite">
                <option value="disponible">Disponible</option>
                <option value="non disponible">Non disponible</option>
            </select>
        </p>

        <p>
            <label for="image">Photo du livre</label><br>
            <input type="file" name="image" id="image" accept="image/png, image/jpeg" required>
        </p>

        <button type="submit" class="btn-save">Valider</button>
    </form>

    <p><a href="index.php?action=profile">Annuler</a></p>
</div>

<?php require_once '../src/templates/_footer.php'; ?>
