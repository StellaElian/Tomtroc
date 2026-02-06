<?php require_once '../src/templates/_header.php'; ?>

<div class="profile-page">
    <h1>Mon compte</h1>

    <div class="profile-content">
        <div class="profile-card">
            <div class="avatar-display">
                <img src="../public/img/avatars/<?= htmlspecialchars($user->getAvatar()) ?>" alt="Avatar" width="150">
                <br>
                <a href="#">modifier</a>
            </div>
            <hr>
            <h2><?= htmlspecialchars($user->getPseudo()) ?></h2>
            <p>Membre depuis <?= Utils::format($user->getCreatedAt()) // Il faudra formater la date ?></p>
            
            <div class="library-count">
                <strong>BIBLIOTHEQUE</strong><br>
                0 livres
            </div>
        </div>

        <div class="profile-form">
            <h3>Vos informations personnelles</h3>
            
            <form action="index.php?action=updateProfile" method="post" enctype="multipart/form-data">
                <label for="email">Adresse email</label><br>
                <input type="email" name="email" value="<?= htmlspecialchars($user->getEmail()) ?>" required>
                <br><br>

                <label for="password">Mot de passe</label><br>
                <input type="password" name="password" placeholder=".........">
                <small>(Laissez vide si vous ne voulez pas le changer)</small>
                <br><br>

                <label for="pseudo">Pseudo</label><br>
                <input type="text" name="pseudo" value="<?= htmlspecialchars($user->getPseudo()) ?>" required>
                <br><br>

                <button type="submit" class="btn-save">Enregistrer</button>
            </form>
        </div>
    </div>

    <div class="user-books">
        <table>
            <thead>
                <tr>
                    <th>PHOTO</th>
                    <th>TITRE</th>
                    <th>AUTEUR</th>
                    <th>DESCRIPTION</th>
                    <th>DISPONIBILITÉ</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="6">Vous n'avez pas encore de livres (Fonctionnalité à venir à l'étape 4)</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php require_once '../src/templates/_footer.php'; ?>
