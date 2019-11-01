<?php

while($row = $query[0]->fetch())
                    {
                        $id = $row['user_id'];
                        ?>
                        <tr>
                            <td>
                                <?php echo $row['pseudo']  ?> </a> </td>

                        </tr>
                        <?php
                    }