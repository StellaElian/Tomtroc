<?php require_once '../src/templates/_header.php'; ?>

<link rel="stylesheet" href="css/show_book.css">

<div class="book-page-wrapper">
    
    <div class="breadcrumb">
        <a href="index.php?action=catalog">Nos livres > </a>
        <span class="current-page"><?= htmlspecialchars($book->getTitle()) ?></span>
    </div>

    <div class="book-content-container">
        
        <div class="book-cover-section">
            <img src="img/books/<?= htmlspecialchars($book->getImage()) ?>" 
                 alt="Couverture de <?= htmlspecialchars($book->getTitle()) ?>" 
                 class="main-book-image">
        </div>

        <div class="book-info-section">
            
            <h1 class="book-main-title"><?= htmlspecialchars($book->getTitle()) ?></h1>
            <p class="book-main-author">par <?= htmlspecialchars($book->getAuthor()) ?></p>
            
            <div class="separator-line"></div>

            <h3 class="section-title">Description</h3>
            <p class="book-description">
                <?= nl2br(htmlspecialchars($book->getDescription())) ?>
            </p>

            <div class="separator-line"></div>

            <div class="owner-block">
                <p class="owner-label">PROPRIÉTAIRE</p>
                
                <div class="owner-card">
                    <div class="avatar-wrapper">
                        <img src="img/avatars/avatar_default.png" alt="Avatar" class="owner-avatar-img">
                    </div>

                    <div class="name-wrapper">
                        <a href="index.php?action=public_profile&id=<?= $book->getUserId() ?>" class="owner-link">
                            <?= htmlspecialchars($book->getSeller()) ?>
                        </a>
                    </div>
                </div>
                
                <a href="#" class="btn-send-message">Envoyer un message</a>
            </div>

        </div>
    </div>
</div>

<?php require_once '../src/templates/_footer.php'; ?>