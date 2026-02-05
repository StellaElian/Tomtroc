<?php
class UserController
{
    public function showProfile(): void
    {
        if(isset($_SESSION['user_id'])){
            $userManager = new UserManager();
            $user = $userManager->getUserById($_SESSION['user_id']);
            require_once '../src/templates/profile.php';
        }else{
            header('Location: index.php?action=register');
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
            $user->setPseudo($_POST['pseudo']);
            $user->setEmail($_POST['email']) ;
            //transformation du mdp en code secret pour la sécurité
            $passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $user->setPassword($passwordHash);
            // on lui donne une image par défault
            $user->setAvatar('default-avatar.png');
            //on appelle le manager ranger en bdd
            $userManager = new UserManager();
            $userManager->createUser($user);
            //on utilise utils pour rediriger vers l'acceuil
            Utils::redirect('home');
        
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
    
    // afficher la page de connexion
    public function showLogin(): void
    {
        require_once '../src/templates/login.php';
    }

    //verification de l'email et du password pour connecter l'utilisateur 
    public function connect(): void
    {
        //si les champs sont remplis, on appelle le manager pour chercher l'utilisateur avec cet email
        if (!empty($_POST['email']) && !empty($_POST['password'])){
            $userManager = new UserManager();
            $user = $userManager->getUserByEmail($_POST['email']);
            if ($user !== null){
                //verification password
                if (password_verify($_POST['password'], $user->getPassword())){
                    // on enregistre l'id de l'user dans la session
                    $_SESSION['user_id'] = $user->getId();
                    $_SESSION['user'] = $user;
                    Utils::redirect('home');
                }else{
                    echo "Mauvais mot de passe";
                    require_once '../src/templates/login.php';
                }     
            }else{
                echo " Cet Email n'existe pas.";
                require_once "../src/templates/login.php";
            }
        }
        
    }
}
