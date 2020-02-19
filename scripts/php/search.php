<?php
    require_once("db_connect.php");
    $connect = new mysqli($host, $db_user, $db_password, $db_name);
    
    $search = $_GET["search"];
    
    if($search == "") {
            if ($result = @$connect->query("SELECT * FROM `vehicles` where typ_pojazdu='BUS' and miasto='Gorzow Wiktorowski' ORDER BY `numer_tab`"))
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
                          echo "<tr style='border-bottom:1pt solid black'>
                            <td>".$row['numer_tab']."</td>
                            <td>".$row['marka']."</td>
                            <td>".$row['model']."</td>
                            <td>".$row['rocznik']."</td>
                            <td>".$row['rok_wprowadzenia']."</td>
                            <td>".$row['uklad_drzwi']."</td>
                            <td>".$row['klimatyzacja']."</td>
                            <td>".$row['biletomat']."</td>
                            <td>".$row['uwagi']."</td>
                            <td><button data-toggle='modal' data-target='#modal-edycja' data-idvehicle='".$row['id']."'>Edytuj</button><br />
                            <button data-toggle='modal' data-target='#modal-szczegoly' data-idvehicle='".$row['id']."'>szczegóły</button><br />
                            <button data-toggle='modal' data-target='#modal-workshop' data-idvehicle='".$row['id']."'>Dodaj do warsztatu</button><br/>
                            <button data-toggle='modal' data-target='#modal-workshop' data-idvehicle='".$row['id']."'>Usuń pojazd</button>
                            </td>
                          </tr>";
                            
                        }
                    }

                    echo "</table><br/>";               
                }
            if($result2 = @$connect->query("SELECT * FROM `vehicles` where typ_pojazdu='TRAM' and miasto='Gorzow Wiktorowski' ORDER BY `numer_tab`"))
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
                      echo "<tr style='border-bottom:1pt solid black'>
                        <td>".$row['numer_tab']."</td>
                        <td>".$row['marka']."</td>
                        <td>".$row['model']."</td>
                        <td>".$row['rocznik']."</td>
                        <td>".$row['rok_wprowadzenia']."</td>
                        <td>".$row['uklad_drzwi']."</td>
                        <td>".$row['klimatyzacja']."</td>
                        <td>".$row['biletomat']."</td>
                        <td>".$row['uwagi']."</td>
                        <td><button data-toggle='modal' data-target='#modal-edycja' data-idvehicle='".$row['id']."'>Edytuj</button><br />
                        <button data-toggle='modal' data-target='#modal-szczegoly' data-idvehicle='".$row['id']."'>szczegóły</button><br />
                        <button data-toggle='modal' data-target='#modal-workshop' data-idvehicle='".$row['id']."'>Dodaj do warsztatu</button><br/>
                        <button data-toggle='modal' data-target='#modal-workshop' data-idvehicle='".$row['id']."'>Usuń pojazd</button>
                        </td>
                      </tr>";
                        
                    }
                }

                echo "</table><br/>";
            }  
    } else {
        if ($result = @$connect->query("SELECT * FROM `vehicles` where typ_pojazdu='BUS' and miasto='Gorzow Wiktorowski' and `numer_tab` LIKE '".$search."%' ORDER BY `numer_tab`"))
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
                  echo "<tr style='border-bottom:1pt solid black'>
                    <td>".$row['numer_tab']."</td>
                    <td>".$row['marka']."</td>
                    <td>".$row['model']."</td>
                    <td>".$row['rocznik']."</td>
                    <td>".$row['rok_wprowadzenia']."</td>
                    <td>".$row['uklad_drzwi']."</td>
                    <td>".$row['klimatyzacja']."</td>
                    <td>".$row['biletomat']."</td>
                    <td>".$row['uwagi']."</td>
                    <td><button data-toggle='modal' data-target='#modal-edycja' data-idvehicle='".$row['id']."'>Edytuj</button><br />
                    <button data-toggle='modal' data-target='#modal-szczegoly' data-idvehicle='".$row['id']."'>szczegóły</button><br />
                    <button data-toggle='modal' data-target='#modal-workshop' data-idvehicle='".$row['id']."'>Dodaj do warsztatu</button><br/>
                    <button data-toggle='modal' data-target='#modal-workshop' data-idvehicle='".$row['id']."'>Usuń pojazd</button>
                    </td>
                  </tr>";
                    
                }
            }

            echo "</table><br/>";
        }
    if($result2 = @$connect->query("SELECT * FROM `vehicles` where typ_pojazdu='TRAM' and miasto='Gorzow Wiktorowski' ORDER BY `numer_tab`"))
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
              echo "<tr style='border-bottom:1pt solid black'>
                <td>".$row['numer_tab']."</td>
                <td>".$row['marka']."</td>
                <td>".$row['model']."</td>
                <td>".$row['rocznik']."</td>
                <td>".$row['rok_wprowadzenia']."</td>
                <td>".$row['uklad_drzwi']."</td>
                <td>".$row['klimatyzacja']."</td>
                <td>".$row['biletomat']."</td>
                <td>".$row['uwagi']."</td>
                <td><button data-toggle='modal' data-target='#modal-edycja' data-idvehicle='".$row['id']."'>Edytuj</button><br />
                <button data-toggle='modal' data-target='#modal-szczegoly' data-idvehicle='".$row['id']."'>szczegóły</button><br />
                <button data-toggle='modal' data-target='#modal-workshop' data-idvehicle='".$row['id']."'>Dodaj do warsztatu</button><br/>
                <button data-toggle='modal' data-target='#modal-workshop' data-idvehicle='".$row['id']."'>Usuń pojazd</button>
                </td>
              </tr>";
                
            }
        }

        echo "</table><br/>";
    }  
}     
    mysqli_close($connect);
?>