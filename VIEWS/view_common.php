<?php
require_once 'MODELS/models_user.php';

$user = unserialize($_SESSION['user']);;
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <title><?= $title ?></title>
<meta charset="UTF-8">
<base href="<?= $root ?>" >
<link href="VIEWS/css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="VIEWS/css/view_style.css">
<link rel="icon" type="image/png" href="VIEWS/Media/droite.png" />
<style type="text/css">
    .col-lg-8 { line-height: 200px; }
    /*.col-lg-12 { line-height: 80px; }*/
</style>
</head>
<body>
<div class="container">

    <header class="row">
        <?php
        if( $user != null && $user->getState() == 'admin')
        {
            ?>
            <div class="col-xs-2 col-lg-2 text-center"> <a href="http://tpphp.alwaysdata.net/ProjetPhp">
                    <img  alt="logo" src="VIEWS/Media/logroFreeNote.png" style="width: 70%"> </a></div>
            <?php
        }
        else
        {
            ?>
            <div class="col-xs-2 col-lg-2 text-center"> <a href="http://tpphp.alwaysdata.net/ProjetPhp">
                    <img  alt="logo" src="VIEWS/Media/logoFreeNote.png" style="width: 70%"> </a></div>
        <? } ?>
        <div class="col-xs-5 col-lg-5 text-center"> <a href="http://tpphp.alwaysdata.net/ProjetPhp"> <h1 style="line-height: 80px">GreeNote</h1> </a></div>
        <div class="col-xs-3 col-lg-3 text-center form" >

            <?php


            if ($_SESSION['isLogin']!='ok')
            {
                echo '<a class="coin" style="line-height: 80px;" > se connecter </a>';
            }
            else
            {
                echo '<p> </p>';
                echo '  Bienvenue ' . $user->getPseudo() . ' ! '   ;
                echo '<br/> <a href="/ProjetPhp/accueil/disconnect"> se déconnecter </a>';
            }

            ?>



            <form class="loginmenu" action="/ProjetPhp/accueil/login" method="post" >
                <a  href="/ProjetPhp/accueil/forgotMdp"> mot de passe oublié </a>
                <input type="text" name="login"  placeholder="Identifiant"/>
                <input type="password" name="mdp" placeholder="Mot de passe"/>
                <!--                    <input type="submit" name="action" value="login"/>-->
                <button type="submit" name="action" value="login"> login</button>


            </form>
        </div>
        <script src="VIEWS/menu_login.js"></script>


        <div class="col-xs-2 col-lg-2 text-center form">

            <?php

            if($_SESSION['isLogin'] != 'ok')
            {
                echo '<a class="reg" style="line-height: 80px;"> s\'inscrire </a>';
            }
            else
            {
                echo '<a href="/ProjetPhp/accueil/profilePage"><input class="avatar"  type="image"  alt="avatar"  src="VIEWS/Media/login.png"></a>';
            }

            ?>

            <form class="registerMenu" action="/ProjetPhp/accueil/inscription" method="post">
                <input type="text" placeholder="identifiant" name="identifiant" /> <br>
                <label> sexe </label> <br>
                <input type="radio" value="homme" name="genre" checked/> homme <br>
                <input type="radio" value="femme" name="genre" checked/> femme <br>
                <input type="text" placeholder="mail" name="mail"/>   <br>
                <input type="password" placeholder="mot de passe" name="mdp"/> <br>
                <input type="password" placeholder="confirmer mot de passe" name="cmdp"/> <br>
                <input type="text" placeholder="telephone" name="phone" /> <br>
                <select  name="pays">
                    <option> France </option>
                    <option> Espagne </option>
                    <option> Nigeria</option>
                    <option> Afghanistan </option>
                    <option> Russie </option>
                    <option> Angleterre </option>
                    <option> Chine </option>
                    <option> Inde </option>
                    <option> Irlande </option>
                    <option> Congo </option>
                    <option> Iran </option>
                    <option> Cuba </option>
                    <option> Portugal </option>
                    <option> Etats-Unis </option>
                </select> <br>
                <label> conditions générales </label>
                <input type="checkbox" name="conditions"/> <br>
                <input type="submit" name="action" value="inscription"/> <br>
            </form>

            <script src="VIEWS/menu_login.js"></script>

        </div>
    </header>
</div>
<hr>
<div id="contenu">
    <?= $content ?>   <!--  Élément spécifique -->
</div>
<hr>
<footer class="row page-footer" >


    <div class ="col-lg-12 text-center"> Copyright © | FreeNote </div>
    <div class="col-lg-3 text-center"> <a href="https://github.com/Vincent-SD" target="_blank">  Vincent Simonetti-Diez </a> </div>
    <div class="col-lg-3 text-center"> <a href="https://github.com/sergegamingb" target="_blank"> Alexandre Salles  </a> </div>
    <div class="col-lg-3 text-center"> <a href="https://github.com/Ibrahim-Boulahrouz" target="_blank">  Ibrahim Boulahrouz </a> </div>
    <div class="col-lg-3 text-center"> <a href="https://github.com/AnthonyZIANE" target="_blank">  Anthony Ziane </a> </div>

</footer>

</body>
</html>




