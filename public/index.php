<?php
require_once '../config/_config.php.php';
require_once '../config/autoload.php';
require_once '../src/managers/DBManager.php';

$usercontroller = new UserController();
$usercontroller->showFirstUser();
