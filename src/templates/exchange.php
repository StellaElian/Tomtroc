<?php require_once '../src/templates/_header.php'; ?>

<div class="exchange-page" style="padding: 40px 20px;">

    <div class="page-title-wrapper" style="text-align: center; margin-bottom: 40px;">
        <h1 style="font-family: 'Playfair Display', serif;">Nos livres à l'échange</h1>

        <form action="index.php" method="GET" style="margin-top: 30px;">
            <input type="hidden" name="action" value="exchange">

            <div style="position: relative; width: 100%; max-width: 400px; margin: 0 auto;">

                <img src="/Mission_tomtroc/public/img/search.png" alt="rechercher" style="
                    position: absolute; /* Je flotte par-dessus */
                    left: 15px;         /* À 15px du bord gauche */
                    top: 50%;           /* Centré en hauteur */
                    transform: translateY(-50%); /* L'astuce pour centrer parfaitement */
                    width: 20px;        /* Taille visuelle désirée */
                    opacity: 0.6;       /* Un peu transparent pour faire gris */
                ">

                <input type="text" name="search" placeholder="Rechercher un livre" style="
                    width: 100%;
                    height: 50px;        /* Hauteur comme sur Figma */
                    padding-left: 45px;  /* IMPORTANT : Espace à gauche pour ne pas écrire SUR l'image */
                    border: 1px solid #ccc;
                    border-radius: 25px; /* Bords ronds */
                    font-size: 1rem;
                ">
            </div>
        </form>
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
                <a href="index.php?action=show_book&id=<?= htmlspecialchars($book->getId())  ?>" style="text-decoration: none; color: inherit;">
                    <article class="book-card">
                        <div class="book-image">
                            <img src="../public/img/books/<?= htmlspecialchars($book->getImage()) ?>"
                                alt="<?= htmlspecialchars($book->getTitle()) ?>">
                        </div>
                        <div class="book-info">
                            <h3 class="book-title"><?= htmlspecialchars($book->getTitle()) ?></h3>
                            <p class="book-author">par <?= htmlspecialchars($book->getAuthor()) ?></p>
                            <p class="book-seller" style="font-style: italic; color: grey; font-size: 0.9rem;">
                                Vendu par : <?= htmlspecialchars($book->getSeller()) ?>
                            </p>
                        </div>
                    </article>
                </a>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<?php require_once '../src/templates/_footer.php'; ?>