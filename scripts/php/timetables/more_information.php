<?php
    require_once("scripts/php/db_connect.php");
    $connect = new mysqli($host, $db_user, $db_password, $db_name);
    @mysqli_query("SET CHARSET utf8");

 //$id_edycja_vehicles2=$_POST['id_edycja_vehicles2'];
 $miasto = $_SESSION['access'];

    //$id_timetable = $_POST['idmore'];
    //echo $id_timetable;
    if ($check_id = @$connect->query("SELECT `nazwa_zm`,`id_timetable`,`relacja`,`numer_linii`,`timetable_course`.`godz_roz`,`timetable_course`.`godz_zak` FROM `timetable_course`
    left join `timetable` on `timetable_course`.`id_timetable` = `timetable`.`id`
    left join `destination` on `timetable_course`.`id_destination` = `destination`.`id` 
    WHERE `timetable`.`miasto` LIKE '$miasto' AND `timetable`.`id` /*LIKE '$id_edycja_vehicles2'*/"))
    {
                $check = $check_id->num_rows;
                if($check>0)
                {
                    echo "<table>
                        <tr>
                            <td>Nazwa zmiany</td>
                            <td>Numer linii</td>
                            <td>Kurs</td>
                            <td>Godzina wyjazdu</td>
                            <td>Godzina przyjazdu</td>
                        </tr>";
                    while($row = $check_id->fetch_array())
                    {   
                        echo "<tr>";
                        echo "<td>".$row['nazwa_zm']."</td>";
                        echo "<td>".$row['numer_linii']."</td>";
                        echo "<td>".$row['relacja']."</td>";
                        echo "<td>".$row['godz_roz']."</td>";
            echo "<td>" . $row['godz_zak'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    }
