<?php
require_once '../config/_config.php';
require_once '../config/autoload.php';

$controller = new UserController();

$action = $_GET['action'] ?? 'home';
switch($action){
    case 'register':
        $userController->showRegister();
        break;
    case 'registerUser':
        $userController->registerUser();
        break;
    default :
        $userConbtroller->showHome();
        break;
}