<?php $this -> title ='Profil';

?>

<hr>
<div class="container">
    <table class="col-lg-12">

        <tr> <td> Pseudo : <?php echo $_SESSION['login'];  ?> </td> </tr>
        <tr> <td> <a href="view_changePass.php"> Changer mot de passe  </a>          </td>  </tr>
        <tr> <td> Email :  <?php echo  $_SESSION['mail'];?>       </td> </tr>
        <tr> <td> Numéro : <?php echo  $_SESSION['phone']; ?>    </td> </tr>
        <tr> <td> Pays : <?php echo  $_SESSION['country']; ?>      </td> </tr>
        <tr> <td> date d'inscription : <?php
                $date = DateTime::createFromFormat('Y-m-d',$_SESSION['date']);
                echo $date->format('d-m-Y');  ?>      </td> </tr>

    </table>

    <hr>

</div >

