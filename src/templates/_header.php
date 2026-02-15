<?php
require_once __DIR__ . '/../services/Utils.php';
// On importe ta classe Utils pour pouvoir l'utiliser
?>
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
    <header>
        <nav>
            <div class="spacer"></div>

            <a href="index.php?action=home" class="logo">
                <img src="img/min/logo.svg" alt="Logo TomTroc">
            </a>

            <a href="index.php?action=home" class="home <?= (isset($_GET['action']) && $_GET['action'] === 'home') ? 'active' : '' ?>">
                Accueil
            </a>

            <div class="spacer"></div>

            <a href="index.php?action=exchange" class="books link exchangeBooks <?= (isset($_GET['action']) && $_GET['action'] === 'exchange') ? 'active' : '' ?>">
                Nos livres à l’échange
            </a>

            <?php if (Utils::isUserConnected()): ?>

                <div class="spacer"></div>

                <img src="img/min/line.svg" alt="séparateur" class="separator">

                <a href="index.php?action=messagerie" class="messaging <?= (isset($_GET['action']) && $_GET['action'] === 'messagerie') ? 'active' : '' ?>">
                    <img src="img/min/icon_messagerie.svg" alt="Messagerie" class="icon">
                    <span class="messagingTxt">Messagerie</span>
                    <img src="img/min/group_23.svg" alt="" class="group-icon">
                </a>

                <a href="index.php?action=profile" class="account <?= (isset($_GET['action']) && $_GET['action'] === 'profile') ? 'active' : '' ?>">
                    <img src="img/min/icon_mon_compte.svg" alt="Compte">
                    <span class="accountTxt">Mon compte</span>
                </a>

                <a href="index.php?action=logout" class="connexion">Déconnexion</a>
            <?php else: ?>
            <div class="spacer"></div>
            <div class="spacer"></div>
            <div class="spacer"></div>
            <div class="spacer"></div>
            <a href="index.php?action=login" class="connexion <?= (isset($_GET['action']) && $_GET['action'] === 'login') ? 'active' : '' ?>">Connexion</a>
            <?php endif; ?>
            <div class="spacer"></div>
        </nav>
    </header>

    <main id="main"></main>