<?php $this->title ='mot de passe oublié'; ?>

<div class="container">

    <section class="col-lg-12 text-center">
        <p >Votre code a bien été envoyé  par mail<br> </p>
        <a href="http://tpphp.alwaysdata.net/ProjetPhp"> retourner a la page d'accueil </a>
        <form class="changebloc"  action="http://tpphp.alwaysdata.net/ProjetPhp/?page=accueil&action=passChanged" method="post">
            <input type="password" placeholder="ancien mot de passe" name="token" /> <br>
            <input type="password" placeholder="nouveau mot de passe" name="newMdp"/> <br>
            <input type="password" placeholder="confirmer mot de passe" name="confirmMdp"/> <br>
            <input type="submit" name="action" value="changePass" placeholder="modifier"/> <br>
        </form>

    </section>
</div>

