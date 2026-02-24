<?php

class MessageController
{
    //Affichage page messagerie
    public function showMessages()
    {
        // 1. Vérification de sécurité
        if (!Utils::isUserConnected()) {
            Utils::redirect('login');
        }

        $userId = $_SESSION['user_id'];
        $messageManager = new MessageManager();
        $userManager = new UserManager(); //INDISPENSABLE pour trouver les pseudos !

        //Gestion de la création automatique 
        if (isset($_GET['create_chat_with'])) {
            $targetId = (int)$_GET['create_chat_with'];
            if ($targetId !== $userId) {
                $conversationId = $messageManager->createConversation($userId, $targetId);
                Utils::redirect("messagerie&id=" . $conversationId);
            }
        }

        $conversations = $messageManager->getMyConversations($userId);

        // On parcourt chaque conversation pour AJOUTER le pseudo et l'avatar manquants
        foreach ($conversations as $key => $conv) {
            
            // Qui est l'autre personne ?
            if ($conv['user1_id'] == $userId) {
                $otherId = $conv['user2_id'];
            } else {
                $otherId = $conv['user1_id'];
            }

            // On va chercher ses infos
            $otherUser = $userManager->getUserById($otherId);

            // IMPORTANT : On INJECTE les infos dans le tableau $conversations
            if ($otherUser) {
                $conversations[$key]['other_pseudo'] = $otherUser->getPseudo();
                $conversations[$key]['other_avatar'] = $otherUser->getAvatar();
                $conversations[$key]['other_user_id'] = $otherId;
            } else {
                $conversations[$key]['other_pseudo'] = "Utilisateur supprimé";
                $conversations[$key]['other_avatar'] = "default_avatar.png";
                $conversations[$key]['other_user_id'] = 0;
            }
        }

        //Gestion de la conversation sélectionnée
        $selectedConversationId = null;
        $messages = [];
        $otherUserPseudo = ""; 
        $otherUserAvatar = "";

        if (isset($_GET['id'])) {
            $selectedConversationId = (int)$_GET['id'];
        } elseif (!empty($conversations)) {
            $selectedConversationId = $conversations[0]['id'];
        }

        if ($selectedConversationId) {
            $messages = $messageManager->getMessagesByConversationId($selectedConversationId);
            
            // On retrouve les infos qu'on vient de calculer pour les afficher 
            foreach ($conversations as $conv) {
                if ($conv['id'] == $selectedConversationId) {
                    $otherUserPseudo = $conv['other_pseudo'];
                    $otherUserAvatar = $conv['other_avatar'];
                    $otherUserId = $conv['other_user_id'];
                    break;
                }
            }
            // On marque les messages de cette conversation comme lu
            $messageManager->markAsRead($selectedConversationId, $userId);
        }
        $_SESSION['unread_count'] = $messageManager->countUnreadMessages($userId);
        
        require_once '../src/templates/messagerie.php';
    }

    public function sendMessage()
    {
        if (!Utils::isUserConnected()) {
            Utils::redirect('login');
        }

        // On récupère ce que l'utilisateur a écrit
        $content = $_POST['content'];
        $receiverId = $_POST['receiver_id'];
        $userId = $_SESSION['user_id'];

        if (!empty($content) && !empty($receiverId)) {

            $messageManager = new MessageManager();

            //On crée la conversation (ou on récupère son ID si elle existe déjà)
            // la fonction 'createConversation' gère tout.
            $conversationId = $messageManager->createConversation($userId, $receiverId);

            //On enregistre le message dedans
            $messageManager->postMessage($conversationId, $userId, $content);

            //On recharge la page pour voir le nouveau message
            Utils::redirect('messagerie&id=' . $conversationId);
        } else {
            Utils::redirect('messagerie');
        }
    }
}
