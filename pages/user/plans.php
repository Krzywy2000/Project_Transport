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
            <div class='col-md-6'>
                <form >
                    <?php
                        $data = date('Y-m-d');
                        $query_plans = "SELECT `data`,`nazwa_zm`, `numer_pojazdu` FROM `plan`
                        left join `timetable` on `plan`.`id_timetable` = `timetable`.`id`
                        WHERE `plan`.`miasto` LIKE '$_SESSION[access]' AND `data` > '$data'";
                        $query_timetable="SELECT * FROM `timetable` WHERE `miasto` = '$_SESSION[access]'";

                        echo "<table>
                                    <tr class='main'>
                                        <td>Data</td>
                                        <td>Numer przydziału</td>
                                        <td>Numer pojazdu</td>
                                    </tr>";
                        if($result = @$connect->query($query_plans))
                        {
                            $plans = $result->num_rows;
                            if($plans>0)
                            {
                                while($row = $result->fetch_array())
                                {
                                    echo "<tr>";
                                    echo "<td>".$row['data']."</td>";
                                    echo "<td>".$row['nazwa_zm']."</td>";
                                    echo "<td>".$row['numer_pojazdu']."</td>";
                                    echo "</tr>";
                                
                            }
                        }
                    }
                        echo "</table>";
                    ?>
                    </form>
                </div>
                <div class='col-md-6'>
                    <?php
                        
                        if($result1 = @$connect->query($query_timetable))
                        {
                            $users = $result1->num_rows;
                            if($users>0)
                            {
                                echo "<table>
                                <tr class='main'>
                                <td>Nazwa zmiany</td>
                                <td>Godzina rozpoczęcia - Godzina zakończenia</td>
                                <td>Rodzaj pojazdu</td>
                                <td>Przydział</td>
                                </tr>";
                                while($row = $result1->fetch_array())
                                {
                                    echo "<tr>
                                        <td>$row[nazwa_zm]</td>
                                        <td>$row[godz_roz] - $row[godz_zak]</td>
                                        <td> </td>
                                        <td>";
                                        include('scripts/php/plans/list_vehicles.php');
                                        echo "<button type='submit'>Dodaj</button></td>
                                    </tr>";
                                }
                            }
                        }

                        echo "</table>";
                    ?>
                </form>
            </div>
        </div>
    </div>
</main>