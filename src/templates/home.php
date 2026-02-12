<?php require_once '../src/templates/_header.php'; ?>
<?php $booksList = isset($books) ? $books : []; ?>
<div class="home-container">
    <section class="hero">
        <h1>Bienvenue sur TomTroc !</h1>
        <p>Le site d'échange de livres entre passionnés. </p>
        <a href="index.php?action=login">Se connecter</a>
        <?php if (!Utils::isUserConnected()): ?>
            <a href="index.php?action=register" class="btn-primary">Créer un compte</a>
        <?php endif; ?>
    </section>
</div>
<div class="books-grid">
    <?php if (empty($booksList)): ?>
        <p>Aucun Livre pour le moment</p>
    <?php endif; ?>
    <?php foreach ($booksList as $book): ?>
        <a href="index.php?action=show_book&id=<?= $book->getId() ?>" class="book-link" style="text-decoration: none; color: inherit;">
            <article class="book-card">
                <div class="book-image">
                    <img src="/Mission_tomtroc/public/img/books/<?= htmlspecialchars($book->getImage()) ?>" alt="Couverture">
                </div>
                <div class="book-content">
                    <h3 class="book-title"><?= htmlspecialchars($book->getTitle()) ?></h3>
                    <p class="book-author">par <?= htmlspecialchars($book->getAuthor()) ?></p>
                    <p class="book-seller">Vendu par : <?= htmlspecialchars($book->getSeller()) ?></p>
                </div>
            </article>
        </a>
    <?php endforeach; ?>
</div>
<?php require_once '../src/templates/_footer.php'; ?>