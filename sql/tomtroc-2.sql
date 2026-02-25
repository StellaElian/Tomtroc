-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 25 fév. 2026 à 20:26
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tomtroc`
--

-- --------------------------------------------------------

--
-- Structure de la table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `disponibilite` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `books`
--

INSERT INTO `books` (`id`, `user_id`, `title`, `author`, `description`, `image`, `disponibilite`, `created_at`) VALUES
(19, 21, 'The Two Towers', 'J.R.R Tolkien', 'Le voyage épique continue dans ce deuxième volet palpitant de la saga légendaire. Alors que les ténèbres s\'amassent, les héros sont mis à l\'épreuve et le destin de la Terre du Milieu est plus que jamais en jeu.', 'img_699f08be16108.png', 'disponible', '2026-02-25 14:35:42'),
(20, 22, 'Company Of One', 'Paul Jarvis', 'Une approche rafraîchissante de l\'entrepreneuriat qui remet en question la mentalité de la croissance à tout prix. Découvrez pourquoi rester petit pourrait bien être la meilleure stratégie commerciale.', 'img_699f0c4194fa8.png', 'disponible', '2026-02-25 14:50:41'),
(21, 23, 'Narnia', 'C.S Lewis', 'Passez la porte de l\'armoire magique et plongez dans un monde peuplé d\'animaux parlants et de batailles épiques. Un chef-d\'œuvre intemporel de la fantasy qui continue d\'enchanter les lecteurs de tous âges.', 'img_699f0f27d2acd.png', 'non disponible', '2026-02-25 15:03:03'),
(22, 24, 'The Subtle Art Of...', 'Mark Manson', 'Un guide brut, rafraîchissant et honnête pour vivre une vie meilleure. Ce livre tranche dans le vif et vous apprend à accepter vos limites pour vous concentrer uniquement sur ce qui compte vraiment.', 'img_699f115657403.png', 'disponible', '2026-02-25 15:12:22'),
(23, 25, 'A Book Full Of Hope', 'Rupi Kaur', 'Un recueil doux et réconfortant, conçu pour apporter de la lumière dans les moments difficiles. Parfait pour quiconque a besoin d\'un rappel que des jours meilleurs sont toujours à venir.', 'img_699f14296f88a.png', 'disponible', '2026-02-25 15:24:25'),
(24, 26, 'Thinking, Fast & Slow', 'Daniel Kahneman', 'Une exploration révolutionnaire de notre esprit par un prix Nobel. Découvrez les deux systèmes qui dictent notre façon de penser, les biais cachés de notre intuition, et apprenez à prendre de meilleures décisions.', 'img_699f14d3b0aad.png', 'non disponible', '2026-02-25 15:27:15'),
(25, 27, 'Psalms', 'Alabaster', 'Une édition au design époustouflant du livre des Psaumes. Grâce à une typographie soignée et des photographies à couper le souffle, ce livre offre une manière fraîche et méditative d\'aborder la poésie ancienne.', 'img_699f15bda12f1.png', 'disponible', '2026-02-25 15:31:09'),
(26, 28, 'Innovation', 'Matt Ridley', 'Une plongée fascinante dans l\'histoire et les mécanismes de l\'innovation. Découvrez comment naissent les grandes idées et pourquoi certaines réussissent à changer notre monde tandis que d\'autres échouent.', 'img_699f1798d61e5.png', 'disponible', '2026-02-25 15:39:04'),
(27, 29, 'Hygge', 'Meik Wiking', 'Le guide définitif de l\'art de vivre à la danoise. Apprenez à créer une atmosphère de chaleur, de confort et de connexion dans votre propre maison pour cultiver votre bien-être au quotidien.', 'img_699f1b6d69afd.png', 'disponible', '2026-02-25 15:55:25'),
(28, 30, 'Minimalist Graphics', 'Julia Schonlau', 'Une vitrine exceptionnelle du design graphique minimaliste. Parfait pour les créatifs en quête d\'inspiration, ce livre démontre avec brio que dans la communication visuelle, \'moins c\'est souvent plus\'.', 'img_699f1ca88a315.png', 'disponible', '2026-02-25 16:00:40'),
(29, 31, 'Milwaukee Mission', 'Elder Cooper Low', 'Un récit personnel captivant sur le dévouement et le service. Ces mémoires inspirantes retracent les défis, les rencontres et les triomphes d\'une expérience de mission profondément humaine.', 'img_699f1db67e8ff.png', 'disponible', '2026-02-25 16:05:10'),
(30, 32, 'Delight!', 'Justin Rossow', 'Un guide inspirant pour cultiver la joie et l\'émerveillement dans votre parcours spirituel. Ce livre vous invite à ralentir et à trouver un plaisir profond dans les moments simples du quotidien.', 'img_699f1eca5df10.png', 'non disponible', '2026-02-25 16:09:46'),
(31, 29, 'Milk & honey', 'Rupi Kaur', 'Un recueil de poésie et de prose profondément émouvant qui explore la survie, l\'amour, la perte et la féminité. Un voyage à travers les moments les plus amers de la vie pour y trouver une douceur inattendue.', 'img_699f1fb50c6fc.png', 'disponible', '2026-02-25 16:13:41'),
(32, 33, 'Wabi Sabi', 'Beth Kempton', 'Découvrez le secret japonais d\'une vie parfaitement imparfaite. Un guide transformateur pour trouver la beauté dans le quotidien, accepter le passage du temps et se libérer de la quête épuisante de la perfection.', 'img_699f206b452ad.png', 'disponible', '2026-02-25 16:16:43'),
(33, 33, 'The Kinfolk Table', 'Nathan Williams', 'J\'ai récemment plongé dans les pages de \'The Kinfolk Table\' et j\'ai été enchanté par cette œuvre captivante. Ce livre va bien au-delà d\'une simple collection de recettes ; il célèbre l\'art de partager des moments authentiques autour de la table. \r\n\r\nLes photographies magnifiques et le ton chaleureux captivent dès le départ, transportant le lecteur dans un voyage à travers des recettes et des histoires qui mettent en avant la beauté de la simplicité et de la convivialité. \r\n\r\nChaque page est une invitation à ralentir, à savourer et à créer des souvenirs durables avec les êtres chers. \r\n\r\n\'The Kinfolk Table\' incarne parfaitement l\'esprit de la cuisine et de la camaraderie, et il est certain que ce livre trouvera une place spéciale dans le cœur de tout amoureux de la cuisine et des rencontres inspirantes.', 'img_699f20c2e491e.png', 'disponible', '2026-02-25 16:18:10'),
(34, 34, 'Esther', 'Alabaster', 'Une magnifique exploration visuelle de l\'histoire biblique d\'Esther. Mêlant une photographie contemporaine saisissante à un texte profond, ce livre offre une nouvelle façon de contempler ce récit classique.', 'img_699f3472c460a.png', 'disponible', '2026-02-25 17:42:10');

-- --------------------------------------------------------

--
-- Structure de la table `conversations`
--

CREATE TABLE `conversations` (
  `id` int(11) NOT NULL,
  `user1_id` int(11) NOT NULL,
  `user2_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `conversations`
