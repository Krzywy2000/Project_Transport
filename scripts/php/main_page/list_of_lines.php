<?php
    require_once("scripts/php/db_connect.php");
    $connect = new mysqli($host, $db_user, $db_password, $db_name);
    if($_SESSION['access'] == 2)
                {
                    if ($result = @$connect->query("SELECT `timetables_bus_gw`.`nr_zadania`,`timetables_bus_gw`.`godz_roz`,`timetables_bus_gw`.`godz_kon`,`buses_gw`.`numer_tab`,`timetables_bus_gw`.`uwagi` from `timetables_bus_gw`
                    inner join `buses_gw` on `timetables_bus_gw`.`id_przydzial`=`buses_gw`.`id`"))
                        {
                            echo "<table>
                            <tr class='main'>
                                <td colspan=4>Autobusy</td>
                            </tr>
                            <tr class='main'>
                                <td>Numer brygady</td>
                                <td>Godzina rozpoczęcia</td>
                                <td>Godzina zakończenia</td>
                                <td>Pojazd</td>
                            </tr>";
                            $users = $result->num_rows;
                            if($users>0)
                            {
                                while($row = $result->fetch_array())
                                {
                                    echo "<tr>
                                        <td>".$row['nr_zadania']."</td>
                                        <td>".$row['godz_roz']."</td>
                                        <td>".$row['godz_kon']."</td>
                                        <td>".$row['numer_tab']."</td>
                                    </tr>";
                                }
                            }

                            echo "</table><br/>";
                        }
                        if ($result = @$connect->query("SELECT `timetables_tram_gw`.`nr_zadania`,`timetables_tram_gw`.`godz_roz`,`timetables_tram_gw`.`godz_kon`,`trams_gw`.`numer_tab`,`timetables_tram_gw`.`uwagi` from `timetables_tram_gw`
                        inner join `trams_gw` on `timetables_tram_gw`.`id_przydzial`=`trams_gw`.`id`"))
                            {
                                echo "<table>
                                <tr class='main'>
                                    <td colspan=4>Tramwaje</td>
                                </tr>
                                <tr class='main'>
                                    <td>Numer brygady</td>
                                    <td>Godzina rozpoczęcia</td>
                                    <td>Godzina zakończenia</td>
                                    <td>Pojazd</td>
                                </tr>";
                                $users = $result->num_rows;
                                if($users>0)
                                {
                                    while($row = $result->fetch_array())
                                    {
                                        echo "<tr>
                                            <td>".$row['nr_zadania']."</td>
                                            <td>".$row['godz_roz']."</td>
                                            <td>".$row['godz_kon']."</td>
                                            <td>".$row['numer_tab']."</td>
                                        </tr>";
                                    }
                                }
    
                                echo "</table><br/>";
                            }                        
                }
?>