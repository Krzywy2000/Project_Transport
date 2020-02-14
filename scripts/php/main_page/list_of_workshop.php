<?php
    require_once("scripts/php/db_connect.php");
    $connect = new mysqli($host, $db_user, $db_password, $db_name);
    if($_SESSION['access'] == 2)
                {
                    if ($result = @$connect->query("SELECT `workshop_gw`.`pocz_post`,`workshop_gw`.`koniec_post`,`buses_gw`.`numer_tab`,`workshop_gw`.`powod` from `stock_gw`
                    INNER JOIN `buses_gw` on `stock_gw`.`id_bus`=`buses_gw`.`id`
                    INNER JOIN `trams_gw` on `stock_gw`.`id_bus`=`trams_gw`.`id`
                    INNER JOIN `workshop_gw` on `stock_gw`.`id` = `workshop_gw`.`id_pojazdu`"))
                        {
                            echo "<table>
                            <tr class='main'>
                                <td>Od</td>
                                <td>Do</td>
                                <td>Nr taborowy</td>
                                <td>Powód</td>
                            </tr>";
                            $users = $result->num_rows;
                            if($users>0)
                            {
                                while($row = $result->fetch_array())
                                {
                                    echo "<tr>
                                        <td>".$row['pocz_post']."</td>
                                        <td>".$row['koniec_post']."</td>
                                        <td>".$row['numer_tab']."</td>
                                        <td>".$row['powod']."</td>
                                    </tr>";
                                }
                            }

                            echo "</table><br/>";
                        }
                }
?>