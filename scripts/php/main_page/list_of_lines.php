<?php
    require_once("scripts/php/db_connect.php");
    $connect = new mysqli($host, $db_user, $db_password, $db_name);
    if($_SESSION['access'] == 2)
                {
                    if ($result = @$connect->query("SELECT * FROM `timetables_gw` ORDER BY `nr_zadania`"))
                        {
                            echo "<table>
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
                                        <td>".$row['id_przydzial']."</td>
                                    </tr>";
                                }
                            }

                            echo "</table><br/>";
                        }
                }
?>