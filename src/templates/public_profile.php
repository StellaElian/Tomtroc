<?php require_once '../src/templates/_header.php'; ?>

<link rel="stylesheet" href="css/public_profile.css">

<div class="profile-page-wrapper">

    <aside class="profile-sidebar">
        <div class="profile-card">
            <div class="profile-avatar">
                <img src="img/avatars/<?= htmlspecialchars($user->getAvatar() ?? 'avatar_default.png') ?>"
                    alt="Avatar de <?= htmlspecialchars($user->getPseudo()) ?>">
            </div>

            <h2 class="profile-name"><?= htmlspecialchars($user->getPseudo()) ?></h2>
            <p class="profile-member-since">Membre depuis 1 an</p>

            <div class="profile-library-info">
                <span class="library-label">BIBLIOTHÈQUE</span>
                <span class="library-count">
                    <?= count($books) ?> livre<?= count($books) > 1 ? 's' : '' ?>
                </span>
            </div>

            <a href="index.php?action=messagerie$create_chat_with=<?= $user->getId() ?>" class="btn-write-message">
                Écrire un message
            </a>
        </div>
    </aside>

    <div class="profile-content">
        <table class="books-table">
            <thead>
                <tr>
                    <th>PHOTO</th>
                    <th>TITRE</th>
                    <th>AUTEUR</th>
                    <th>DESCRIPTION</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($books)): ?>
                    <tr>
                        <td colspan="4" class="empty-state">Cet utilisateur n'a pas encore de livres.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($books as $book): ?>
                        <tr>
                            <td class="col-photo">
                                <img src="img/books/<?= htmlspecialchars($book->getImage()) ?>"
                                    alt="Cover" class="book-thumb">
                            </td>
                            <td class="col-title"><?= htmlspecialchars($book->getTitle()) ?></td>
                            <td class="col-author"><?= htmlspecialchars($book->getAuthor()) ?></td>
                            <td class="col-desc">
                                <?= substr(htmlspecialchars($book->getDescription()), 0, 120) ?>...
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once '../src/templates/_footer.php'; ?>