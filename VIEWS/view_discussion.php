<?php $this->title ='Page Discussion'; ?>


<div class="container">

    <section class="col-lg-12 text-center">

        <?php
        $msg = new message();
        $disc = new discussion();
        $query = $msg->showMsg($_GET['id']);
        ?>
        ?>

        <div class="TitreD">
            <p> <? echo $disc->getTitle($_GET['id']); ?>> </p>
        </div>

        <div class="row blok">

            <p>
                <?php
                while($row = $query->fetch())
                {
                    echo $row['content'];
                    echo ' ';
                }

                ?>
            </p>

        </div>

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
                        <a href="http://tpphp.alwaysdata.net/ProjetPhp"> retourner a la page d'accueil </a>
                        <?php
                    }
                    ?>
            </section>

        </div>

