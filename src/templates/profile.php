<?php require_once '../src/templates/_header.php'; ?>

<div class="profile-page">
    <div class="page-title">
        <h1>Mon compte</h1>
    </div>

    <div class="profile-content">
        <div class="profile-card">
            <div class="avatar-display">
                <?php if ($user->getAvatar()): ?>
                    <img src="/Mission_tomtroc/public/img/avatars/<?= htmlspecialchars($user->getAvatar()) ?>" alt="Avatar" width="150" style="object-fit:cover; border-radius:50%; height:150px; width:150px;">
                <?php else: ?>
                    <div style="width:150px; height:150px; background:#ccc; border-radius:50%;"></div>
                <?php endif; ?>
            </div>
            <hr>
            <h2><?= htmlspecialchars($user->getPseudo()) ?></h2>
            <p>Membre depuis <?= Utils::format($user->getCreatedAt()) ?></p>
            
            <div class="library-count">
                <strong>BIBLIOTHEQUE</strong><br>
                <?= count($books) ?> livres
            </div>
        </div>

        <div class="profile-form">
            <h3>Vos informations personnelles</h3>
            <form action="index.php?action=updateProfile" method="post" enctype="multipart/form-data">
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
                
                <label for="avatar">Changer d'avatar</label><br>
                <input type="file" name="avatar" id="avatar" accept="image/png, image/jpeg">
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
            <thead>
                <tr style="border-bottom: 1px solid #ccc; background-color: #f9f9f9;">
                    <th style="padding: 10px; text-align: left;">PHOTO</th>
                    <th style="padding: 10px; text-align: left;">TITRE</th>
                    <th style="padding: 10px; text-align: left;">AUTEUR</th>
                    <th style="padding: 10px; text-align: left;">DESCRIPTION</th>
                    <th style="padding: 10px; text-align: left;">DISPONIBILITÉ</th>
                    <th style="padding: 10px; text-align: left;">ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($books)): ?>
                    <tr>
                        <td colspan="6" style="text-align: center; padding: 20px;">
                            Vous n'avez pas encore ajouté de livres.
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($books as $book): ?>
                        <tr style="border-bottom: 1px solid #eee;">
                            <td style="padding: 10px;">
                                <img src="/Mission_tomtroc/public/img/books/<?= htmlspecialchars($book->getImage()) ?>" alt="Cover" width="50" height="70" style="object-fit: cover;">
                            </td>
                            <td style="padding: 10px; font-weight:bold;"><?= htmlspecialchars($book->getTitle()) ?></td>
                            <td style="padding: 10px;"><?= htmlspecialchars($book->getAuthor()) ?></td>
                            <td style="padding: 10px;">
                                <small><?= htmlspecialchars(substr($book->getDescription(), 0, 50)) ?>...</small>
                            </td>
                            <td style="padding: 10px;">
                                <span style="padding: 5px 10px; border-radius: 15px; background-color: <?= $book->getDisponibilite() === 'disponible' ? '#d4edda' : '#f8d7da' ?>; color: <?= $book->getDisponibilite() === 'disponible' ? '#155724' : '#721c24' ?>;">
                                    <?= htmlspecialchars($book->getDisponibilite()) ?>
                                </span>
                            </td>
                            <td style="padding: 10px;">
                                <a href="index.php?action=editBook&id=<?=  $book->getId() ?>" class="edit-link" style="color: grey;">Éditer</a> <br>
                                <a href="index.php?action=deleteBook&id=<?= $book->getId() ?>" class="delete-link" style="color: red;" onclick="return confirm('Voulez-vous vraiment supprimer ce livre ?');">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once '../src/templates/_footer.php'; ?>
