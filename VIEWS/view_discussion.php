<?php $this->title ='Page Discussion'; ?>


<div class="container">

    <section class="col-lg-12">

        <?php
        $msg = new message();
        $disc = new discussion();
        $query = $msg->showMsg($_GET['id']);
        $user=unserialize($_SESSION['user']);
        ?>


        <div class="TitreD">
            <h2> <? echo $disc->getTitle($_GET['id']); ?> </h2>
            <?  if( $user != null && $user->getState() == 'admin')
            {
                echo '<a href="/ProjetPhp/discussion/delDisc/" style="color: red"> supprimer la discussion</a>';
            }  ?>
        </div>

        <br>

        <div class="row text-center msg">


                <?php
                while($row = $query->fetch())
                {
                    echo '<div class="msg2">' . $row['content'];
                    echo '</div>';
                    if( $user != null && $user->getState() == 'admin')
                        echo '<a href="/ProjetPhp/discussion/delMsg/' . $row['message_id'] . '" style="font-size: 0.7em"> supprimer </a>';
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
                                <? if($disc->getState($_GET['id']) == 'ouverte')
                                {
                                ?>
                                <form action="/ProjetPhp/discussion/traiterMsg/<?
                                echo $_GET['id'] ?>" method="post">
                                    <input type="text" placeholder="votre message" name="msg"/>
                                    <button type="submit" name="action" value="Envoyer"> compléter le message</button>
                                    <?php
                                    if ($msg->getState() == 'ouvert') {
                                        ?>
                                        <button type="submit" name="action" value="Fermer"> compléter et fermer le
                                            message
                                        </button>
                                    <? }
                                    }//
                                    else
                                    {
                                     ?>
                                    <p> la discussion est fermée !</p>

                                    <?
                                    }
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

