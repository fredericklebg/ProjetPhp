<?php $this->title ='Page Discussion'; ?>


<div class="container">

    <section class="col-lg-12 text-center">

        <?php
        $msg = new message();
        $disc = new discussion();
        $query = $msg->showMsg($_GET['id']);
        ?>


        <div class="TitreD">
            <h2> <? echo $disc->getTitle($_GET['id']); ?> </h2>
        </div>



            <p>
                <?php
                while($row = $query->fetch())
                {
                    echo $row['content'];
                    echo ' ';
                }

                ?>
            </p>



        <?php

                if ($_SESSION['isLogin']=='ok')
                    {
                        ?><div class="doubleB">
                        <input class="B" type="button" value="Nouveau Message">
                        <input class="BB" type="button" value="Nouveau Message & Clore">
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

