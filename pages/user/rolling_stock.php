<main>
    <?php 
        require_once("scripts/php/db_connect.php");
        $connect = new mysqli($host, $db_user, $db_password, $db_name);
    ?>
    <div class="container-fluid"><br/><br/>
        <H2 class="headline">Lista taboru</H2>
        <div class="messages__bar__left">
            <form id="form">
                <input type="text" id="search" name="search" placeholder="Znajdź pojazd po nr tab."/>
            </form>
        </div>
        <div class="messages__bar">
            <button class="submit" onClick="new_stock.php">Dodaj pojazd/pojazdy</button>
        </div>
        <div id="result" class="result">
            <?php
                if($_SESSION['access'] == 2)
                {
                    if ($result = @$connect->query("SELECT * FROM `buses_GW` ORDER BY `Numer_tab`"))
                        {
                            echo "<table>
                            <tr class='main'>
                                <td colspan='10'><H2>Autobusy</H2></td>
                            </tr>
                            <tr class='main'>
                                <td>Numer Taborowy</td>
                                <td>Marka</td>
                                <td>Model</td>
                                <td>Rocznik</td>
                                <td>Rok wprowadzenia</td>
                                <td>Układ drzwi</td>
                                <td>Klimatyzacja</td>
                                <td>Biletomat/Kasa</td>
                                <td>Uwagi</td>
                                <td>Ustawienia</td>
                            </tr>";
                            $users = $result->num_rows;
                            if($users>0)
                            {
                                while($row = $result->fetch_array())
                                {
                                    echo "<tr>
                                        <td>".$row['numer_tab']."</td>
                                        <td>".$row['marka']."</td>
                                        <td>".$row['model']."</td>
                                        <td>".$row['rocznik']."</td>
                                        <td>".$row['rok_wprowadzenia']."</td>
                                        <td>".$row['uklad_drzwi']."</td>
                                        <td>".$row['klimatyzacja']."</td>
                                        <td>".$row['biletomat']."</td>
                                        <td>".$row['uwagi']."</td>
                                        <td><button>Edytuj</button><br/><br/><button>Dodaj do warsztatu</button></td>
                                    </tr>";
                                }
                            }

                            echo "</table><br/>";
                        }
                    if($result2 = @$connect->query("SELECT *FROM `trams_GW` ORDER BY `numer_tab`"))
                    {
                        echo "<table>
                            <tr class='main'>
                                <td colspan='10'><H2>Tramwaje</H2></td>
                            </tr>
                            <tr class='main'>
                                <td>Numer Taborowy</td>
                                <td>Marka</td>
                                <td>Model</td>
                                <td>Rocznik</td>
                                <td>Rok wprowadzenia</td>
                                <td>Układ drzwi</td>
                                <td>Klimatyzacja</td>
                                <td>Biletomat/Kasa</td>
                                <td>Uwagi</td>
                                <td>Ustawienia</td>
                            </tr>";
                        while($row2 = $result2->fetch_array())
                        {
                            echo "<tr>
                                <td>".$row2['numer_tab']."</td>
                                <td>".$row2['marka']."</td>
                                <td>".$row2['model']."</td>
                                <td>".$row2['rok_produkcji']."</td>
                                <td>".$row2['rok_wprowadzenia']."</td>
                                <td>".$row2['uklad_drzwi']."</td>
                                <td>".$row2['klimatyzacja']."</td>
                                <td>".$row2['biletomat']."</td>
                                <td>".$row2['uwagi']."</td>
                                <td><button>Edytuj</button><br/><br/><button>Dodaj do warsztatu</button></td>
                            </tr>";
                        }
                        echo "</table>";
                    }
                }
                ?>    
        </div>        
    <br/><br/></div>
    <script src="scripts/js/search.js"></script>
    <script src="scripts/js/pop_up.js"></script>
</main>