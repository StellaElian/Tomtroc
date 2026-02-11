<?php require_once '../src/templates/_header.php'; ?>

<link rel="stylesheet" href="css/profile.css">

<div class="profile-page">
    <h1 class="main-title">Mon compte</h1>

    <div class="profile-top-section">
        
        <div class="profile-card">
            <div class="profile-avatar">
                <img src="img/avatars/avatar_default.png" alt="Avatar">
                <a href="#" class="edit-avatar-link">modifier</a>
            </div>
            
            <h2 class="profile-pseudo"><?= htmlspecialchars($_SESSION['user_pseudo'] ?? 'Membre') ?></h2>
            <p class="profile-member-date">Membre depuis 1 an</p>
            
            <div class="profile-library-stats">
                <span class="library-label">BIBLIOTHEQUE</span>
                <span class="library-count"><?= count($books) ?> livres</span>
            </div>
        </div>

        <div class="profile-form-container">
            <h3 class="form-title">Vos informations personnelles</h3>
            
            <form action="index.php?action=updateProfile" method="POST" class="personal-info-form">
                <div class="form-group">
                    <label for="email">Adresse email</label>
                    <input type="email" id="email" name="email" value="nathalie@mail.com" class="form-input">
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" value="********" class="form-input">
                </div>

                <div class="form-group">
                    <label for="pseudo">Pseudo</label>
                    <input type="text" id="pseudo" name="pseudo" value="<?= htmlspecialchars($_SESSION['user_pseudo'] ?? '') ?>" class="form-input">
                </div>

                <button type="submit" class="btn-save">Enregistrer</button>
            </form>
        </div>
    </div>

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
                                <?php if($book->getDisponibilite() === 'non dispo'): ?>
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
    </div>
</div>

<?php require_once '../src/templates/_footer.php'; ?>