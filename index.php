<?php
require_once 'CONTROLLERS/router.php';
require_once 'CONTROLLERS/controller_main.php';

session_start();
$routeur = new router();
$routeur->routerRequete();

