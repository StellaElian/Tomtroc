<?php
//crée la connexion et la retourne 
require_once '_config.php';

try{
    $pdo = new PDo(
    "mysql:host=" . DB_HOST . ",dbname=" . DB_NAME . ",charset=utf8",
    DB_USER,
    DB_PAST );
    //pour ne donner que les noms des colonnes
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::_FETCH_ASSOC);

    return $pdo;
}catch(Exception $e)
{
    die("Erreur de connexion : " . $e->getMessage());
}