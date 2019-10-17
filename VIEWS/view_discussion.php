<?php $this->title ='Nouvelle Discussion'; ?>


<form class="discbloc"  action="../CONTROLLERS/controller_user.php" method="post">
        <input type="text" placeholder="nom_discussion" name="nom_discussion" /> <br>
        <input type="text" placeholder="new_message" name="new_message" /> <br>
        <input type="submit" name="action" value="new_discussion"/> <br>
    </form>



