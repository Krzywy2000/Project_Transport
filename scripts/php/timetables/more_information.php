<?php
    require_once("scripts/php/db_connect.php");
    $connect = new mysqli($host, $db_user, $db_password, $db_name);
    @mysqli_query("SET CHARSET utf8");

    $id_timetable = $_POST['idmore'];
    echo $id_timetable;
    if ($check_id = @$connect->query("SELECT `id_timetable`,`relacja`,`numer_linii`,`timetable_course`.`godz_roz`,`timetable_course`.`godz_zak` FROM `timetable_course`
    left join `timetable` on `timetable_course`.`id_timetable` = `timetable`.`id`
    left join `destination` on `timetable_course`.`id_destination` = `destination`.`id` WHERE `id_timetable`=$id_timetable"))
            {
                $check = $check_id->num_rows;
                if($check>0)
                {
                    echo "<table>
                        <tr>
                            <td>Numer linii</td>
                            <td>Kurs</td>
                            <td>Godzina wyjazdu</td>
                            <td>Godzina przyjazdu</td>
                        </tr>";
                    while($row = $check_id->fetch_array())
                    {   
                        echo "<tr>";
                        echo "<td>".$row['numer_linii']."</td>";
                        echo "<td>".$row['relacja']."</td>";
                        echo "<td>".$row['godz_roz']."</td>";
                        echo "<td>".$row['godz_zak']."</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }
            }
?>