<?php
    require_once("scripts/php/db_connect.php");
    $connect = new mysqli($host, $db_user, $db_password, $db_name);
    @$connect->query("SET CHARSET utf8");
    $data = date('Y-m-d');
                    if ($result = @$connect->query("SELECT `data`,`nazwa_zm`, `numer_tab`,`godz_roz`,`godz_zak` FROM `plan`
                    left join `timetable` on `plan`.`id_timetable` = `timetable`.`id`
                    left join `vehicles` on `plan`.`numer_pojazdu` = `vehicles`.`id`
                    WHERE `plan`.`miasto` LIKE '$_SESSION[access]' AND `data` = '$data'"))
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
                                        <td>".$row['numer_tab']."</td>
                                    </tr>";
                                }
                            }

                            echo "</table><br/></div>";
                        }
?>