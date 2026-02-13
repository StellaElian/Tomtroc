<?php
/*  à chaque fois qu'on utilise le mot "new", PHP va appeler cette fonction.
    elle va chercher automatiquement le fichier correspondant dans les dossiers.
    ----> petit robot détecteur 
*/
// Quand on écrit new quelques chose, je vais chercher son fichier
spl_autoload_register(function ($className) {
    // prépare les chemins possibles 
    $managers = '../src/managers/' . $className . '.php';
    $models = '../src/models/' . $className . '.php';
    $controllers = '../src/controllers/' . $className . '.php';
    $services = '../src/services/' . $className . '.php';
    if (file_exists($managers)) {
        require_once $managers;
    }
    if (file_exists($models)) {
        require_once $models;
    }

    if (file_exists($controllers)) {
        require_once $controllers;
    }

    if (file_exists($services)) {
        require_once $services;
    }
});
