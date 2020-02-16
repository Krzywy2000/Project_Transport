<main>
    <?php 
        require_once("scripts/php/db_connect.php");
        $connect = new mysqli($host, $db_user, $db_password, $db_name);
    ?>
    <div class="container-fluid"><br/><br/>
        <H2 class="headline">Lista brygad</H2>
        <div class="messages__bar__left">
            <form id="form">
                <input type="text" id="search" name="search" placeholder="Znajdź pojazd po nr tab."/>
            </form>
        </div>
        <div class="messages__bar">
            <button class="button" onClick="new_stock.php">Dodaj zadanie</button>
        </div>
        <div id="result" class="result">
            <?php
                if($_SESSION['access'] == 2)
                {
                    if ($result = @$connect->query("SELECT * FROM `timetables_gw` ORDER BY `nr_zadania`"))
                        {
                            echo "<table>
                            <tr class='main'>
                                <td>Numer brygady</td>
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
                                        <td>".$row['nr_zadania']."</td>
                                        <td>".$row['godz_roz']."</td>
                                        <td>".$row['godz_kon']."</td>
                                        <td>".$row['uwagi']."</td>
                                        <td><button>Edytuj</button><br/><button>Usuń</button><br/><button>Szczegóły</button></td>
                                    </tr>";
                                }
                            }

                            echo "</table><br/>";
                        }
                }
                ?>    
        </div>        
    <br/><br/></div>
	    <script src="scripts/js/time-js.js"></script>
    <script src="scripts/js/search.js"></script>
    <script src="scripts/js/pop_up.js"></script>
</main>