<?php $this->title = 'param';

$user=unserialize($_SESSION['user']);

if( $user != null && $user->getState() == 'admin')
{
?>
<div class="container">

    <div class="col-lg-5">
        <div class="row">
        <form  action="/ProjetPhp/admin"  method="post">
            <label> Choisir le nombre maximum de discussions ouvertes</label>
            <input type="text" placeholder="Nombre de discussions" name="d1"/>
            <button type="submit" name="action" value="changeNbDisc"> Valider </button> <br> <br>
            <label> Nombre maximum de messages dans une discussion </label>
            <input type="text" placeholder="Nombre de messages" name="d2"/>
            <button type="submit" name="action" value="changeNbMsg"> Valider </button> <br> <br>
            <label> Choisir la pagination de la page d'accueil </label> <br>
            <input type="text" placeholder="pagination" name="d5"/>
            <button type="submit" name="action" value="changePagination"> Valider </button> <br> <br>
            <label> Supprimer un utilisateur </label> <br>
            <input type="text" placeholder="Saisir le Pseudo" name="aurevoir"/>
            <button type="submit" name="action" value="Supprimer"> Supprimer </button> <br> <br>

        </form>
        </div>
        <div class="back">
            <a href="http://tpphp.alwaysdata.net/ProjetPhp" >retourner à la page d'accueil</a>
        </div>



    </div>
</div>

<?php
    }
else {
    throw new Exception('vous n\'etes pas un administrateur');
}


