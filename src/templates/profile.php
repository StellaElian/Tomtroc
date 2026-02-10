<?php require_once '../src/templates/_header.php'; ?>

<div class="profile-page">
    <div class="page-title">
        <h1>Mon compte</h1>
    </div>

    <div class="profile-content">
        <div class="profile-card">
            <div class="avatar-display">
                <div style="
                    width: 150 px;
                    height: 150 px;
                    min-width: 150px;
                    max-width: 150px;
                    border-radius: 50%;
                    overflow: hidden;
                    background-color: #f0f0f0;
                    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
                    margin: 0 auto;
                ">
                <?php if ($user->getAvatar()): ?>
                    <img src="/Mission_tomtroc/public/img/avatars/<?= htmlspecialchars($user->getAvatar()) ?>" alt="Avatar" style="
                        width: 100%;
                        height: 100%;
                        object-fit: cover;
                        display: block;
                    ">
                <?php else: ?>
                    <div style="width:100; height:100%; background:#ccc"></div>
                <?php endif; ?>
                    </div>
                <br>
                </div>
                <label for="file-upload" style="cursor: pointer; color: grey; text-decoration: underline; margin-top: 10px; display: inline-block;">
                    modifier
                </label>
            </div>
            <h2><?= htmlspecialchars($user->getPseudo()) ?></h2>
            <p>Membre depuis <?= Utils::format($user->getCreatedAt()) ?></p>
            
            <div class="library-count">
                <strong>BIBLIOTHEQUE</strong><br>
                <?= count($books) ?> livres
            </div>
        </div>

        <div class="profile-form">
            <h3>Vos informations personnelles</h3>
            
            <form action="index.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="action" value="updateProfile">

                <label for="file-upload" style="font-weight: bold;">Choisir un nouvelle image: </label>
                <input type="file" name="avatar" id="file-upload" accept="image/png, image/jpeg">
                <br><br>

                <label for="email">Adresse email</label><br>
                <input type="email" name="email" value="<?= htmlspecialchars($user->getEmail()) ?>" required>
                <br><br>

                <label for="password">Mot de passe</label><br>
                <input type="password" name="password" placeholder=".........">
                <small>(Laissez vide si vous ne voulez pas le changer)</small>
                <br><br>

                <label for="pseudo">Pseudo</label><br>
                <input type="text" name="pseudo" value="<?= htmlspecialchars($user->getPseudo()) ?>" required>
                <br><br>
                
                <button type="submit" class="btn-save">Enregistrer</button>
            </form>
        </div>
    </div>

    <div class="user-books">
        <div class="user-books-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h2>Ma bibliothèque</h2>
            <a href="index.php?action=addBook" style="padding: 10px 20px; background-color: #009900; color: white; text-decoration: none; border-radius: 5px;">Ajouter un livre</a>
        </div>
        <table style="width: 100%; border-collapse: collapse;">
             <?php if (empty($books)): ?>
                <tr><td colspan="6">Vous n'avez pas de livres.</td></tr>
             <?php else: ?>
                <?php foreach ($books as $book): ?>
                    <tr>
                        <td><img src="/Mission_tomtroc/public/img/books/<?= htmlspecialchars($book->getImage()) ?>" width="50" style="object-fit:cover;"></td>
                        <td><?= htmlspecialchars($book->getTitle()) ?></td>
                        <td><?= htmlspecialchars($book->getAuthor()) ?></td>
                        <td>...</td>
                        <td><?= htmlspecialchars($book->getDisponibilite()) ?></td>
                        <td><a href="index.php?action=editBook&id=<?= $book->getId() ?>">Éditer</a></td>
                    </tr>
                <?php endforeach; ?>
             <?php endif; ?>
        </table>
    </div>
</div>

<?php require_once '../src/templates/_footer.php'; ?>