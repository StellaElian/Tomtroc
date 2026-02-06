<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Connexion</title>
    </head>
    <body>
        <nav>
            <a href="index.php?action=home">Acceuil</a>
        </nav>
        <div class="login-container">
            <h1>Se connecter</h1>

            <form action="index.php?action=connectUser" method="post">
                <label>Email</label><br>
                <input type="email" name="email"><br><br>
            
                <label>Mot de passe</label><br>
                <input type="password" name="password"><br><br>

                <button type="submit">Se connecter</button>
            
                <p>Pas de compte ? <a href="index.php?action=register" style="test-decoration: underline; color: black;">Inscrivez-vous</a></p>
                
            </form>
        </div>
    </body>
</html>