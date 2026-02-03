<?php 
/*  à chaque fois qu'on utilise le mot "new", PHP va appeler cette fonction.
    elle va chercher automatiquement le fichier correspondant dans les dossiers.
    ----> petit robot détecteur 
*/
spl_autoload_register(function ($className) 
{
    if (file_exists('src/managers/' . $className . '.php')) {
        require_once 'src/managers/' . $className . '.php';
    }

    if (file_exists('src/models/' . $className . '.php')) {
        require_once 'src/models' . $className . '.php';
    }

    if (file_exists('src/controllers/' . $className . '.php')) {
        require_once 'src/controllers' . $className . '.php';
    }
});