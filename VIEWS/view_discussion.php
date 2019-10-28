<?php $this->title ='Page Discussion'; ?>


<div class="container">

    <section class="col-lg-12">

        <?php
        $msg = new message();
        $disc = new discussion();
        $query = $msg->showMsg($_GET['id']);
        ?>


        <div class="TitreD">
            <h2> <? echo $disc->getTitle($_GET['id']); ?> </h2>
        </div>

        <br>

        <div class="row text-center msg">


                <?php
                while($row = $query->fetch())
                {
                    echo '<p class="msg2">' . $row['content'];
                    echo '</p>';
                    echo '<br> <br>';

                }

                ?>

        </div>


        <?php

                if ($_SESSION['isLogin']=='ok')
                    {
                        ?>
                        <div class = "row text-center msg">
                            <div class="col-lg-4">
                                 <form action="/ProjetPhp/discussion/traiterMsg/<?echo $_GET['id']?>" method="post">
                                     <input type="text" placeholder="votre message" name="msg"/>
                                     <button type="submit" name="action" value="Envoyer"> compléter le message  </button>
                                     <?php
                                     if($msg->getState() == 'ouvert')
                                     {
                                     ?>
                                         <button type="submit" name="action" value="Fermer"> compléter et fermer le message </button>
                                     <? }
                                     ?>

                                 </form>
                            </div>
                        </div>
                        <?php
                    }

                else
                    {
                        ?>
                        <p class="info">Connectez-vous ou inscrivez vous pour participer à cette discussion</p>
                        <?php
                    }
                    ?>
            </section>

        </div>

