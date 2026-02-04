<?php 
/*  à chaque fois qu'on utilise le mot "new", PHP va appeler cette fonction.
    elle va chercher automatiquement le fichier correspondant dans les dossiers.
    ----> petit robot détecteur 
*/
spl_autoload_register(function ($className) 
{
    $managers = '../src/managers/' . $className . '.php';
    $models = '../src/models/' . $className . '.php';
    $controllers = '../src/controllers/' . $className . '.php';
    if (file_exists($managers)) {
        require_once $managers;
    }
    if (file_exists($models)) {
        require_once $modls;
    }

    if (file_exists($controllers)) {
        require_once $controllers;
    }
});