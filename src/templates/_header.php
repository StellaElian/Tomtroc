<?php require_once __DIR__ . '/../services/Utils.php'; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
</head>

<body>
    <header class="site-header">
        <div class="header-inner">
            <nav class="nav">
                <div class="nav-left">
                    <a href="index.php?action=home" class="logo">
                        <img src="img/min/logo.svg" alt="Logo">
                    </a>
                    <a href="index.php?action=home">Accueil</a>
                    <a href="index.php?action=exchange">Nos livres à l’échange</a>
                </div>

                <?php if (Utils::isUserConnected()): ?>
                    <img src="img/min/Line.svg" alt="séparateur" class="separator">
                    <div class="nav-right">
                        <div class="nav-item">
                            <img src="img/min/icon_messagerie.svg" alt="icon">
                            <a href="index.php?action=messagerie">Messagerie</a>
                            
                                <?php
                                $unreadCount = $_SESSION['unread_count'] ?? 0;
                                // On vérifie si la session contient un chiffre > 0
                                if ($unreadCount > 0): ?>
                                    <div class="badge-wrapper">
                                        <span class="badge-number"><?= htmlspecialchars($unreadCount)?></span>
                                    </div>
                                 <?php endif; ?>
                            
                            </div>

                        <div class="nav-item">
                            <img src="img/min/icon_mon_compte.svg" alt="Logo mon compte">
                            <a href="index.php?action=profile">Mon compte</a>
                        </div>
                        <a href="index.php?action=logout" class="connexion">Déconnexion</a>
                    </div>
                <?php else: ?>
                    <div class="nav-right push-right">
                        <a href="index.php?action=login" class="connexion">Connexion</a>
                    </div>
                <?php endif; ?>
            </nav>
        </div>
    </header>