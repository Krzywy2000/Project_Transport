<?php
    require_once("scripts/php/db_connect.php");
    $connect = new mysqli($host, $db_user, $db_password, $db_name);
    if($_SESSION['access'] == 2)
                {
                    if ($result = @$connect->query("SELECT * from `buses_gw` 
                    left join `workshop_bus_gw` on `buses_gw`.`id`=`workshop_bus_gw`.`id_pojazdu`
                    left join `timetables_bus_gw` on `buses_gw`.`id`=`timetables_bus_gw`.`id_przydzial`
                    where `workshop_bus_gw`.`id_pojazdu` is null and `timetables_bus_gw`.`id_przydzial` is null"))
                        {
                            echo "<table>
                            <tr class='main'>
                                <td colspan='3'>Autobusy</td>
                            </tr>
                            <tr class='main'>
                                <td>Numer taborowy</td>
                                <td>Marka</td>
                                <td>Model</td>
                            </tr>";
                            $users = $result->num_rows;
                            if($users>0)
                            {
                                while($row = $result->fetch_array())
                                {
                                    echo "<tr>
                                        <td>".$row['numer_tab']."</td>
                                        <td>".$row['marka']."</td>
                                        <td>".$row['model']."</td>
                                    </tr>";
                                }
                            }

                            echo "</table><br/>";
                        }
                        if ($result = @$connect->query("SELECT * from `trams_gw` 
                        left join `workshop_tram_gw` on `trams_gw`.`id`=`workshop_tram_gw`.`id_pojazdu`
                        left join `timetables_tram_gw` on `trams_gw`.`id`=`timetables_tram_gw`.`id_przydzial`
                        where `workshop_tram_gw`.`id_pojazdu` is null and `timetables_tram_gw`.`id_przydzial` is null"))
                        {
                            echo "<table>
                            <tr class='main'>
                                <td colspan='3'>Tramwaje</td>
                            </tr>
                            <tr class='main'>
                                <td>Numer taborowy</td>
                                <td>Marka</td>
                                <td>Model</td>
                            </tr>";
                            $users = $result->num_rows;
                            if($users>0)
                            {
                                while($row = $result->fetch_array())
                                {
                                    echo "<tr>
                                        <td>".$row['numer_tab']."</td>
                                        <td>".$row['marka']."</td>
                                        <td>".$row['model']."</td>
                                    </tr>";
                                }
                            }

                            echo "</table><br/>";
                        }
                }
?>