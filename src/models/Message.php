<?php

class Message extends AbstractEntity
{
    private int $conversationId;
    private int $senderId;
    private string $content;
    private string $createdAt;

    public function getConversationId(): int
    {
        return $this->conversationId;
    }

    public function setConversationId(int $conversationId): void
    {
        $this->conversationId = $conversationId;
    }

    public function getSenderId(): int
    {
        return $this->senderId;
    }

    public function setSenderId(int $senderId): void
    {
        $this->senderId = $senderId;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function setCreatedAt(string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    //format date : 21.08 à 15:48
    /*public function getformattedDate(): string
    {
        try {
            $date = new DateTime($this->createdAt);
            return $date->format('d.m à H:i');
        } catch (Exception $e) {
            return $this->createdAt;
        }
    }*/


    // donnes UNIQUEMENT la date (jour etmois )
    public function getOnlyDate(): string
    {
        try {
            $date = new DateTime($this->createdAt);
            return $date->format('d.m');
        } catch (Exception $e) {
            return '';
        }
    }

    // Donne UNIQUEMENT l'heure (ex: 15:48)
    public function getOnlyTime(): string
    {
        try {
            $date = new DateTime($this->createdAt);
            return $date->format('H:i');
        } catch (Exception $e) {
            return '';
        }
    }
}
