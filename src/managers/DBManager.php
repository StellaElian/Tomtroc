<?php

/**
 * Classe qui permet de se connecter à la base de données.
 * C est un singleton. Cela signifie qu'il n'est pas possible de créer plusieurs instances de cette classe.
 * Pour récupérer une instance de cette classe, il faut utiliser la méthode getInstance().
 * Création d'une classe singleton qui permet de se connecter à la base de données.
 * On crée une instance de la classe DBConnect qui permet de se connecter à la base de données.
 */
class DBManager
{
    //boîte où on garde la connexion une fois qu'elle est ouverte, on stocke 1 seule connexion
    private static $instance = null;
    //variable qui contient l'outil de connexion (PDO)
    private $db;

    private function __construct()
    {
        $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // On demande de recevoir les données sous forme de tableau
        $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    /**
     * // Elle vérifie si la porte est ouverte :
     *  si oui elle donne la clé 
     * sinon : elle ouvre la porte
     */

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new DBManager();
        }
        return self::$instance;
    }

    //Récupérer l'outil PDO pour faire la requête 

    public function getPDO()
    {
        return $this->db;
    }

    /**
     * Méthode qui permet d'exécuter une requête SQL.
     * Si des paramètres sont passés, on utilise une requête préparée.
     * @param string $sql : la requête SQL à exécuter.
     * @param array|null $params : les paramètres de la requête SQL.
     * @return PDOStatement : le résultat de la requête SQL.
     */
    public function query(string $sql, ?array $params = null): PDOStatement
    {
        if ($params == null) {
            $query = $this->db->query($sql);
        } else {
            $query = $this->db->prepare($sql);
            $query->execute($params);
        }
        return $query;
    }
}
