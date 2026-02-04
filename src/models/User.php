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

    public function getpseudo(): string {
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

    public function getpassword(): string {
        return $this->password;
    }
}