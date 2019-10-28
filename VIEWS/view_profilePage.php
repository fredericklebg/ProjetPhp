<?php $this -> title ='Profil';
require_once 'MODELS/models_user.php';

$user=unserialize($_SESSION['user']);

?>

<hr>
<div class="container">
    <table class="col-lg-12">

        <tr> <td> Pseudo : <?php echo $user->getPseudo();  ?> </td> </tr>
        <tr> <td> <a href="/ProjetPhp/accueil/changePassView"> Changer mot de passe  </a>          </td>  </tr>
        <tr> <td> Email :  <?php echo $user->getMail();?>       </td> </tr>
        <tr> <td> Numéro : <?php echo  $user->getPhone(); ?>    </td> </tr>
        <tr> <td> Pays : <?php echo $user->getCountry(); ?>      </td> </tr>
        <tr> <td> date d'inscription : <?php
                $date = DateTime::createFromFormat('Y-m-d',$user->getUserDate());
                echo $date->format('d-m-Y');  ?>      </td> </tr>
<!--        <tr> <td> id : --><?//  echo $_SESSION['userId'];  ?><!--</td></tr>-->

    </table>

    <hr>

</div >

