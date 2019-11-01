<?php
require_once '../MODELS/models_base.php';
require_once '../MODELS/models_user.php';
?>

<tr>
                        <td> Nom de la discussion </td>
                        <td>Statut</td>
                        <td>Dernier message</td>
                        <td>Auteur</td>
                        <td>Date</td>
                    </tr>


                    <?php
                    $var -> new user();
                    $var->showUser();
                    ?>