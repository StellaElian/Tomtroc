<?php
require_once 'config/_config.php';
require_once 'config/autoload.php';
require_once '../src/managers/DBManager.php';

$userController = new UserController();
$useCcontroller->showFirstUser();
