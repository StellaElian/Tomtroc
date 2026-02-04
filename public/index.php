<?php
require_once '../config/_config.php';
require_once '../config/autoload.php';

$controller = new UserController();
$controller->showFirstUser();
