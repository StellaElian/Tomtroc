<?php
require_once '../config/_config.php.php';
require_once '../config/autoload.php';
require_once '../src/managers/DBManager.php';

$controller = new UserController();
$controller->showFirstUser();
