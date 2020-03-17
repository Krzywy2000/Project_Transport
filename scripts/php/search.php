<?php
    session_start();
    require_once("db_connect.php");
    $connect = new mysqli($host, $db_user, $db_password, $db_name);
    @$connect->query("SET CHARSET utf8");
    
    $search = $_GET["search"];
    $miasto = $_SESSION['access'];
    
    if($search == "") {
            if ($result = @$connect->query("SELECT * FROM `vehicles` where typ_pojazdu='BUS' and miasto='$miasto' ORDER BY `numer_tab`"))
                {
                    echo "<table>
                    <tr class='main'>
                        <td colspan='13'><H2>Autobusy</H2></td>
                    </tr>
                    <tr class='main'>
                                <td>Numer Taborowy</td>
								                <td>typ taboru</td>
                                <td>Marka</td>
                                <td>Model</td>
                                <td>Rocznik</td>
                                <td>Rok wprowadzenia</td>
                                <td>Układ drzwi</td>
                                <td>Klimatyzacja</td>
                                <td>Biletomat/Kasa</td>
                                <td>Niska podłoga</td>
                                <td>Uwagi</td>
                                <td>Czy jest na warsztacie?</td>
                                <td>Ustawienia</td>
                            </tr>";
                    $users = $result->num_rows;
                    if($users>0)
                    {
                        while($row = $result->fetch_array())
                        {
                            echo "<tr style='border-bottom:1pt solid black'>
                            <td>" . $row['numer_tab'] . "</td>
                            <td>" . $row['typ_taboru'] . "</td>
                            <td>" . $row['marka'] . "</td>
                            <td>" . $row['model'] . "</td>
                            <td>" . $row['rocznik'] . "</td>
                            <td>" . $row['rok_wprowadzenia'] . "</td>
                            <td>" . $row['uklad_drzwi'] . "</td>
                            <td>" . $row['klimatyzacja'] . "</td>
                            <td>" . $row['biletomat'] . "</td>
                            <td>".$row['niska_podloga']."</td>
                            <td>" . $row['uwagi'] . "</td>
                            <td>" . $row['id_workshop'] . "</td>
                            <td><button data-toggle='modal' data-target='#modal-edycja' data-edycja-vehicle='" . $row['id'] . "'>Edytuj</button><br />
                            <button data-toggle='modal' data-target='#modal-szczegoly' data-idvehiclex='" . $row['id'] . "'>szczegóły</button><br />
                            <button data-toggle='modal' data-target='#modal-workshop' data-idmiasto='" . $row['miasto'] . "' data-idvehicle='" . $row['id'] . "'>Dodaj do warsztatu</button><br/>
                            <button data-toggle='modal' data-target='#modal-delete-vehicles' data-delete-vehicle='" . $row['id'] . "'>Usuń pojazd</button>
                            </td>
                          </tr>";
                            
                        }
                    }

                    echo "</table><br/>";               
                }
            if($result2 = @$connect->query("SELECT * FROM `vehicles` where typ_pojazdu='TRAM' and miasto='$miasto' ORDER BY `numer_tab`"))
            {
                echo "<table>
                <tr class='main'>
                    <td colspan='13'><H2>Tramwaje</H2></td>
                </tr>
                <tr class='main'>
                                <td>Numer Taborowy</td>
								                <td>typ taboru</td>
                                <td>Marka</td>
                                <td>Model</td>
                                <td>Rocznik</td>
                                <td>Rok wprowadzenia</td>
                                <td>Układ drzwi</td>
                                <td>Klimatyzacja</td>
                                <td>Biletomat/Kasa</td>
                                <td>Niska podłoga</td>
                                <td>Uwagi</td>
                                <td>Czy jest na warsztacie?</td>
                                <td>Ustawienia</td>
                            </tr>";
                $users = $result2->num_rows;
                if($users>0)
                {
                    while($row = $result2->fetch_array())
                    {
                        echo "<tr style='border-bottom:1pt solid black'>
                        <td>" . $row['numer_tab'] . "</td>
                        <td>" . $row['typ_taboru'] . "</td>
                        <td>" . $row['marka'] . "</td>
                        <td>" . $row['model'] . "</td>
                        <td>" . $row['rocznik'] . "</td>
                        <td>" . $row['rok_wprowadzenia'] . "</td>
                        <td>" . $row['uklad_drzwi'] . "</td>
                        <td>" . $row['klimatyzacja'] . "</td>
                        <td>" . $row['biletomat'] . "</td>
                        <td>".$row['niska_podloga']."</td>
                        <td>" . $row['uwagi'] . "</td>
                        <td>" . $row['id_workshop'] . "</td>
                        <td><button data-toggle='modal' data-target='#modal-edycja' data-edycja-vehicle='" . $row['id'] . "'>Edytuj</button><br />
                        <button data-toggle='modal' data-target='#modal-szczegoly' data-idvehiclex='" . $row['id'] . "'>szczegóły</button><br />
                        <button data-toggle='modal' data-target='#modal-workshop' data-idmiasto='" . $row['miasto'] . "' data-idvehicle='" . $row['id'] . "'>Dodaj do warsztatu</button><br/>
                        <button data-toggle='modal' data-target='#modal-delete-vehicles' data-delete-vehicle='" . $row['id'] . "'>Usuń pojazd</button>
                        </td>
                      </tr>";
                        
                    }
                }

                echo "</table><br/>";
            }  
    } else {
        if ($result3 = @$connect->query("SELECT * FROM `vehicles` where typ_pojazdu='BUS' and miasto='$miasto' and `numer_tab` LIKE '".$search."%' ORDER BY `numer_tab`"))
        {
            echo "<table>
            <tr class='main'>
                <td colspan='13'><H2>Autobusy</H2></td>
            </tr>
            <tr class='main'>
                                <td>Numer Taborowy</td>
								                <td>typ taboru</td>
                                <td>Marka</td>
                                <td>Model</td>
                                <td>Rocznik</td>
                                <td>Rok wprowadzenia</td>
                                <td>Układ drzwi</td>
                                <td>Klimatyzacja</td>
                                <td>Biletomat/Kasa</td>
                                <td>Niska podłoga</td>
                                <td>Uwagi</td>
                                <td>Czy jest na warsztacie?</td>
                                <td>Ustawienia</td>
                            </tr>";
            $users = $result3->num_rows;
            if($users>0)
            {
                while($row = $result3->fetch_array())
                {
                    echo "<tr style='border-bottom:1pt solid black'>
                    <td>" . $row['numer_tab'] . "</td>
                    <td>" . $row['typ_taboru'] . "</td>
                    <td>" . $row['marka'] . "</td>
                    <td>" . $row['model'] . "</td>
                    <td>" . $row['rocznik'] . "</td>
                    <td>" . $row['rok_wprowadzenia'] . "</td>
                    <td>" . $row['uklad_drzwi'] . "</td>
                    <td>" . $row['klimatyzacja'] . "</td>
                    <td>" . $row['biletomat'] . "</td>
                    <td>".$row['niska_podloga']."</td>
                    <td>" . $row['uwagi'] . "</td>
                    <td>" . $row['id_workshop'] . "</td>
                    <td><button data-toggle='modal' data-target='#modal-edycja' data-edycja-vehicle='" . $row['id'] . "'>Edytuj</button><br />
                    <button data-toggle='modal' data-target='#modal-szczegoly' data-idvehiclex='" . $row['id'] . "'>szczegóły</button><br />
                    <button data-toggle='modal' data-target='#modal-workshop' data-idmiasto='" . $row['miasto'] . "' data-idvehicle='" . $row['id'] . "'>Dodaj do warsztatu</button><br/>
                    <button data-toggle='modal' data-target='#modal-delete-vehicles' data-delete-vehicle='" . $row['id'] . "'>Usuń pojazd</button>
                    </td>
                  </tr>";
                    
                }
            }

            echo "</table><br/>";
        }
    if($result4 = @$connect->query("SELECT * FROM `vehicles` where typ_pojazdu='TRAM' and miasto='$miasto' and `numer_tab` LIKE '".$search."%' ORDER BY `numer_tab`"))
    {
        echo "<table>
        <tr class='main'>
            <td colspan='13'><H2>Tramwaje</H2></td>
        </tr>
        <tr class='main'>
                                <td>Numer Taborowy</td>
								                <td>typ taboru</td>
                                <td>Marka</td>
                                <td>Model</td>
                                <td>Rocznik</td>
                                <td>Rok wprowadzenia</td>
                                <td>Układ drzwi</td>
                                <td>Klimatyzacja</td>
                                <td>Biletomat/Kasa</td>
                                <td>Niska podłoga</td>
                                <td>Uwagi</td>
                                <td>Czy jest na warsztacie?</td>
                                <td>Ustawienia</td>
                            </tr>";
        $users = $result4->num_rows;
        if($users>0)
        {
            while($row = $result4->fetch_array())
            {
                echo "<tr style='border-bottom:1pt solid black'>
                <td>" . $row['numer_tab'] . "</td>
                <td>" . $row['typ_taboru'] . "</td>
                <td>" . $row['marka'] . "</td>
                <td>" . $row['model'] . "</td>
                <td>" . $row['rocznik'] . "</td>
                <td>" . $row['rok_wprowadzenia'] . "</td>
                <td>" . $row['uklad_drzwi'] . "</td>
                <td>" . $row['klimatyzacja'] . "</td>
                <td>" . $row['biletomat'] . "</td>
                <td>".$row['niska_podloga']."</td>
                <td>" . $row['uwagi'] . "</td>
                <td>" . $row['id_workshop'] . "</td>
                <td><button data-toggle='modal' data-target='#modal-edycja' data-edycja-vehicle='" . $row['id'] . "'>Edytuj</button><br />
                <button data-toggle='modal' data-target='#modal-szczegoly' data-idvehiclex='" . $row['id'] . "'>szczegóły</button><br />
                <button data-toggle='modal' data-target='#modal-workshop' data-idmiasto='" . $row['miasto'] . "' data-idvehicle='" . $row['id'] . "'>Dodaj do warsztatu</button><br/>
                <button data-toggle='modal' data-target='#modal-delete-vehicles' data-delete-vehicle='" . $row['id'] . "'>Usuń pojazd</button>
                </td>
              </tr>";
                
            }
        }

        echo "</table><br/>";
    }  
}     
    mysqli_close($connect);
?>