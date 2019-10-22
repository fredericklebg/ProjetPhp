<?php


spl_autoload_register(function ($class_name) {
    include 'CONTROLLERS/'.$class_name . '.php';
});


session_start();
$routeur = new router();
$routeur->routerRequete();

