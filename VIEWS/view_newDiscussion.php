<?php $this->title ='Nouvelle Discussion'; ?>

<div class="container">

    <section class="col-lg-12 text-center">

<form class="discbloc"  action="http://tpphp.alwaysdata.net/ProjetPhp/?page=discussion&action=createDiscussion" method="post">
        <input type="text" placeholder="nom discussion" name="nomDisc" /> <br>
        <input type="text" placeholder="nouveau message" name="newMsg" /> <br>
        <input type="submit" name="action" value="createDiscussion"/> <br>
    </form>
    </section>
</div>



