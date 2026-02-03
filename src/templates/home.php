<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>TomTroc - Test MVC</title>
    </head>
    <body>
        <h1>Initialisation TomTroc réussie !</h1>

        <?php if (isset($user) && $user !== null): ?>
            <p>Bravo ! Le MVC fonctionne. L'utilisateur trouvé est : 
            <strong><?= htmlspecialchars($user->getUsername()) ?></strong>
        </p>
        <?php else: ?>
            <p>La connexion fonctionne, mais je n'ai pas trouvé d'utilisateur dans ta table 'users'.</p>
        <?php endif; ?>
    </body>
</html>
