<?php require_once '../src/templates/_header.php'; ?>

<main class="book-page-wrapper">
    <div class="container">

        <nav class="chemin-navigation">
            <a href="index.php?action=exchange">Nos livres</a>
            <span class="separator">></span>
            <span class="current-page"><?= htmlspecialchars($book->getTitle()) ?></span>
        </nav>

        <div class="book-content-container">

            <div class="book-cover-section">
                <img src="img/books/<?= htmlspecialchars($book->getImage()) ?>"
                    alt="Couverture"
                    class="book-image-detail">
            </div>

            <div class="book-info-section">

                <h1 class="book-main-title"><?= htmlspecialchars($book->getTitle()) ?></h1>
                <p class="book-main-author">par <?= htmlspecialchars($book->getAuthor()) ?></p>

                <img src="img/min/line2.png" alt="séparateur" class="detail-line-separator">

                <div class="description-bloc">
                    <h3 class="section-main-title">Description</h3>
                    <p class="book-main-description">
                        <?php echo htmlspecialchars($book->getDescription()); ?>
                    </p>
                </div>

                <div class="owner-bloc">

                    <div class="owner-bloc">
                        <h3 class="section-owner">PROPRIÉTAIRE</h3>

                        <div class="owner-card">
                            <div class="avatar-wrapper">
                                <img src="img/avatars/Avatar_default.png" alt="Avatar" class="owner-avatar-img">
                            </div>

                            <div class="owner-name-container">
                                <a href="index.php?action=public_profile&id=<?= htmlspecialchars($book->getUserId()) ?>">
                                    <?= htmlspecialchars($book->getSeller()) ?>
                                </a>
                            </div>
                        </div>

                        <div class="action-wrapper">
                            <?php if (isset($_SESSION['user_id'])): ?>
                                <?php if ($_SESSION['user_id'] != $book->getUserId()): ?>
                                    <a href="index.php?action=messagerie&create_chat_with=<?= $book->getUserId() ?>" class="btn-send-message">
                                        Envoyer un message
                                    </a>
                                <?php endif; ?>
                            <?php else: ?>
                                <a href="index.php?action=login" class="btn-send-message">
                                    Envoyer un message
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once '../src/templates/_footer.php'; ?>