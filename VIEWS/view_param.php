<?php $this->title = 'param'; ?>
<div class="container">

    <section class="offset-4 col-lg-5 text-center">
        <div class="row">
        <form  action="/ProjetPhp/admin"  method="post">
            <label> chosir le nombre maximum de discussions ouvertes</label>
            <input type="text" placeholder="Nombre  de discussions" name="d1"/>
            <button type="submit" name="action" value="changeNbDisc"> Valider </button> <br> <br>
            <label> nombre maximum de message dans une discussion </label>
            <input type="text" placeholder="Nombre de messages" name="d2"/>
            <button type="submit" name="action" value="changeNbMsg"> Valider </button> <br> <br>
            <label> supprimer un utilisateur </label>
            <input type="text" placeholder="Saisir le Pseudo" name="d3"/>
            <button type="submit" name="action" value="delUser"> Supprimer </button> <br> <br>
<!--            <input type="text" placeholder="Saisir le Titre" name="d4"/>-->
<!--            <input type="submit" name="action" value="Supprimer"/> <br> <br>-->

<!--            <button type="submit" value="Validerrrr"> Valider </button>-->
        </form>
        </div>
        <div class="back">
            <a href="http://tpphp.alwaysdata.net/ProjetPhp" >retourner à la page d'accueil</a>
        </div>



    </section>
</div>



