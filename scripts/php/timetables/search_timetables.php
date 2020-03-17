<?php
    require_once("../db_connect.php");
    $connect = new mysqli($host, $db_user, $db_password, $db_name);
    @$connect->query("SET CHARSET utf8");
    
    $search_timetables = $_GET['search_timetables'];
    
    if($search_timetables == "") {
        if ($result4 = @$connect->query("SELECT * FROM `timetable` WHERE `miasto` LIKE '$miasto' ORDER BY `nazwa_zm`")) {
            echo "<table>
                        <tr class='main'>
                            <td>Nazwa zadania</td>
                            <td>Godzina rozpoczęcia</td>
                            <td>Godzina zakończenia</td>
                            <td>Uwagi</td>
                            <td>Ustawienia</td>
                        </tr>";
            $users = $result4->num_rows;
            if ($users > 0) {
                while ($row = $result4->fetch_array()) {
                    echo "<tr>
                                    <td>" . $row['nazwa_zm'] . "</td>
                                    <td>" . $row['godz_roz'] . "</td>
                                    <td>" . $row['godz_zak'] . "</td>
                                    <td>" . $row['uwagi'] . "</td>
                                    <td><button data-toggle='modal' data-target='#modal-edit-timetable' data-idedit='" . $row['id'] . "'>Edytuj</button><br/>
                                    <button data-toggle='modal' data-target='#modal-timetable-usun' data-idusun='" . $row['id'] . "'>Usuń</button><br/>
                                    <button data-toggle='modal' data-target='#modal-szczegoly2' data-idvehicle2='" . $row['id'] . "'>Szczegóły</button><br />
                                    </td>
                                </tr>";
                }
            }

            echo "</table><br/>";
        }
    }  else {
        if ($result5 = @$connect->query("SELECT * FROM `timetable` WHERE `miasto` LIKE '$miasto' AND `nazwa_zm` LIKE '$search_timetables' ORDER BY `nazwa_zm`"))
        {
            echo "<table>
                        <tr class='main'>
                            <td>Nazwa zadania</td>
                            <td>Godzina rozpoczęcia</td>
                            <td>Godzina zakończenia</td>
                            <td>Uwagi</td>
                            <td>Ustawienia</td>
                        </tr>";
            $users = $result5->num_rows;
            if ($users > 0) {
                while ($row = $result5->fetch_array()) {
                    echo "<tr>
                                    <td>" . $row['nazwa_zm'] . "</td>
                                    <td>" . $row['godz_roz'] . "</td>
                                    <td>" . $row['godz_zak'] . "</td>
                                    <td>" . $row['uwagi'] . "</td>
                                    <td><button data-toggle='modal' data-target='#modal-edit-timetable' data-idedit='" . $row['id'] . "'>Edytuj</button><br/>
                                    <button data-toggle='modal' data-target='#modal-timetable-usun' data-idusun='" . $row['id'] . "'>Usuń</button><br/>
                                    <button data-toggle='modal' data-target='#modal-szczegoly2' data-idvehicle2='" . $row['id'] . "'>Szczegóły</button><br />
                                    </td>
                                </tr>";
                }
            }

            echo "</table><br/>";
        }
    }     
    mysqli_close($connect);
