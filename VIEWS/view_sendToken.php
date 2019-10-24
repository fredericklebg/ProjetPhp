<?php $this->title ='mot de passe oublié'; ?>

<div class="container">

    <section class="col-lg-12 text-center">
        <p >Votre code a bien été envoyé  par mail<br> </p>
        <form class="changebloc"  action="http://tpphp.alwaysdata.net/ProjetPhp/?page=accueil&action=changePassTok" method="post">
            <input type="text" placeholder="Entrer le code" name="token" /> <br>
            <input type="password" placeholder="nouveau mot de passe" name="newMdp"/> <br>
            <input type="password" placeholder="confirmer mot de passe" name="confirmMdp"/> <br>
            <input type="submit" name="action" value="changePass"/> <br>
        </form>

    </section>
</div>

