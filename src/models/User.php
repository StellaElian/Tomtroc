<?php 

class User extends AbstractEntity
{
    private string $pseudo;
    private string $email;
    private string $password;

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

    public function setAvatar(string $avatar): void
    {
       $this->avatar = $avatar;
    }

    public function getAvatar(): string {
        return $this->avatar;
    }

    public function setCreatedAt(string $created_at): void
    {
       $this->created_at = $created_at;
    }

    public function getCreatedAt(): string {
        return $this->created_at;
    }
}