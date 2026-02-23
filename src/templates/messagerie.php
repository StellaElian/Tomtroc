<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" , initial-scale="1.0">
    <title>Nos livres</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
</head>

<body>
    <?php require_once '../src/templates/_header.php'; ?>


    <main class="messagerie-page-wrapper">
        <div class="messagerie-container">

            <div class="messagerie-sidebar">
                <h1 class="messagerie-title">Messagerie</h1>

                <div class="conversation-list">
                    <?php foreach ($conversations as $conversation): ?>
                        <a href="index.php?action=messagerie&id=<?= $conversation['id'] ?>"
                            class="conversation-item <?= ($selectedConversationId == $conversation['id']) ? 'active' : '' ?>">

                            <div class="conv-avatar">
                                <img src="img/avatars/<?= htmlspecialchars($conversation['other_avatar'] ?? 'Avatar_default.png') ?>" alt="Avatar">
                            </div>

                            <div class="conv-info">
                                <div class="conv-header">
                                    <span class="conv-pseudo"><?= htmlspecialchars($conversation['other_pseudo']) ?></span>
                                    <span class="conv-time">15:43</span>
                                </div>
                                <p class="conv-preview">Cliquez pour lire...</p>
                            </div>
                        </a>
                    <?php endforeach; ?>

                    <?php if (empty($conversations)): ?>
                        <p style="padding: 10px; color: #A6A6A6; font-size: 14px;">Aucune conversation pour le moment.</p>
                    <?php endif; ?>
                </div>
            </div>

            <section class="messagerie-main">
                <?php if (isset($selectedConversationId) && $selectedConversationId && !empty($conversations)): ?>

                    <div class="chat-header">
                        <div class="chat-header-avatar">
                            <img src="img/avatars/<?= htmlspecialchars($otherUserAvatar ?? 'Avatar_default.png') ?>" alt="Avatar">
                        </div>
                        <h2 class="chat-header-pseudo"><?= htmlspecialchars($otherUserPseudo ?? 'Utilisateur') ?></h2>
                    </div>

                    <div class="chat-messages-area">
                        <?php if (empty($messages)): ?>
                            <p style="color: #A6A6A6; font-size: 14px;">Dites bonjour !</p>
                        <?php else: ?>
                            <?php foreach ($messages as $msg): ?>
                                <?php
                                // On vérifie si le message a été envoyé par "Moi" ou par "L'autre"
                                $isMe = ($msg->getSenderId() == $_SESSION['user_id']);
                                $classMessage = $isMe ? 'msg-sent' : 'msg-received';
                                ?>

                                <div class="message-row <?= $classMessage ?>">

                                    <?php if (!$isMe): ?>
                                        <img src="img/avatars/<?= htmlspecialchars($otherUserAvatar ?? 'Avatar_default.png') ?>" alt="Avatar" class="msg-avatar-small">
                                    <?php endif; ?>

                                    <div class="msg-content-wrapper">
                                        <div class="msg-meta">
                                            <span class="msg-date"><?= $msg->getFormattedDate() ?></span>
                                            <span class="msg-time">15:48</span>
                                        </div>
                                        <div class="msg-bubble">
                                            <p><?= nl2br(htmlspecialchars($msg->getContent())) ?></p>
                                        </div>
                                    </div>
                                </div>

                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>

                    <div class="chat-input-wrapper">
                        <form action="index.php?action=sendMessage" method="POST" class="chat-form">
                            <?php
                            // On retrouve l'ID de l'interlocuteur pour lui envoyer le message
                            $receiverId = 0;
                            foreach ($conversations as $conv) {
                                if ($conv['id'] == $selectedConversationId) {
                                    $receiverId = $conv['other_user_id'];
                                    break;
                                }
                            }
                            ?>
                            <input type="hidden" name="receiver_id" value="<?= $receiverId ?>">
                            <input type="text" name="content" class="chat-input-field" placeholder="Tapez votre message ici" required>
                            <button type="submit" class="btn-send-chat">Envoyer</button>
                        </form>
                    </div>

                <?php else: ?>
                    <div style="display:flex; justify-content:center; align-items:center; height:100%; color:#A6A6A6;">
                        <p>Sélectionnez une conversation à gauche pour commencer à discuter.</p>
                    </div>
                <?php endif; ?>
            </section>

        </div>
    </main>

    <?php require_once '../src/templates/_footer.php'; ?>


</body>

</html>