<?php 

class User extends AbstractEntity
{
    private string $pseudo;
    private string $email;
    private string $password;
    private string $avatar;
    private string $createdAt;

    // pseudo: ranger et afficher
    public function setPseudo(string $pseudo): void
    {
       $this->pseudo = $pseudo;
    }

    public function getPseudo(): string {
        return $this->pseudo;
    }

    //email: ranger et afficher

    public function setEmail(string $email): void
    {
       $this->email = $email;
    }

    public function getEmail(): string {
        return $this->email;
    }

    // password: ranger et afficher

    public function setPassword(string $password): void
    {
       $this->password = $password;
    }

    public function getPassword(): string {
        return $this->password;
    }

    // Avatar
    public function setAvatar(string $avatar): void
    {
       $this->avatar = $avatar;
    }

    public function getAvatar(): string {
        return $this->avatar;
    }

    //date création
    public function setCreatedAt(string $createdAt): void
    {
       $this->createdAt = $createdAt;
    }

    public function getCreatedAt(): string {
        return $this->createdAt;
    }
}