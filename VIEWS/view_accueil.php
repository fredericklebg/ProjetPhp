


<?php $this->title ='FreeNote'; ?>

<?php

$disc= new discussion();
?>


<div class="container">

        <section class="col-lg-12">
            <div class="row bbloc">
                <p class="longtext"> Bienvenue sur FreeNote, le nouveau réseau social. Comme ses concurrents,
                    FreeNote est basé sur la communication entre utilisateurs autour de discussions.
                    Mais ce dernier se démarque des autres car les discussions sont limitées, chaque utilisateur peut ajouter au maximum
                    deux mots ce qui permet la création de discussions assez surprenante. Le divertissement est donc la seconde valeur du site,
                    l'amusement est donc fortement possible. En revanche, en cas d'un propos injurieux, des mesures de grandes ampleurs seront prises par nous,
                    les administrateurs. La politesse et la courtoisie sont donc essentielles. On vous souhaite de vous amuser ! </p>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 text-center">

                    <a class="stylebouton newbouton" href="/ProjetPhp/discussion/newDiscussion"> Nouvelle discussion </a>

                </div>

                <div class="offset-lg-4 col-lg-4 col-md-4 col-sm-12 text-center">
                        <a class="refreshbouton stylebouton" href=""> Actualiser </a>
                </div>
            </div>
<hr>

                <table class="col-lg-12">
                    <tr>
                        <td> Nom de la discussion </td>
                        <td>Statut</td>
                        <td>Dernier message</td>
                        <td>Auteur</td>
                        <td>Date</td>
                    </tr>

                    <?php

                    $limit=$disc->getPagination();
                    $page = (!empty($_GET['id']) ? $_GET['id'] : 1);
                    $debut = ($page - 1 ) * $limit;


                    $query=$disc->showDisc($debut,$limit);
                    $nbPages = ceil($query[1] / $limit);
                    while($row = $query[0]->fetch())
                    {
                        $id = $row['disc_id'];
                        ?>
                        <tr>
                            <td> <a href="/ProjetPhp/discussion//<?php echo $id ?>">
                                <?php echo $row['title']  ?> </a> </td>
                            <td><?php echo $row['state'] ?></td>
                            <td><?php echo $row['content']  ?></td>
                            <td><?php echo $row['pseudo'] ?></td>
                            <td><?php echo $row['message_date']  ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            <div class="col-lg-12 text-center">
                <? if($page > 1) { ?>
                <a href="/ProjetPhp/accueil//<?php echo $page-1; ?>"  ><input type="image" alt="previous" src="VIEWS/Media/gauche.jpg"  height="30"> </a>
                <?php
                                 }
                if ($page < $nbPages) { ?>
                       <a href="/ProjetPhp/accueil//<? echo $page + 1 ?> "><input type="image" alt="next" src="VIEWS/Media/droite.jpg"  height="30"> </a>
                <?php
                }
                ?>
            </div>

        </section>



</div >



