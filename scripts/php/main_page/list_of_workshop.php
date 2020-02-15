<?php
    require_once("scripts/php/db_connect.php");
    $connect = new mysqli($host, $db_user, $db_password, $db_name);
    if($_SESSION['access'] == 2)
                {
                    echo "<div class='mess_users'>";
                    if ($result = @$connect->query("SELECT `workshop_bus_gw`.`pocz_post`,`workshop_bus_gw`.`koniec_post`,`buses_gw`.`numer_tab`,`workshop_bus_gw`.`powod` from `buses_gw`
                    INNER JOIN `workshop_bus_gw` on `buses_gw`.`id` = `workshop_bus_gw`.`id_pojazdu`"))
                        {
                            echo "<table>
                            <tr class='main'>
                                <td colspan=4>Autobusy</td>
                            </tr>
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
                    if ($result = @$connect->query("SELECT `workshop_tram_gw`.`pocz_post`,`workshop_tram_gw`.`koniec_post`,`trams_gw`.`numer_tab`,`workshop_tram_gw`.`powod` from `trams_gw`
                    INNER JOIN `workshop_tram_gw` on `trams_gw`.`id` = `workshop_tram_gw`.`id_pojazdu`"))
                        {
                            echo "<table>
                            <tr class='main'>
                                <td colspan=4>Tramwaje</td>
                            </tr>
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
                    echo "</div>";
                }
?>