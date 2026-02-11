<?php require_once '../src/templates/_header.php'; ?>

<div class="exchange-page" style="padding: 40px 20px;">
    
    <div class="page-title-wrapper" style="text-align: center; margin-bottom: 40px;">
        <h1>Nos livres à l'échange</h1>
    </div>

    <div class="books-grid">
        <?php 
        // Sécurité : si $books n'existe pas, on met un tableau vide
        $booksList = isset($books) ? $books : []; 
        ?>

        <?php if (empty($booksList)): ?>
            <p style="text-align: center;">Aucun livre disponible pour le moment.</p>
        <?php else: ?>
            <?php foreach ($booksList as $book): ?>
                <article class="book-card">
                    <div class="book-image">
                        <img src="/Mission_tomtroc/public/img/books/<?= htmlspecialchars($book->getImage()) ?>" 
                             alt="<?= htmlspecialchars($book->getTitle()) ?>">
                    </div>
                    <div class="book-info"> 
                        <h3 class="book-title"><?= htmlspecialchars($book->getTitle()) ?></h3>
                        <p class="book-author">par <?= htmlspecialchars($book->getAuthor()) ?></p>
                        <p class="book-seller" style="font-style: italic; color: grey; font-size: 0.9rem;">
                            Vendu par : User n°<?= htmlspecialchars($book->getUserId()) ?>
                        </p>
                    </div>
                </article>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<?php require_once '../src/templates/_footer.php'; ?>
