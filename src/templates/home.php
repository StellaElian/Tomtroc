<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>TomTroc - Acceuil</title>
    </head>
    <body>
        <?php require_once '../src/templates/_header.php'; ?>
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
            <?php $booksList = isset($book) ? $books : []; ?>
            <?php if(isset($booksList)): ?>
                <p>Aucun Livre pour le moment</p>
            <?php endif; ?>
            <?php foreach ($books as $book): ?>
                <article class="book-card">
                    <div class="book-image">
                        <img src="/Mission_tomtroc/public/img/books/<?=  htmlspecialchars($book->getImage()) ?>" alt="<?= htmlspecialchars($book->getTitle()) ?>">
                    </div>
                    <div class="book-info"> 
                        <h3 class=" book-title"><?= htmlspecialchars($book->getTitle()) ?></h3>
                        <p class="book-author">par <?= htmlspecialchars($book->getAuthor()) ?></p>
                        <p class="book-seller" style="font-style: italic; color: grey;">Vendu par : par <?= htmlspecialchars($book->getUserId()) ?></p>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
        <?php require_once '../src/templates/_footer.php'; ?>
    </body>
</html>