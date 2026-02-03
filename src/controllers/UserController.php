<?php
class UserController{
    public function showFirstUser(): void{
        //creation du manager pour chercher l'utilisateur
        $userManager = new UserManager();
        $user = $userManager->getFirstUser();
        require_once '../src/templates/home.php';
    }
}