--

INSERT INTO `conversations` (`id`, `user1_id`, `user2_id`) VALUES
(6, 35, 28),
(7, 35, 32),
(8, 35, 26),
(9, 36, 26),
(10, 36, 33),
(11, 36, 29);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `conversation_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `is_read` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `conversation_id`, `sender_id`, `content`, `created_at`, `is_read`) VALUES
(27, 9, 36, 'Bonjour, le livre est-il disponible ? ', '2026-02-25 19:13:13', 1),
(28, 10, 36, 'Bonjour Alex ! J\'ai vu que tu proposais Wabi Sabi. Est-ce qu\'un échange contre un de mes livres de cuisine t\'intéresserait ?', '2026-02-25 19:36:02', 1),
(29, 11, 36, 'Bonjour Hugo, je suis très intéressé par ton exemplaire de Hygge. Est-il en bon état ? Pas trop corné ?', '2026-02-25 19:37:52', 1),
(30, 9, 26, 'Bonjour ! Je l\'ai prêté à un ami qui doit me le rendre à la fin de la semaine. Si tu n\'es pas trop pressé, il sera libre lundi prochain.', '2026-02-25 19:40:53', 1),
(31, 11, 29, 'Salut ! Il est comme neuf, je ne l\'ai lu qu\'une seule fois. Je peux t\'envoyer une photo de la tranche si tu veux être rassuré.', '2026-02-25 19:42:05', 1),
(32, 11, 36, 'C\'est gentil, mais si tu me dis qu\'il est propre, je te fais confiance. On valide pour un échange cette semaine ?', '2026-02-25 19:43:17', 1),
(33, 9, 36, 'Super, ça me va parfaitement. Peux-tu me mettre une option dessus ? Je te recontacte lundi pour confirmer.', '2026-02-25 19:44:02', 1),
(34, 11, 29, 'Ça marche pour moi. Je suis disponible en fin de journée vers 16h dans le centre-ville.', '2026-02-25 19:46:04', 0),
(35, 9, 26, 'C\'est noté, je te le réserve. À lundi !', '2026-02-25 19:55:41', 1),
(36, 10, 33, 'Salut ! Oui, pourquoi pas, je cherche justement à renouveler ma bibliothèque. Tu aurais lequel en tête ?', '2026-02-25 19:56:58', 1),
(39, 10, 36, 'Je pensais à The Kinfolk Table, il est dans le même esprit. On peut se retrouver demain midi devant la bibliothèque pour faire l\'échange ?', '2026-02-25 20:24:45', 1),
(40, 10, 33, 'C\'est parfait pour moi ! À demain 12h30 alors.', '2026-02-25 20:25:26', 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT '''default_avatar.png''',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `email`, `password`, `avatar`, `created_at`) VALUES
(3, 'test', 'test@test.com', '', '', '2026-02-03 12:34:50'),
(14, 'adele', 'adel@mail.com', '$2y$10$.9LWcdH7ZZCFaW7XN/x5K.qQcJ/0Aj20L7klwiUIPdGOxiauM/SEi', 'avatar_6992a7ea16184.jpg', '2026-02-16 04:15:10'),
(19, 'al', 'al@mail.com', '$2y$10$b0NtoQw0sB0.iq1kzVazvuUuNd4oGGfmrHr3RPdEeQvfxG0acnIjC', 'Avatar_default.png', '2026-02-22 01:16:20'),
(21, 'Lotrfanclub67', 'Lotrfanclub67@mail.com', '$2y$10$Rocar5eKPqdvuQleJpiFle2MV7tC3rgi5QRCtR13OvW0nQv9waVqq', 'avatar_699f091e85856.jpeg', '2026-02-25 14:28:04'),
(22, 'victoirefabr912', 'victoirefabr912@mail.com', '$2y$10$Qv9xNw7jofoXhNuGjlBAduNfBwC/lqG/1KJj9ERhOlqCpxSea4RA2', 'Avatar_default.png', '2026-02-25 14:48:02'),
(23, 'AnnikaBrahms', 'AnnikaBrahms@mail.com', '$2y$10$P9J9qG/Wsrv/NPwLxcK5R.Z7ftfrjWSr3MdBveXc1OmX.3T.TLIVu', 'Avatar_default.png', '2026-02-25 14:56:10'),
(24, 'Oussaf06', 'Oussaf06@mail.com', '$2y$10$7GuA3hSGQoYuXL5TsZ.eCeJQB5w9wXP/Dt338p1u98tXMcAyJ4ULG', 'avatar_699f10f555692.jpeg', '2026-02-25 15:10:07'),
(25, 'ML95', 'ML95@mail.com', '$2y$10$XH8ieKLoPQ3VFM5qrMXu9Ok78yWOnen891FmIVbr/bcuvGkX9Uy.C', 'avatar_699f14339add1.png', '2026-02-25 15:14:44'),
(26, 'Sas634', 'Sas634@mail.com', '$2y$10$fAYjDoD8TAZnSjxicgNRO.DlWeJmBVazsOajjG0ZPHs9exnV9OM6S', 'avatar_699f14fe9e090.jpg', '2026-02-25 15:25:36'),
(27, 'Lolo236', 'Lolo236@mail.com', '$2y$10$MME/lXEoI6845kjayNr9EuZCbAFh/rDyAfmhsszrNzdidL3QFvnZO', 'avatar_699f160d0c061.png', '2026-02-25 15:28:52'),
(28, 'Iscocharo', 'Iscocharo@mail.com', '$2y$10$.vu7mSC4n4y7oyj.cbMMfukVb56Knmm12.gECZGymm5od25olT23.', 'avatar_699f19a20dcf3.png', '2026-02-25 15:36:20'),
(29, 'Hugo1990_12', 'Hugo1990_12@mail.com', '$2y$10$bSiFuxidUWrq2SAS/jt1DueJMHLJew7oAkHdKea7O8.Y1hb4tgP9a', 'avatar_699f1bc3246f1.png', '2026-02-25 15:53:34'),
(30, 'Lp', 'Lp@mail.com', '$2y$10$IEdaG8W10u3WjSBheVToq.GnwYOc8qqzMtdo72qbiJ98ZST8LW9yq', 'avatar_699f1cb9a686b.png', '2026-02-25 15:58:51'),
(31, 'Urzito', 'Urzito@mail.com', '$2y$10$kgnYP2i73ru4EQ/GgJxMieRHRZihUm1jeBTItHMeft1108.AhJz3q', 'avatar_699f1e1bd4e26.jpg', '2026-02-25 16:02:06'),
(32, 'Raphou_ratos', 'Raphou_ratos@mail.com', '$2y$10$MWmdiKKUBKz/VMgB/pFNjO/YqHKf/fFxGei7IQxjLRVjW8ezDC/AG', 'avatar_699f1eee8182d.jpg', '2026-02-25 16:07:55'),
(33, 'Alexlecture', 'Alexlecture@mail.com', '$2y$10$yu8BDhxqvUJvBUeoNbZ5j.fHXqT5Ta6k60x6HUK6xAx451bWcuhz6', 'avatar_699f2029b4978.jpg', '2026-02-25 16:14:38'),
(34, 'Mounguele29', 'Mounguele29@mail.com', '$2y$10$DifhqYZSzRE1Wynh.G9vheqmkyn4F/u4TzmjI/NGLFb6MHbYuOiSi', 'avatar_699f33fa6534f.png', '2026-02-25 17:38:26'),
(35, 'nathalie', 'nathalie@mail.com', '$2y$10$e/zh/zps9VInotzc9oU8WeZfCKMwhXumZW2ixnFdlWveBnkDxFcRi', 'avatar_699f3a97b472c.jpg', '2026-02-25 17:44:36'),
(36, 'Nathalire', 'nathalire@mail.com', '$2y$10$WymhoATOdgzpvzuMTZ2MoOPc7A.q4yWv2MBNiHMGyaSjgj0Z0C3aG', 'avatar_699f3b46d70e1.jpg', '2026-02-25 18:09:56');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user1_id` (`user1_id`),
  ADD KEY `user2_id` (`user2_id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_conversation` (`conversation_id`),
  ADD KEY `messages_sender` (`sender_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `fk_books_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `conversations`
--
ALTER TABLE `conversations`
  ADD CONSTRAINT `conversations_user1` FOREIGN KEY (`user1_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `conversations_user2` FOREIGN KEY (`user2_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_conversation` FOREIGN KEY (`conversation_id`) REFERENCES `conversations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_sender` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
