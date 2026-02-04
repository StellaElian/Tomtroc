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

    //test rapide 
    public function testLogin(): void 
    {
        $_SESSION['user_ifd'] = 1;
        echo "Tu es connecté user 1";
        echo "<br><ahref='index.php?action=ptofile'>Voir mon profil</a>";
    }

}