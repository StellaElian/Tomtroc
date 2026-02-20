<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" , initial-scale="1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <?php require_once '../src/templates/_header.php'; ?>
    <main class="main-auth">
        <div class="auth">
            <div class="auth-left">
                <h1 class="sign-title">Inscription</h1>

                <form action="index.php?action=registerUser" method="post" class="sign-form">
                    <div class="field">
                        <label for="pseudo">Pseudo</label>
                        <input type="text" name="pseudo" id="pseudo" required>
                    </div>

                    <div class="field">
                        <label for="email">Adresse email</label>
                        <input type="email" name="email" id="email" required>
                    </div>

                    <div class="field">
                        <label for="password">Mot de passe</label>
                        <input type="password" name="password" id="password" required>
                    </div>

                    <button type="submit" class="sign-submit-btn">S'inscrire</button>
                </form>

                <div class="sign-ask">
                    Déjà inscrit ? <a href="index.php?action=login">Connectez-vous</a>
                </div>
            </div>

            <img src="img/books/image_inscription.png" class="auth-img" alt="Bibliothèque">
        </div>
    </main>

    <?php require_once '../src/templates/_footer.php'; ?>
</body>

</html>