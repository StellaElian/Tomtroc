<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Connexion</title>
    </head>
    <body>
        <?php require_once '../src/templates/_header.php'; ?>
        <div class="login-container">
            <h1>Se connecter</h1>

            <form action="index.php?action=connectUser" method="post">
                <p>
                    <label for="email">Email</label><br>
                    <input type="email" name="email" id="email" required><br><br>
                </p>
                <p>
                    <label for="password">Mot de passe</label><br>
                    <input type="password" name="password" id="password" required><br><br>
                </p>
                <button type="submit">Se connecter</button>
            </form>
            <p>Pas de compte ? <a href="index.php?action=register" style="test-decoration: underline; color: black;">Inscrivez-vous</a></p>
        </div>
        <?php require_once '../src/templates/_footer.php'; ?>
    </body>
</html> 