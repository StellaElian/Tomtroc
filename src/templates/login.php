<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" , initial-scale="1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
</head>

<body>
    <?php require_once '../src/templates/_header.php'; ?>
    <main class="main-auth">
        <div class="auth">
            <div class="auth-left">
                <h1 class="sign-title">Connexion</h1>

                <form action="index.php?action=connectUser" method="post" class="sign-form">

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
                    Pas de compte ? <a href="index.php?action=register" style="text-decoration: underline; color: black;">Inscrivez-vous</a>
                </div>
            </div>

            <img src="img/books/image_inscription.png" class="auth-img" alt="Bibliothèque">
        </div>
    
    <?php require_once '../src/templates/_footer.php'; ?>