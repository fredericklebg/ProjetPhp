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

        <div class="row">



                <?php
                while($row = $query->fetch())
                {
                    echo $row['content'];
                    echo ' ';
                }

                ?>

        </div>


        <?php

                if ($_SESSION['isLogin']=='ok')
                    {
                        ?>
                        <div class = "row">
                            <div class="offset-4 col-lg-4">
                                 <form action="?page=discussion&action=completeMsg&id=<?echo $_GET['id']?>" method="post">
                                     <input type="text" placeholder="votre message" name="msg"/>
                                     <input type="submit" name="action" value="completeMsg"/>
                                     <input type="submit" name="action" value="Fermer"/>
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

