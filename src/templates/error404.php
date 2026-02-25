<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
</head>
<body>
    <?php require_once '../src/templates/_header.php'; ?>

    <main class="error-page-wrapper">
        <div class="error-container">
            <h1 class="error-title">Error 404</h1>
            <h2 class="error-subtitle">Oups ! Cette page est introuvable.</h2>
            <p class="error-text">Le livre ou la page que vous cherchez n'existe pas ou a été supprimé.</p>
            <a href="index.php" class="error-btn">Retour à l'accueil</a>
        </div>
    </main>

    <?php require_once '../src/templates/_footer.php'; ?>
</body>
</html>