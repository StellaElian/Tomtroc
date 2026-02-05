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
    public function register(): void
    {
        if(!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password'])){
            //instanciation de user
            $user = new User();
            // remplissage éléments du formulaire 
            $user->setPseudo($_POST['pesudo']);
            $user->setEmail($_POST['email']) ;
            //transformation du mdp en code secret pour la sécurité
            $passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $user->setPassword($_POST['password']);
            //on appelle le manager ranger en bdd
            $userManager = new UserManager();
            $usermanager->createUser($user);
            //on utilise utils pour rediriger vers l'acceuil
            utils::redirect('home');
        
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