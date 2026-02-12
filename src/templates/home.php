<?php require_once '../src/templates/_header.php'; ?>

<link rel="stylesheet" href="css/home.css">

<section class="hero-section">
    <div class="hero-content">
        <h1 class="hero-title">Rejoignez nos <br> lecteurs passionnés</h1>
        <p class="hero-text">
            Donnez une nouvelle vie à vos livres en les échangeant avec d'autres amoureux de la lecture.
            Nous croyons en la magie du partage de connaissances et d'histoires à travers les livres.
        </p>
        <a href="index.php?action=catalog" class="btn-primary">Découvrir</a>
    </div>
    <div class="hero-image">
        <img src="img/books/hamza-nouasria.png" alt="Librairie ancienne">
        <span class="photo-credit">Hamza</span>
    </div>
</section>

<section class="last-books-section">
    <h2 class="section-title">Les derniers livres ajoutés</h2>

    <div class="books-grid">
        <?php foreach ($books as $book): ?>

            <a href="index.php?action=show_book&id=<?= $book->getId() ?>" class="book-card-link">
                <article class="book-card">
                    <div class="book-image">
                        <img src="img/books/<?= htmlspecialchars($book->getImage()) ?>" alt="Couverture">
                    </div>
                    <div class="book-info">
                        <h3 class="book-title-card"><?= htmlspecialchars($book->getTitle()) ?></h3>
                        <p class="book-author-card"><?= htmlspecialchars($book->getAuthor()) ?></p>
                        <p class="book-seller-card">Vendu par : <?= htmlspecialchars($book->getSeller()) ?></p>
                    </div>
                </article>
            </a>

        <?php endforeach; ?>
    </div>

    <div class="center-btn">
        <a href="index.php?action=exchange" class="btn-primary">Voir tous les livres</a>
    </div>
</section>

<section class="how-it-works-section">
    <h2 class="section-title">Comment ça marche ?</h2>
    <p class="section-subtitle">Échanger des livres avec TomTroc c'est simple et<br> amusant ! Suivez ces étapes pour commencer :</p>

    <div class="steps-grid">
        <div class="step-card">Inscrivez-vous gratuitement sur notre plateforme.</div>
        <div class="step-card">Ajoutez les livres que vous souhaitez échanger à votre profil.</div>
        <div class="step-card">Parcourez les livres disponibles chez d'autres membres.</div>
        <div class="step-card">Proposez un échange et discutez avec d'autres passionnés de lecture.</div>
    </div>

    <div class="center-btn">
        <a href="index.php?action=catalog" class="btn-outline">Voir tous les livres</a>
    </div>
</section>

<section class="values-section">
    <div class="values-banner">
        <img src="img/books/acceuil.jpg" alt="Nos valeurs">
    </div>

    <div class="values-content">
        <h2 class="section-title" style="text-align: left;">Nos valeurs</h2>
        <p>Chez Tom Troc, nous mettons l'accent sur le partage, la découverte et la communauté. Nos valeurs sont ancrées dans notre passion pour les livres et notre désir de créer des liens entre les lecteurs. Nous croyons en la puissance des histoires pour rassembler les gens et inspirer des conversations enrichissantes.

            Notre association a été fondée avec une conviction profonde : chaque livre mérite d'être lu et partagé.

            Nous sommes passionnés par la création d'une plateforme conviviale qui permet aux lecteurs de se connecter, de partager leurs découvertes littéraires et d'échanger des livres qui attendent patiemment sur les étagères.

        </p>
        <div class="signature">
            <img src="img/min/signature.png" alt="Signature">
            <img src="img/min/vector.png" alt="heartr" class="heart">
        </div>
    </div>
</section>

<?php require_once '../src/templates/_footer.php'; ?>