<?php
require_once 'models_base.php';
require_once 'models_user.php';
?>

<tr>
                        <td> Nom de la discussion </td>
                        <td>Statut</td>
                        <td>Dernier message</td>
                        <td>Auteur</td>
                        <td>Date</td>
                    </tr>


                    <?php
                    $var= new discussion();
                    $var->showDisc();
                    ?>