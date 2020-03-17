<main>
    <?php
    require_once("scripts/php/db_connect.php");
    $connect = new mysqli($host, $db_user, $db_password, $db_name);
    $miasto = $_SESSION['access'];
    ?>

    <div class='container-fluid'>
        <div class='row'>
            <div class="col-md-12">
                </br></br>
                <H2 class='headline'>Przydział wozów</H2>
                <div class="messages__bar">
                    <button><a style="text-decoration:none; color: black" href="index_user.php?page=add_plans">Dodaj przydziały</a></button>
                </div>
            </div>
            <div class='col-md-12'>
                    <?php
                    $data = date('Y-m-d');
                    $query_plans = "SELECT `data`,`nazwa_zm`, `numer_tab` FROM `plan`
                        left join `timetable` on `plan`.`id_timetable` = `timetable`.`id`
                        left join `vehicles` on `plan`.`numer_pojazdu` = `vehicles`.`id`
                        WHERE `plan`.`miasto` LIKE '$_SESSION[access]' AND `data` >= '$data'";

                    echo "</br><table>
                                    <tr class='main'>
                                        <td>Data</td>
                                        <td>Numer przydziału</td>
                                        <td>Numer pojazdu</td>
                                    </tr>";
                    if ($result = @$connect->query($query_plans)) {
                        $plans = $result->num_rows;
                        if ($plans > 0) {
                            while ($row = $result->fetch_array()) {
                                echo "<tr>";
                                echo "<td>" . $row['data'] . "</td>";
                                echo "<td>" . $row['nazwa_zm'] . "</td>";
                                echo "<td>" . $row['numer_tab'] . "</td>";
                                echo "</tr>";
                            }
                        }
                    }
                    echo "</table></br>";
                    ?>
            </div>
        </div>
    </div>
</main>