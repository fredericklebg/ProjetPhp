<?php


spl_autoload_register(function ($class_name) {
    include 'CONTROLLERS/'.$class_name . '.php';
});

//require_once 'CONTROLLERS/router.php';
//require_once 'CONTROLLERS/controller_main.php';

session_start();
$routeur = new router();
$routeur->routerRequete();

