<?php
    require_once("db_connect.php");
    $connect = new mysqli($host, $db_user, $db_password, $db_name);
    
    $search = $_GET["search"];
    
    if($search == "") {
            if ($result = @$connect->query("SELECT * FROM `vehicles` where type='bus' ORDER BY `Numer_tab`"))
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
            if($result2 = @$connect->query("SELECT *FROM `vehicles` where type='tram' ORDER BY `numer_tab`"))
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
                    <td>".$row2['rocznik']."</td>
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
    } else {
        if ($result = @$connect->query("SELECT * FROM `vehicles` WHERE `Numer_tab` LIKE '".$search."%' and type='bus' ORDER BY `Numer_tab`"))
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
    if($result2 = @$connect->query("SELECT * FROM `vehicles` WHERE `numer_tab` LIKE '".$search."%' and type='tram' ORDER BY `numer_tab`"))
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
            <td>".$row2['rocznik']."</td>
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
    mysqli_close($connect);
?>