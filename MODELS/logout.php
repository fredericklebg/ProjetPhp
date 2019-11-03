<?php

session_start();

$_SESSION['isLogin']='no';
header('Location: ../VIEWS/view_accueil.php');
