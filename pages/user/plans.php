<main>
    <?php 
        require_once("scripts/php/db_connect.php");
        $connect = new mysqli($host, $db_user, $db_password, $db_name);
		        $miasto = $_SESSION['access'];
    ?>

    <div class='container-fluid'>
        <div class='row'>
            <div class="col-md-12">
                <H2 class='headline'>Przydział wozów</H2>
            </div>
            <div class='col-md-12'>
                <a>Data: </a><input type='date'/>
            </div>
            <div class='col-md-12'>
                <?php
                    $query_plans = "SELECT * FROM plan WHERE `miasto` LIKE '$_SESSION[access]'";
                    $query_timetable="SELECT * FROM `timetable` WHERE `miasto` LIKE '$_SESSION[access]'";

                    if($result = @$connect->query($query_plans))
                    {
                        $plans = $result->num_rows;
                        if($plans>0)
                        {
                            while($row = $result->fetch_array())
                            {
                                echo $row['id'];
                                echo $row['data'];
                                echo $row['id_timetable'];
                                echo $row['numer_pojazdu'] = $vehicle;
                            }
                        }
                    }

                    echo "<table>
                        <tr class='main'>
                            <td>Nazwa zmiany</td>
                            <td>Godzina rozpoczęcia - Godzina zakończenia</td>
                            <td>Rodzaj pojazdu</td>
                            <td>Przydział</td>
                        </tr>";
                    if($result = @$connect->query($query_timetable))
                    {
                        $users = $result->num_rows;
                        if($users>0)
                        {
                            while($row = $result->fetch_array())
                            {
                                echo "<tr>
                                    <td>$row[nazwa_zm]</td>
                                    <td>$row[godz_roz] - $row[godz_zak]</td>
                                    <td> </td>
                                    <td>";
                                    echo $vehicle;
                                    include('scripts/php/plans/list_vehicles.php');
                                    echo "</td>
                                </tr>";
                            }
                        }
                    }

                    echo "</table>";
                ?>
            </div>
        </div>
    </div>
</main>