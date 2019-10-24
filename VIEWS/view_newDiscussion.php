<?php $this->title ='Nouvelle Discussion'; ?>

<div class="container">

    <section class="col-lg-12 text-center">

<form class="discbloc"  action="http://tpphp.alwaysdata.net/ProjetPhp/?page=discussion&action=createDiscussion" method="post">
        <input type="text" placeholder="nom discussion" name="nomDisc" /> <br>
        <input type="text" placeholder="nouveau message" name="newMsg" /> <br>
    <div class="DiscLien">
        <a href="http://tpphp.alwaysdata.net/ProjetPhp/?page=discussion&action=affichdisc">
        <input type="submit" name="action" value="createDiscussion"/> <br>
    </div>
    </form>
    </section>
</div>



