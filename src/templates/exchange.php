<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" , initial-scale="1.0">
    <title>Nos livres</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
</head>

<body>
    <?php require_once '../src/templates/_header.php'; ?>

    <main class="books-page">
        <div class="container">
            <header class="books-header">
                <h1 class="page-title">Nos livres à l’échange</h1>
                <div class="search-bar">
                    <form action="index.php" method="GET">
                        <input type="hidden" name="action" value="exchange">

                        <img src="/Mission_tomtroc/public/img/min/search.png" alt="rechercher">

                        <input type="text" name="search" placeholder="Rechercher un livre" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
                    </form>
                </div>
            </header>

            <section class="books-grid">
                <?php if (isset($books) && !empty($books)) : ?>
                    <?php foreach ($books as $book) : ?>
                        <article class="book-card">
                            <a href="index.php?action=show_book&id=<?= htmlspecialchars($book->getId())  ?>">
                                <div class="book-image">
                                    <img src="img/books/<?= $book->getImage() ?>" alt="<?= $book->getTitle() ?>">
                                    <?php if ($book->getDisponibilite() === 'non disponible') : ?>
                                        <span class="badge-non-disponible">non dispo.</span>
                                    <?php endif; ?>
                                </div>
                                <div class="book-info">
                                    <h2 class="book-title"><?= htmlspecialchars($book->getTitle()) ?></h2>
                                    <p class="book-author">par <?= htmlspecialchars($book->getAuthor()) ?></p>
                                    <p class="book-seller">Vendu par : <?= htmlspecialchars($book->getSeller()) ?>
                                </div>
                            </a>
                        </article>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="no-results">
                        <p>Désolé, aucun livre ne correspond à votre recherche "<strong><?= htmlspecialchars($_GET['search'] ?? '') ?></strong>".</p>
                        <a href="index.php?action=exchange" class="btn-back">Voir tous les livres</a>
                    </div>
                <?php endif; ?>
            </section>
        </div>
    </main>

    <?php require_once '../src/templates/_footer.php'; ?>

    <script>
        // 1. On cible la barre de recherche et toutes les cartes des livres
        const searchInput = document.querySelector('input[name="search"]');
        const bookCards = document.querySelectorAll('.book-card');

        // 2. On écoute l'événement "input" (se déclenche à chaque lettre tapée)
        searchInput.addEventListener('input', function() {

            // 3. On récupère le texte tapé et on le met en minuscules
            const searchText = searchInput.value.toLowerCase();

            // 4. On vérifie chaque livre un par un
            bookCards.forEach(function(card) {
                // On récupère le titre du livre (en minuscules aussi)
                const title = card.querySelector('.book-title').textContent.toLowerCase();

                // 5. Si le titre contient les lettres tapées, on l'affiche. Sinon, on le cache.
                if (title.includes(searchText)) {
                    card.style.display = ''; // Laisse le livre visible
                } else {
                    card.style.display = 'none'; // Cache le livre
                }
            });
        });
    </script>

</body>
</html>