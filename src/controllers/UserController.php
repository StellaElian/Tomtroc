<?php
class UserController
{
    public function showProfile(): void
    {
        if(isset($_SESSION['user_id'])){
            $usermanager = new UserManager();
            $user = $userManager->getUserById(['user_id']);
            require_once '../src/templates/profile.php';
        }else{
            header(Location:'index.php?action=register');
        }
    }

    // page d'inscription 
    public function showRegister(): void
    {
        require_once '../src/templates/register.php';
    }

    //Formulaire d'inscription
    public function registerUser(): void
    {
        if(!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password'])){
            $userManager = new Usermanager();
            $userManager->createUser($_POST['pesudo'], $_POST['email'], $_POST['password']);
            header('Location: index.php');
        }else{
            echo "Veuillez remplir tous les champs ou réessayer";
            require_once '../src/templates/register.php';
        }
    }

    //redirection vers la page d'acceuil
    public function showHome(): void
    {
        require_once '../src/templates/home.php';
    }
    //test rapide 
    public function testLogin(): void 
    {
        $_SESSION['user_ifd'] = 1;
        echo "Tu es connecté user 1";
        echo "<br><ahref='index.php?action=ptofile'>Voir mon profil</a>";
    }
}