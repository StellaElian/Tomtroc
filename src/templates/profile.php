<?php require_once '../src/templates/_header.php'; ?>

<link rel="stylesheet" href="css/profile.css">

<div class="profile-page">
    <div class="page-header">
        <h1 class="main-title">Mon compte</h1>
        <a href="index.php?action=addBook" class="btn-add-book"> Ajouter un livre</a>
    </div>

    <form action="index.php?action=updateProfile" method="POST" enctype="multipart/form-data" class="profile-top-section">
        <div class="profile-card">
            <div class="profile-avatar">
                <img src="img/avatars/<?= htmlspecialchars($user->getAvatar() ?? 'avatar_default.png') ?>" alt="Avatar">
            </div>
            <label for="file_upload" class="edit-avatar-link">modifier</label>
            <input type="file" id="file_upload" name="avatar" accept="image/png, image/jpeg" class="hidden-input">

            <h2 class="profile-pseudo"><?= htmlspecialchars($user->getPseudo()) ?></h2>
            <p class="profile-member-date">Membre depuis <?= Utils::format($user->getCreatedAt()) ?></p>

            <div class="profile-library-stats">
                <span class="library-label">BIBLIOTHEQUE</span>
                <span class="library-count">
                    <img src="img/livres.svg" alt="" class="icon-book">
                    <?= count($books) ?> livres
                </span>
            </div>
        </div>

        <div class="profile-form-container">
            <h3 class="form-title">Vos informations personnelles</h3>
            <div class="form-group">
                <label for="email">Adresse email</label>
                <input type="email" id="email" name="email" value="<?= htmlspecialchars($user->getEmail()) ?>" class="form-input">
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="Nouveau mot de passe" class="form-input">
            </div>

            <div class="form-group">
                <label for="pseudo">Pseudo</label>
                <input type="text" id="pseudo" name="pseudo" value="<?= htmlspecialchars($user->getPseudo()) ?>" class="form-input">
            </div>

            <button type="submit" class="btn-save">Enregistrer</button>
        </div>
    </form>

    <div class="profile-bottom-section"></div>

    <div class="profile-bottom-section">

        <table class="books-table">
            <thead>
                <tr>
                    <th>PHOTO</th>
                    <th>TITRE</th>
                    <th>AUTEUR</th>
                    <th class="col-desc">DESCRIPTION</th>
                    <th>DISPONIBILITE</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($books)): ?>
                    <tr>
                        <td colspan="6" style="text-align:center; padding: 20px;">Votre bibliothèque est vide.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($books as $book): ?>
                        <tr>
                            <td>
                                <img src="img/books/<?= htmlspecialchars($book->getImage()) ?>"
                                    alt="Cover" class="table-book-img">
                            </td>

                            <td class="book-title-cell"><?= htmlspecialchars($book->getTitle()) ?></td>

                            <td class="book-author-cell"><?= htmlspecialchars($book->getAuthor()) ?></td>

                            <td class="book-desc-cell">
                                <div class="desc-content">
                                    <?= htmlspecialchars(substr($book->getDescription() ?? '', 0, 100)) ?>...
                                </div>
                            </td>

                            <td>
                                <?php if ($book->getDisponibilite() === 'non dispo'): ?>
                                    <span class="badge badge-not-available">non dispo</span>
                                <?php else: ?>
                                    <span class="badge badge-available">disponible</span>
                                <?php endif; ?>
                            </td>

                            <td class="actions-cell">
                                <a href="index.php?action=editBook&id=<?= $book->getId() ?>" class="action-link edit">Éditer</a>
                                <a href="index.php?action=deleteBook&id=<?= $book->getId() ?>"
                                    class="action-link delete"
                                    onclick="return confirm('Supprimer ce livre ?');">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="delete-account-container">
            <form action="index.php?action=deleteAccount" method="POST">
                <button 
                    type="submit"
                    class="btn-delete-account"
                    onclick="return confirm('⚠️ Êtes-vous sûr de vouloir supprimer votre compte ? \nCette action est irréversible !');">
                    Supprimer mon compte 
                </button>
            </form>
        </div>
    </div>
</div>

<?php require_once '../src/templates/_footer.php'; ?>