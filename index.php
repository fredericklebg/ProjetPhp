<?php
require 'CONTROLLERS/controller_main.php';

session_start();
$routeur = new controller_main();
$routeur->controlRequete();

