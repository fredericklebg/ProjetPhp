<?php $this->title ='mot de passe oublié'; ?>

<div class="container">

    <div class="col-lg-12 text-center">
        <p >Votre code a bien été envoyé  par mail<br> </p>
        <form class="changebloc"  action="/ProjetPhp/accueil/replacePass" method="post">
            <input type="text" placeholder="Entrer le code" name="token" /> <br>
            <input type="password" placeholder="nouveau mot de passe" name="newMdp"/> <br>
            <input type="password" placeholder="confirmer mot de passe" name="confirmMdp"/> <br>
            <input type="submit" name="action" value="Remplacer"/> <br>
        </form>

    </div>
</div>

