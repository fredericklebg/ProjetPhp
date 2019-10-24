<?php


spl_autoload_register(function ($class) {
    require_once 'CONTROLLERS/'.$class . '.php';
});


session_start();
$routeur = new router();
$routeur->routerRequete();

