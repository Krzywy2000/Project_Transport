<?php
    require_once("scripts/php/db_connect.php");
    $connect = new mysqli($host, $db_user, $db_password, $db_name);
    if($_SESSION['access'] == 2)
                {
                    if ($result = @$connect->query("SELECT * from `workshop_gw` INNER JOIN `vehicles` on `vehicles`.`id` = `workshop_gw`.`id_pojazdu`"))
                        {
                            echo "<div class='mess_users'>
                            <table>
                            <tr class='main'>
                                <td>Od</td>
                                <td>Do</td>
                                <td>Nr taborowy</td>
                                <td>Powód</td>
                            </tr>";
                            $users = $result->num_rows;
                            if($users>0)
                            {
                                while($row = $result->fetch_array())
                                {
                                    echo "<tr>
                                        <td>".$row['pocz_post']."</td>
                                        <td>".$row['koniec_post']."</td>
                                        <td>".$row['numer_tab']."</td>
                                        <td>".$row['powod']."</td>
                                    </tr>";
                                }
                            }

                            echo "</table><br/></div>";
                        }
                }
?>