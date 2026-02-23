<?php

class MessageManager extends AbstractEntityManager
{
    //Récupère toutes les conversations d'un utilisateur

    public function getMyConversations(int $userId): array
    {
        // On cherche les conversations où je suis user1 OU user2
        $sql = "SELECT c.*, 
                u1.pseudo as user1_pseudo, u1.avatar as user1_avatar,
                u2.pseudo as user2_pseudo, u2.avatar as user2_avatar,
                (SELECT content FROM messages m WHERE m.conversation_id = c.id ORDER BY m.created_at DESC LIMIT 1) as last_message,
                /* recyperer l'heure du dernier message */
                (SELECT created_at FROM messages m WHERE m.conversation_id = c.id ORDER BY m.created_at DESC LIMIT 1) as last_message_date
                FROM conversations c
                JOIN users u1 ON c.user1_id = u1.id
                JOIN users u2 ON c.user2_id = u2.id
                WHERE c.user1_id = :userId OR c.user2_id = :userId
                ORDER BY c.id DESC";

        $query = $this->db->query($sql, ['userId' => $userId]);

        return $query->fetchAll();
    }

    //Récupère tous les messages d'une conversation précise

    public function getMessagesByConversationId(int $conversationId): array
    {
        $sql = "SELECT * FROM messages 
                WHERE conversation_id = :conversationId 
                ORDER BY created_at ASC";

        $query = $this->db->query($sql, ['conversationId' => $conversationId]);
        $rows = $query->fetchAll();

        $messages = [];
        foreach ($rows as $row) {
            $messages[] = new Message($row);
        }
        return $messages;
    }

    //Crée une nouvelle conversation ou récupère l'existante

    public function createConversation(int $senderId, int $receiverId): int
    {
        // Vérifier si une conversation existe déjà
        $sqlCheck = "SELECT id FROM conversations 
                     WHERE (user1_id = :u1 AND user2_id = :u2) 
                        OR (user1_id = :u2 AND user2_id = :u1)";

        $query = $this->db->query($sqlCheck, ['u1' => $senderId, 'u2' => $receiverId]);
        $existing = $query->fetch();

        if ($existing) {
            return $existing['id'];
        }

        // Sinon, on la crée
        $sqlInsert = "INSERT INTO conversations (user1_id, user2_id) VALUES (:u1, :u2)";
        $this->db->query($sqlInsert, ['u1' => $senderId, 'u2' => $receiverId]);

        //Pour récupérer l'ID créé, on doit utiliser getPDO() car le query() ne retourne pas l'ID.
        return $this->db->getPDO()->lastInsertId();
        // l'id  créer ?pour rediriger l'user vers son new chat
    }

    // Enregistrer un message

    public function postMessage(int $conversationId, int $senderId, string $content): bool
    {
        $sql = "INSERT INTO messages (conversation_id, sender_id, content, created_at) 
                VALUES (:conversationId, :senderId, :content, NOW())";

        $this->db->query($sql, [
            'conversationId' => $conversationId,
            'senderId' => $senderId,
            'content' => $content
        ]);

        return true;
    }
}
