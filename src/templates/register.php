<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon Compte - TomTroc</title>
    </head>
<body>
    
    <nav>
        <a href="index.php?action=home">Accueil</a> | 
        <a href="index.php?action=profile">Mon Profil</a>
    </nav>

    <hr>

    <div class="profile-container">
        <h1>Mon compte</h1>

        <div class="profile-card">
            <div class="avatar-section">
                <img src="../public/img/avatars/<?= htmlspecialchars($user->getAvatar()) ?>" alt="Avatar" width="150">
            </div>

            <div class="info-section">
                <h2><?= htmlspecialchars($user->getPseudo()) ?></h2>
                <p>Membre depuis le <?= $user->getMemberSince() ?></p>
                
                <p><strong>Email :</strong> <?= htmlspecialchars($user->getEmail()) ?></p>
                
                <div class="library-stats">
                    <h3>BIBLIOTHÈQUE</h3>
                    <p>0 livres</p> 
                </div>
            </div>
        </div>

        <hr>
        
        <div class="edit-section">
            <h3>Vos informations personnelles</h3>
            <form action="index.php?action=updateProfile" method="post" enctype="multipart/form-data">
                
                <label for="email">Adresse email</label>
                <input type="email" name="email" value="<?= htmlspecialchars($user->getEmail()) ?>" disabled>
                <br><br>

                <label for="password">Mot de passe</label>
                <input type="password" name="password" placeholder="Nouveau mot de passe">
                <br><br>

                <label for="pseudo">Pseudo</label>
                <input type="text" name="pseudo" value="<?= htmlspecialchars($user->getPseudo()) ?>">
                <br><br>

                <button type="submit">Enregistrer</button>
            </form>
        </div>
    </div>

</body>
</html>
