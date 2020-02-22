<?php
    require_once("../db_connect.php");
    $connect = new mysqli($host, $db_user, $db_password, $db_name);
    
    $search_timetables = $_GET["search_timetables"];
    
    if($search_timetables == "") {
        if ($result = @$connect->query("SELECT * FROM `timetable` WHERE `miasto` LIKE '$miasto' ORDER BY `nazwa_zm`"))
        {
            echo "<table>
            <tr class='main'>
                <td>Nazwa zadania</td>
                <td>Godzina rozpoczęcia</td>
                <td>Godzina zakończenia</td>
                <td>Uwagi</td>
                <td>Ustawienia</td>
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
                        <td>".$row['uwagi']."</td>
                        <td><button data-toggle='modal' data-target='#modal-edit-timetable'>Edytuj</button><br/><button>Usuń</button><br/><button>Szczegóły</button></td>
                    </tr>";
                }
            }

            echo "</table><br/>";
        }
    }  else {
        if ($result = @$connect->query("SELECT * FROM `timetable` WHERE `miasto` LIKE '$miasto' AND `nazwa_zm` LIKE '".$search_timetables."%' ORDER BY `nazwa_zm`"))
        {
            echo "<table>
            <tr class='main'>
                <td>Nazwa zadania</td>
                <td>Godzina rozpoczęcia</td>
                <td>Godzina zakończenia</td>
                <td>Uwagi</td>
                <td>Ustawienia</td>
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
                        <td>".$row['uwagi']."</td>
                        <td><button data-toggle='modal' data-target='#modal-edit-timetable'>Edytuj</button><br/><button>Usuń</button><br/><button>Szczegóły</button></td>
                    </tr>";
                }
            }

            echo "</table><br/>";
        }
    }     
    mysqli_close($connect);
?>