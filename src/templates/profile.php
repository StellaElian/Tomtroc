<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Mon compte</title>
    </head>
    <body>
        <nav>
            <a href="index.php?action=home">Acceuil</a>
            <a href="index.php?action=login">Connexion</a>
            <a href="index.php?action=logout">Se déconnecter</a>
        </nav>
        <h1>Mon compte</h1>
        <div class="infos">
            <img src="../public/img/avatars/<?= htmlspecialchars($user->getAvatar()) ?>" alt="Avatar" width="100"><br>
            <p><a href="index.php?action=updateAvatar" style="test-decoration: underline; color: black;">modifier</a></p>
            <p><strong><?= htmlspecialchars($user->getPseudo()) ?></p>
            <p>Membre depuis<?= htmlspecialchars($user->getCreatAt()) ?></p>
        </div>
    </body>
</html>