<?php
require_once 'CONTROLLERS/router.php';

session_start();
$routeur = new router();
$routeur->routerRequete();

