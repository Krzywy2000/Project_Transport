<?php
    require_once("scripts/php/db_connect.php");
    $connect = new mysqli($host, $db_user, $db_password, $db_name);
                    if ($result = @$connect->query("SELECT * FROM `timetable` WHERE `miasto` LIKE '$_SESSION[access]' ORDER BY `nazwa_zm`"))
                        {
                            echo "<div class='mess_users'>
                            <table>
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
                                        <td>".$row['nazwa_zm']."</td>
                                        <td>".$row['godz_roz']."</td>
                                        <td>".$row['godz_zak']."</td>
                                    </tr>";
                                }
                            }

                            echo "</table><br/></div>";
                        }
?>