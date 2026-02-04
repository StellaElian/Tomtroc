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
        $url = "index.php?action=$action";
        foreach ($params as $paramName => $paramValue) {
            $url .= "&$paramName=$paramValue";
        }
        header("Location: $url");
        exit();
    }
    //Vérifiez si l'utilisateur est connecté , utile pour protéger les pages " Mon compte"
    public function isUserConnected(): bool
    {
        return isset($_SESSION['user']);
    }
}