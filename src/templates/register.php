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
        <div class="register-container">
            <h1>Créer un compte</h1>
            <form action="index.php?action=registeruser" method="POSt">
                <label>Pseudo</label><br>
                <input type="text" name="pseudo"><br><br>

                <label>Adresse email</label><br>
                <input type="email" name="email"><br><br>

                <label>Mot de passe</label><br>
                <input type="password" name="password"><br><br>

                <button type="submit">S'inscrire</button>

                <p>
                    Déja inscrit ?
                    <a href="index.php?page=login" style="test-decoration: underline; color: black;">Connectez-vous</a>
                </p>
            </div>
        </form>
    </body>
</html>
