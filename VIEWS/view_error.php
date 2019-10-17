<?php $this -> title ='erreur';

?>
<div class="container">
    <section class="col-lg-12 text-center">
<?php
if  ($_SESSION['error'] == "tooshort")
{
  echo  'Le mot de passe doit faire entre 5 et 20 caracteres';
  echo ' <br/>  <a href=../VIEWS/view_changePass.php>  Réessayer </a>   ';
}

if  ($_SESSION['error'] == "notsame")
{
    echo "Les mots de passe ne correspondent pas";
    echo ' <br/>  <a href=../VIEWS/view_accueil.php> Retourner à l\'accueil </a>   ';
}
if  ($_SESSION['error'] == "notcorresponding")
{
    echo"Ancien et nouveau mots de passe différents";
    echo ' <br/>  <a href=../VIEWS/view_changePass.php>  Réessayer </a>   ';
}


if ($_SESSION['error'] =="badnikname")
{
    echo"Mauvais pseudo";
    echo ' <br/>  <a href=../VIEWS/view_accueil.php> Retourner à l\'accueil </a>   ';
}

if ($_SESSION['error'] == "badnickname2")
{
    echo"Mauvais pseudo";
    echo ' <br/>  <a href=../VIEWS/view_accueil.php> Retourner à l\'accueil </a>   ';
}

if($_SESSION['error'] == "notconnected")
{
    echo "Vous n'etes pas connecté";
    echo ' <br/>  <a href=../VIEWS/view_changePass.php>  Réessayer </a>   ';

}

if($_SESSION['error'] == "falsemdp")
{
    echo "Mauvais mot de passe";
    echo ' <br/>  <a href=../index.php> Retourner à l\'accueil </a>   ';
}
?>
    </section>
</div>
<?php


require('view_template.php'); ?>
