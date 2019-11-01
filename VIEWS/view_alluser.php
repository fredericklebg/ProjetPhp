


<tr>
                        <td> Nom de la discussion </td>
                        <td>Statut</td>
                        <td>Dernier message</td>
                        <td>Auteur</td>
                        <td>Date</td>
                    </tr>

<?php

                        $id = $row['user_id'];
                        ?>
                        <tr>
                            <td>
                                <?php echo $row['pseudo']  ?> </a> </td>

                        </tr>

                        <div class="col-lg-12 text-center">
                <? if($page > 1) { ?>
                <a href="/ProjetPhp/accueil//<?php echo $page-1; ?>"  ><input type="image" alt="previous" src="VIEWS/Media/gauche.jpg" width="30px" height="30px"> </a>
                <?php
                                 }
                if ($page < $nbPages) { ?>
                       <a href="/ProjetPhp/accueil//<? echo $page + 1 ?> "><input type="image" alt="next" src="VIEWS/Media/droite.jpg" width="30px" height="30px"> </a>
                <?php
                }
                ?>
            </div>

        </section>