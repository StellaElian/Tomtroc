<?php
class MessageController
{
    //Affichage page messagerie
    public function showMessages()
    {
        if (!Utils::isUserConnected()) {
            Utils::redirect('login');
        }

        $userId = $_SESSION['user_id'];
        // On appelle le Manager (celui qui parle à la base de données)
        $messageManager = new MessageManager();

        //création automatique de conversation
        if (isset($_GET['create_chat_with'])) {
            $idDuDestinataire = (int)$_GET['create_chat_with'];
            
            // On empêche de se parler à soi-même
            if ($idDuDestinataire !== $userId) {
                // Le Manager crée ou récupère l'existante
                $conversationId = $messageManager->createConversation($userId, $idDuDestinataire);
                
                // On redirige proprement vers la conversation ouverte
                Utils::redirect("messagerie&id=" . $conversationId);
            }
        }

        $conversations = $messageManager->getMyConversations($userId);

        // SQL nous donne "User1" et "User2". Mais qui est mon interlocuteur ?

        foreach ($conversations as $key => $conversation) {

            // Si JE SUIS l'utilisateur 1
            if ($conversation['user1_id'] == $userId) {
                // l'autre, c'est l'utilisateur 2,On crée une nouvelle case 'pseudo_autre' pour simplifier l'affichage plus tard
                $conversations[$key]['pseudo_autre'] = $conversation['user2_pseudo'];
                $conversations[$key]['avatar_autre'] = $conversation['user2_avatar'];
                $conversations[$key]['id_autre']     = $conversation['user2_id'];
            }
            // Sinon (ça veut dire que je suis l'utilisateur 2) et l'autre, c'est l'utilisateur 1 
            else {
                $conversations[$key]['pseudo_autre'] = $conversation['user1_pseudo'];
                $conversations[$key]['avatar_autre'] = $conversation['user1_avatar'];
                $conversations[$key]['id_autre']     = $conversation['user1_id'];
            }
        }

        // liste vide au cas où on n'a cliqué sur rien
        $messages = [];

        if (isset($_GET['id'])) {
            $conversationId = (int)$_GET['id'];
            // On demande au manager : "Donne-moi tous les messages de la conversation n°5"
            $messages = $messageManager->getMessagesByConversationId($conversationId);
        }

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
        $monId = $_SESSION['user_id'];

        if (!empty($content) && !empty($receiverId)) {

            $messageManager = new MessageManager();

            //On crée la conversation (ou on récupère son ID si elle existe déjà)
            // la fonction 'createConversation' gère tout.
            $conversationId = $messageManager->createConversation($monId, $receiverId);

            //On enregistre le message dedans
            $messageManager->postMessage($conversationId, $monId, $content);

            //On recharge la page pour voir le nouveau message
            Utils::redirect('messagerie&id=' . $conversationId);
        } else {
            Utils::redirect('messagerie');
        }
    }
}
