<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TomTroc</title>
    <link rel="stylesheet" href="../public/css/style.css"> 
</head>
<body>
    <header>
        <div class="logo">
            <a href="index.php?action=home">TomTroc</a>
        </div>
        
        <nav>
            <a href="index.php?action=home">Accueil</a>
            <a href="#">Nos livres à l'échange</a>
            
            <?php if (Utils::isUserConnected()): ?>
                <a href="#">Messagerie</a>
                <a href="index.php?action=profile">Mon compte</a> 
                <a href="index.php?action=logout">Déconnexion</a>
            <?php else: ?>
                <a href="index.php?action=login">Connexion</a>
            <?php endif; ?>
        </nav>
    </header>
