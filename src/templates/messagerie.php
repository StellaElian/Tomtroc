<?php require_once '../src/templates/header.php'; ?>

<div class="messagerie-container">

    <div class="messagerie-sidebar">
        <h3>Mes messages</h3>

        <div class="conversation-list">
            <?php foreach ($conversations as $conversation): ?>
                <a href="index.php?action=messagerie&id=<?= $conversation['id'] ?>"
                    class="conversation-item <?= ($selectedConversationId == $conversation['id']) ? 'active' : '' ?>">

                    <img src="img/avatars/<?= htmlspecialchars($conversation['other_avatar']) ?>" alt="Avatar">

                    <div class="conversation-info">
                        <span class="pseudo"><?= htmlspecialchars($conversation['other_pseudo']) ?></span>
                        <span class="date">Cliquez pour lire</span>
                    </div>
                </a>
            <?php endforeach; ?>

            <?php if (empty($conversations)): ?>
                <p style="padding: 20px;">Aucune conversation pour le moment.</p>
            <?php endif; ?>
        </div>
    </div>

    <div class="messagerie-main">

        <?php if ($selectedConversationId && !empty($conversations)): ?>

            <div class="chat-header">
                <img src="img/avatars/<?= htmlspecialchars($otherUserAvatar) ?>" alt="Avatar">
                <h2><?= htmlspecialchars($otherUserPseudo) ?></h2>
            </div>

            <div class="chat-messages">
                <?php if (empty($messages)): ?>
                    <p class="no-message">Dites bonjour ! 👋</p>
                <?php else: ?>
                    <?php foreach ($messages as $msg): ?>

                        <?php
                        $isMe = ($msg->getSenderId() == $_SESSION['user_id']);
                        $classMessage = $isMe ? 'message-sent' : 'message-received';
                        ?>

                        <div class="message-row <?= $classMessage ?>">
                            <div class="message-bubble">
                                <p><?= nl2br(htmlspecialchars($msg->getContent())) ?></p>
                                <span class="message-date"><?= $msg->getFormattedDate() ?></span>
                            </div>
                        </div>

                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <form action="index.php?action=sendMessage" method="POST" class="chat-form">
                <?php
                // Petite astuce PHP pour retrouver l'ID de l'autre personne dans la liste
                $receiverId = 0;
                foreach ($conversations as $conv) {
                    if ($conv['id'] == $selectedConversationId) {
                        $receiverId = $conv['other_user_id'];
                        break;
                    }
                }
                ?>
                <input type="hidden" name="receiver_id" value="<?= $receiverId ?>">

                <textarea name="content" placeholder="Votre message..." required></textarea>
                <button type="submit">Envoyer</button>
            </form>

        <?php else: ?>
            <div class="empty-state">
                <p>Sélectionnez une conversation à gauche pour commencer à discuter.</p>
            </div>
        <?php endif; ?>

    </div>
</div>
<?php require_once '../src/templates/footer.php'; ?>