<?php
require_once '../config/_config.php';
require_once '../config/autoload.php';

$userController = new UserController();
$bookController = new BookController();
$homeController = new HomeController();
$messageController = new MessageController();

$action = $_GET['action'] ?? $_POST['action'] ?? 'home';

switch($action){
    case 'register': //Affichage de la page 
        $userController->showRegister();
        break;
    case 'registerUser': // traite le formulaire 
        $userController->register();
        break;
    case 'login': //Affichage connexion
        $userController->showLogin();
        break;
    case 'connectUser': //Vérification password
        $userController->connect();
        break;
    case 'profile' : //profil utilisateur
        $userController->showProfile();
        break;
    case 'updateProfile' :
        $userController->updateProfile();
        break;
    case 'logout' :
        $userController->logout();
        break;
    case 'addBook' : //Affichage du formulaire
        $bookController->showAddBook();
        break;
    case 'addBookPost' :  
        $bookController->addBookPost();
        break;
    case 'deleteBook' :
        $bookController->deleteBook();
        break;
    case 'editBook' :
        $bookController->showEditBook();
        break;
    case 'editBookPost':
        $bookController->editBookPost();
        break;
    case 'exchange':
        $bookController->showCatalog();
        break;
    case 'show_book' : //public utilisateur
        if (isset($_GET['id']) && $_GET['id'] > 0){ 
            $bookController->ShowBook($_GET['id']);
        }else{
           $bookController->showCatalog();
        }
        break;
    case 'public_profile' : // pour que la redirection fonctionne 
        if (isset($_GET['id']) && $_GET['id'] > 0){
            // on demande d'afficher le  profil numéro..
            $userController->showPublicProfile($_GET['id']); 
        }else{
            $homeController->index();
        }
        break;
    case 'messagerie' :
        $messageController->showMessages();
        break;
    case 'sendMessage' :
        $messageController->sendMessage();
        break;
    default:
        $homeController->index();
        break;
}