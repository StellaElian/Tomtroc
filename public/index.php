<?php
require_once '../config/_config.php';
require_once '../config/autoload.php';
require_once '../src/managers/DBManager.php';

$usercontroller = new UserController();
$usercontroller->showFirstUser();
