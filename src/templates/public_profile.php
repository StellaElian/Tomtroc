<?php require_once '../src/templates/_header.php'; ?>

<link rel="stylesheet" href="css/public_profile.css">

<div class="public-profile-page">

    <div class="profile-container">

        <div class="user-card">
            <div class="avatar-container">
                <img src="img/avatars/<?= htmlspecialchars($user->getAvatar() ?? 'avatar_default.png') ?>" alt="Avatar">
            </div>

            <h1 class="user-pseudo"><?= htmlspecialchars($user->getPseudo()) ?></h1>
            <p class="member-date">Membre depuis <?= Utils::format($user->getCreatedAt()) ?></p>

            <div class="library-stats">
                <span class="stats-label">BIBLIOTHEQUE</span>
                <span class="stats-count">
                    <img src="img/livres.svg" class="icon-book" alt="">
                    <?= count($books) ?> livres
                </span>
            </div>

            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="index.php?action=messagerie&with=<?= $user->getId() ?>" class="btn-write-msg">
                    Écrire un message
                </a>
            <?php else: ?>
                <a href="index.php?action=login" class="btn-write-msg">
                    Se connecter pour échanger
                </a>
            <?php endif; ?>

        </div>

        <div class="books-list-container">
            <table class="public-books-table">
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
                            <td colspan="4" style="text-align:center; padding:20px;">Cet utilisateur n'a pas encore de livres.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($books as $book): ?>
                            <tr>
                                <td>
                                    <img src="img/books/<?= htmlspecialchars($book->getImage()) ?>" class="table-book-img" alt="Cover">
                                </td>
                                <td class="book-title"><?= htmlspecialchars($book->getTitle()) ?></td>
                                <td class="book-author"><?= htmlspecialchars($book->getAuthor()) ?></td>
                                <td class="book-desc">
                                    <?= htmlspecialchars(substr($book->getDescription() ?? '', 0, 80)) ?>...
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

    </div>
</div>

<?php require_once '../src/templates/_footer.php'; ?>