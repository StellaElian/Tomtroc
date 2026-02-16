<?php
class UserController
{
    // page d'inscription 
    public function showRegister(): void
    {
        require_once '../src/templates/register.php';
    }

    //Formulaire d'inscription
    public function register(): void
    {
        if (!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password'])) {
            //instanciation de user
            $user = new User();
            // remplissage éléments du formulaire 
            $user->setPseudo($_POST['pseudo']);
            $user->setEmail($_POST['email']);
            //transformation du mdp en code secret pour la sécurité
            $passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $user->setPassword($passwordHash);
            // on lui donne une image par défault
            $user->setAvatar('Avatar_default.png');
            //on appelle le manager ranger en bdd
            $userManager = new UserManager();
            $userManager->createUser($user);
            //on utilise utils pour rla redirection vers login
            Utils::redirect('login');
        } else {
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
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            // demande si l'email existe dans la bdd 
            $userManager = new UserManager();
            $user = $userManager->getUserByEmail($_POST['email']);
            if ($user) {
                //verification password
                if (password_verify($_POST['password'], $user->getPassword())) {
                    // mdp bon donc on enregistre l'id de l'user dans la session
                    $_SESSION['user_id'] = $user->getId();
                    Utils::redirect('profile');
                } else {
                    echo "Mauvais mot de passe";
                    require_once '../src/templates/login.php';
                }
            } else {
                echo " Cet Email n'existe pas.";
                require_once "../src/templates/login.php";
            }
        } else {
            //si champs vides
            echo "Veuillez remplir tous les champs";
            require_once '../src/templates/login.php';
        }
    }

    public function showProfile(): void
    {
        if (Utils::isUserConnected()) {
            //recuperation des infos stockées grâce à son id
            $userManager = new UserManager();
            $bookManager = new BookManager();
            $userId = $_SESSION['user_id'];
            //récupération utilisateur
            $user = $userManager->getUserById($userId);
            //récupération de ses livres
            $books = $bookManager->getBooksByUser($userId);
            // affichage de la page profil
            require_once '../src/templates/profile.php';
        } else {
            Utils::redirect('login');
        }
    }

    public function updateProfile(): void
    {
        if (!Utils::isUserConnected()) {
            Utils::redirect('login');
        }

        if (empty($_POST['email']) || empty($_POST['pseudo'])) {
            Utils::redirect('profile');
        }

        $userManager = new UserManager();
        $user = $userManager->getUserById($_SESSION['user_id']);

        //màj
        $user->setPseudo($_POST['pseudo']);
        $user->setEmail($_POST['email']);


        if (!empty($_POST['password'])) {
            $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $user->setPassword($hashedPassword);
        }

        // --- GESTION DE L'AVATAR ---
        if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === 0) {

            // Définir le dossier de destination
            $uploadDir = 'img/avatars/';

            // Vérifier si le dossier existe, sinon le créer !
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true); // Crée le dossier avec tous les droits
            }

            // Préparer le nom du fichier
            $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
            $fileName = uniqid('avatar_') . '.' . $extension;
            $destinationPath = $uploadDir . $fileName;

            //Déplacer le fichier et VÉRIFIER si ça a marché
            if (move_uploaded_file($_FILES['avatar']['tmp_name'], $destinationPath)) {
                // Ça a marché ! On supprime l'ancien
                $oldAvatar = $user->getAvatar();
                if ($oldAvatar && $oldAvatar !== 'Avatar_default.png') {
                    $oldPath = $uploadDir . $oldAvatar;
                    if (file_exists($oldPath)) {
                        unlink($oldPath);
                    }
                }
                // On met à jour l'objet User
                $user->setAvatar($fileName);
            } else {
                // ERREUR D'ÉCRITURE
                die("Erreur : Impossible d'enregistrer l'image dans le dossier $uploadDir. Vérifiez les permissions.");
            }
        }
        $userManager->updateUser($user);
        Utils::redirect('profile');
    }

    public function logout(): void
    {
        $_SESSION = []; // vide le tableau
        session_destroy();
        session_regenerate_id(true); //sécurité
        Utils::redirect('home');
    }

    public function showPublicProfile(int $id): void
    {
        $userManager = new UserManager();
        $bookManager = new BookManager();
        // recuperation info utilisateur
        $user = $userManager->getUserById($id);

        if (!$user) {
            Utils::redirect('home');
        }
        //recuperation livres utilisateur
        $books = $bookManager->getBooksByUser($id);
        require_once '../src/templates/public_profile.php';
    }
}
