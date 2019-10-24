<?php $this->title ='changer mot de passe'; ?>

<div class="container">

    <section class="col-lg-12 text-center">

        <p >votre mot de passe a été modifié avec succés ! <br> </p>
        <form class="changebloc"  action="http://tpphp.alwaysdata.net/ProjetPhp/?page=accueil&action=passChanged" method="post">
            <input type="password" placeholder="ancien mot de passe" name="token" /> <br>
            <input type="password" placeholder="nouveau mot de passe" name="newMdp"/> <br>
            <input type="password" placeholder="confirmer mot de passe" name="confirmMdp"/> <br>
            <input type="submit" name="action" value="changePass" placeholder="modifier"/> <br>
        </form>
    </section>
</div>

