<?php
require_once '../config/_config.php';
require_once '../config/autoload.php';

$userController = new UserController();

$action = $_GET['action'] ?? 'home';
switch($action){
    case 'register': //Affichage de la page 
        $userController->showRegister();
        break;
    case 'registerUser': // traite le formulaire 
        $userController->register();
        break;
    default:
        $userController->showHome();
        break;
}