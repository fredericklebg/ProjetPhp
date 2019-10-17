<?php $this->title ='Changement de mot de passe';

?>



    <form class="changebloc"  action="http://tpphp.alwaysdata.net/ProjetPhp/VIEWS/view_accueil.php?page=user&action=changePass" method="post">
        <input type="password" placeholder="ancien mot de passe" name="oldMdp" /> <br>
        <input type="password" placeholder="nouveau mot de passe" name="newMdp"/> <br>
        <input type="password" placeholder="confirmer mot de passe" name="confirmMdp"/> <br>
        <input type="submit" name="action" value="modifier"/> <br>
    </form>




























