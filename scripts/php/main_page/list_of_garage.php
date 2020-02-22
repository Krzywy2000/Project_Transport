<?php
    require_once("scripts/php/db_connect.php");
    $connect = new mysqli($host, $db_user, $db_password, $db_name);
                    if ($result = @$connect->query("SELECT * from `vehicles` where typ_pojazdu='BUS' and id_workshop='0' and `miasto`='$_SESSION[access]' order by `numer_tab`"))
                        {
                            echo "<div class='mess_users'>
                            <table>
                            <tr class='main'>
                                <td colspan='3'>Autobusy</td>
                            </tr>
                            <tr class='main'>
                                <td>Numer taborowy</td>
                                <td>Marka</td>
                                <td>Model</td>
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
                                    </tr>";
                                }
                            }

                            echo "</table></div><br/>";
                        }
                        if($_SESSION['access'] == '4')
                        {
                            if ($result = @$connect->query("SELECT * from `vehicles` where typ_pojazdu='TRAM' and id_workshop='0' and `miasto`='$_SESSION[access]'  order by `numer_tab`"))
                            {
                                echo "<div class='mess_users'>
                                <table>
                                <tr class='main'>
                                    <td colspan='3'>Trolejbusy</td>
                                </tr>
                                <tr class='main'>
                                    <td>Numer taborowy</td>
                                    <td>Marka</td>
                                    <td>Model</td>
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
                                        </tr>";
                                    }
                                }
    
                                echo "</table></div><br/>";
                            }
                        } else {
                            if ($result = @$connect->query("SELECT * from `vehicles` where typ_pojazdu='TRAM' and id_workshop='0' and `miasto`='$_SESSION[access]'  order by `numer_tab`"))
                            {
                                echo "<div class='mess_users'>
                                <table>
                                <tr class='main'>
                                    <td colspan='3'>Tramwaje</td>
                                </tr>
                                <tr class='main'>
                                    <td>Numer taborowy</td>
                                    <td>Marka</td>
                                    <td>Model</td>
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
                                        </tr>";
                                    }
                                }
    
                                echo "</table></div><br/>";
                            }                            
                        }
                        
?>