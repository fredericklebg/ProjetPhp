<?php


spl_autoload_register(function ($class_name) {
    require_once 'CONTROLLERS/'.$class_name . '.php';
});


session_start();
$routeur = new router();
$routeur->routerRequete();

