<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Inscription - Tomtroc</title>
    </head>
    <body>
        <nav>
            <a href="index.php?action=home">Acceuil</a>
        </nav>
        <?php require_once '../src/templates/_header.php'; ?>
        <div class="register-container">
            <h1>Créer un compte</h1>
            <form action="index.php?action=registerUser" method="post">
                <p>
                    <label for="pseudo">Pseudo</label><br>
                    <input type="text" name="pseudo" id="pseudo" required><br><br>
                </p>
                <p>
                    <label for="email">Adresse email</label><br>
                    <input type="email" name="email" id="email" required><br><br>
                </p>
                <p>
                    <label for="password">Mot de passe</label><br>
                    <input type="password" name="password" id="password" required><br><br>
                </p>

                <button type="submit">S'inscrire</button>
            </form>
            <p>Déja inscrit ? <a href="index.php?action=login" style="test-decoration: underline; color: black;">Connectez-vous</a></p>
        </div>
        <?php require_once '../src/templates/_footer.php'; ?>
    </body>
</html>
