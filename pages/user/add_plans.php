<main>
    <?php
    require_once("scripts/php/db_connect.php");
    $connect = new mysqli($host, $db_user, $db_password, $db_name);
    $miasto = $_SESSION['access'];
    $i = 0;
    ?>
    <div class='container-fluid'>
        <div class='row'>
            <div class="col-md-12">
                </br></br>
                <H2 class='headline'>Przydział wozów</H2>
            </div>
            <div class="col-md-12">
                <form method="POST" action="scripts/php/plans/add_plans.php">
                    Data: <input type='date' name='date' />
                    <button type="submit">Dodaj!</button>
                    </br></br>
                    <?php
                    $query = "SELECT * FROM `timetable` WHERE `miasto` = '$miasto'";

                    if ($type = @$connect->query($query)) {
                        $timetables = $type->num_rows;
                        if ($timetables > 0) {
                            echo "<table>
                                <tr class='main'>
                                <td>Nazwa zmiany</td>
                                <td>Godzina rozpoczęcia - Godzina zakończenia</td>
                                <td>Rodzaj pojazdu</td>
                                <td>Przydział</td>
                                </tr>";

                            while ($row = $type->fetch_array()) {
                                $i++;
                                echo "<input type=hidden name='timetable[".$i."]' value=".$row['id'].">";
                                echo "<tr>
                                        <td>$row[nazwa_zm]</td>
                                        <td>$row[godz_roz] - $row[godz_zak]</td>
                                        <td>$row[rodzaj] | $row[obsluga]</td>
                                        <td>";
                                include('scripts/php/plans/list_vehicles.php');
                                echo "</tr>";
                            }
                        }
                    }
                    echo "</table></br>";
                    echo "<input type=hidden name=i value=".$i.">";
                    ?>
                </form>
            </div>
        </div>
    </div>
</main>