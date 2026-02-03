<?php 

class User extends AbstractEntity
{
    private string $pseudo;
    private string $email;
    private string $password;

    // pseudo: ranger et afficher
    public function setPseudo(string $pseudo): self
    {
       $this->pseudo = $pseudo;
       return $this;
    }

    public function getpseudo(): sting {
        return $this->pseudo;
    }

    //email: ranger et afficher

    public function setEmail(string $email): self
    {
       $this->email = $email;
       return $this;
    }

    public function getEmail(): sting {
        return $this->email;
    }

    // password: ranger et afficher

    public function setPassword(string $password): self
    {
       $this->pseudo = $password;
       return $this;
    }

    public function getpassword(): sting {
        return $this->password;
    }

}