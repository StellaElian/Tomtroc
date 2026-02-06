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
                <a href="index.php?action=register">Créer un compte</a>
                <a href="index.php?action=login">Se connecter</a>
                <?php if (!Utils::isUserConnected()): ?>
                    <a href="index.php?action=register" class="btn-primary">Créer un compte</a>
                <?php endif; ?>
            </section>
        </div>
        <?php require_once '../src/templates/_footer.php'; ?>

    </body>
</html>