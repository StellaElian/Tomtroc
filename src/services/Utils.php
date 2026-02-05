<?php 
/**
 * Classe utilitaire : cette classe ne contient que des méthodes statiques qui peuvent être appelées
 * directement sans avoir besoin d'instancier un objet Utils.
 * Exemple : Utils::redirect('home'); 
 */
class Utils
{
    // redirection vers une URL 
    public static function redirect(string $action): void
    {
        header("Location: index.php?action=" . $action);
        exit();
    }
    //Vérifiez si l'utilisateur est connecté , utile pour protéger les pages " Mon compte"
    public static function isUserConnected(): bool
    {
        //vérification si la variable 'user_id' existe dans la session
        return isset($_SESSION['user_id']);
    }
}