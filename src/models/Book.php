<?php

class Book extends AbstractEntity
{
    private int $id;
    private int $userId;
    private string $author;
    private string $title;
    private string $description;
    private string $image;
    private string $disponibilite;

    //id
    public function getId(): int 
    {
        return $this->id;
    }
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    //user_id
    public function getUserId(): int 
    {
        return $this->userId;
    }
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    //title
    public function getTitle(): string 
    {
        return $this->title;
    }
    public function setTitle(string $title): void
    {
        $this->title = $title;
    } 

    //author
    public function getAuthor(): string 
    {
        return $this->author;
    }
    public function setAuthor(string $author): void
    {
        $this->author = $author;
    } 

    //description
    public function getDescription(): string 
    {
        return $this->description;
    }
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    //image
    public function getImage(): string 
    {
        return $this->image;
    }
    public function setImage(string $image): void
    {
        $this->image = $image;
    } 

    //Disponibilite
    public function getDisponibilite(): string 
    {
        return $this->disponibilite;
    }
    public function setDisponibilite(string $disponibilite): void
    {
        $this->disponibilite = $disponibilite;
    } 
}
