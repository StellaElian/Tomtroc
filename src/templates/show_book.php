<?php require_once '../src/templates/_header.php'; ?>

<link rel="stylesheet" href="css/show_book.css">

<div class="book-details-page">
    <div class="breadcrumb">
        <a href="index.php?action=exchange">Nos livres</a> > <?= htmlspecialchars($book->getTitle()) ?>
    </div>
    <div class="book-container">
        <div class="book-image">
            <img src="img/books/<?= htmlspecialchars($book->getImage()) ?>"
                alt="<?= htmlspecialchars($book->getTitle()) ?>">
        </div>
        <div class="book-info">
            <h1 class="book-title">
                <?= htmlspecialchars($book->getTitle()) ?>
            </h1>

            <p class="book-author">
                par <span><?= htmlspecialchars($book->getAuthor()) ?></span>
            </p>

            <img src="img/line.png" alt="séparateur" class="separator-img">

            <h3 class="section-title">Description</h3>
            <p class="description-text">
                <?= !empty($book->getDescription()) ? nl2br(htmlspecialchars($book->getDescription())) : "Aucune description fournie." ?>
            </p>

            <div class="owner-section">
                <h3 class="section-title">Propriétaire</h3>
                <div class="avatar-container">
                    <img src="img/avatars/avatar_default.png" alt="Avatar">
                </div>
                <span div class="owner-name">
                    <a href="index.php?action=public_profile&id=<?= $book->getUserId() ?>" class="owner-name" style="text-decoration: none; color: inherit;">
                        <?= htmlspecialchars($book->getSeller()) ?>
                    </a>
                </span>
            </div>
        </div>
        <a href="index.php?action=messagerie&id=<?= $book->getId() ?>" class="btn-message">
            Envoyer un message
        </a>
    </div>
</div>
</div>

<?php require_once '../src/templates/_footer.php'; ?>