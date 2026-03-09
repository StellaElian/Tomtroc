# Site TomTroc 📚 - Plateforme d'échange de livres

Tom Troc est une application web développée dans le cadre d'une formation OpenClassrooms. Elle permet aux passionnés de lecture d'échanger des livres entre eux, de gérer leur bibliothèque virtuelle et de discuter de leurs lectures via une messagerie intégrée.

## 🚀 Fonctionnalités principales

- **Gestion de compte :** Inscription, connexion sécurisée et gestion de profil.
- **Catalogue et Recherche :** Affichage dynamique des livres à l'échange avec un système de recherche en temps réel (Live Search en JavaScript).
- **Gestion de bibliothèque :** Ajout, modification (avec upload d'images) et suppression de livres dans son espace personnel.
- **Profils publics :** Visualisation des bibliothèques des autres membres de la plateforme.
- **Messagerie interne :** Système de chat dynamique pour organiser les échanges avec compteurs de notifications.

## 🛠️ Technologies et Architecture

Le projet est construit de zéro, sans framework externe, en respectant rigoureusement le **Design Pattern MVC** (Modèle-Vue-Contrôleur) et la **Programmation Orientée Objet (POO)**.

* **Front-end :** HTML5, CSS3 (Flexbox/Grid), JavaScript (Vanilla)
* **Back-end :** PHP 8.3 (POO)
* **Base de données :** MySQL (requêtes préparées via PDO)
* **Architecture MVC & Sécurité :**
  * `public/` : Point d'entrée unique (`index.php`) et ressources statiques.
  * **Accessibilité & Qualité** : Respect des normes WCAG 2.1 (vérifié via WAVE) pour garantir un contraste optimal et une navigation facilitée (labels, structure sémantique).
  * `controllers/`, `models/`, `views/`, `config/`, etc. : Sécurisés par des fichiers `.htaccess` bloquant tout accès direct HTTP.
  * **GitHub** : Les fichiers sensibles (_config.php) sont normalement ignorés via .gitignore . Note : Pour les besoins de la soutenance et de la vérification tutorée, le fichier de configuration a été rendu accessible temporairement.

## 💻 Installation et configuration

1. **Cloner le projet :**
   Installez le projet dans un dossier exécuté par votre serveur local (type MAMP, WAMP, XAMPP, etc.).
   ```bash
   git clone https://github.com/StellaElian/Tomtroc.git
   ```
2. **Base de données :**
   - Créez une base de données vide appelée `tomtroc`.
   - Importez le fichier `sql/tomtroc.sql` (ou le nom exact de votre fichier) dans cette base.
3. **Configuration :**
   - Insérer vos identifiants de connexion à la base de données.
4. **Connexion test :**
   Pour tester la plateforme, vous pouvez utiliser le compte par défaut (si applicable) :
   - Login : `nathalire@mail.com`
   - Mot de passe : `password` *(attention aux majuscules)*

## ⚠️ Problèmes courants et prérequis

- **Version PHP :** Ce projet a été réalisé avec **PHP 8.3.1**. Il n'est pas garanti qu'il fonctionne avec des versions antérieures.
- **Librairie Intl :** Si vous rencontrez un problème avec les dates en français, vérifiez que l'extension `intl` est bien activée sur votre serveur local (via l'interface WAMP/MAMP ou directement dans votre fichier `php.ini`).

## 🛠️ Technologies
- HTML5 / CSS3 / JavaScript (Vanilla)
- PHP (POO & Architecture MVC)
- MySQL / PDO

---
*Projet réalisé dans le cadre de la formation OpenClassrooms.*
