<?php
/**
 * Classe abstraite qui représente un manager. Elle récupère automatiquement le gestionnaire de base de données. 
*/

abstract class AbstractEntityManager 
{
    protected $db;
    /**
     * Constructeur de la classe.
     * Il récupère automatiquement l'instance de DBManager. 
    */

    public function __construct()
    {
        // Tous les managers auront accés à la base grâce à cette classe
        $this->db =  DBManager::getInstance();
    }
}