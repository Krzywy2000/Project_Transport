<?php
    require_once("scripts/php/db_connect.php");
    $connect = new mysqli($host, $db_user, $db_password, $db_name);
    @$connect->query("SET CHARSET utf8");

    $date = Date("Y-m-d");
    echo "<div class='mess_users'>
        <table>
            <tr class='main'>
                <td>Od</td>
                <td>Do</td>
                <td>Nr taborowy</td>
                <td>Powód</td>
            </tr>";
            if ($result = @$connect->query("SELECT * from `workshop` INNER JOIN `vehicles` on `vehicles`.`id` = `workshop`.`id_pojazdu` WHERE `workshop`.`miasto` LIKE '$_SESSION[access]'"))
            {
                $users = $result->num_rows;
                if($users>0)
                {
                    while($row = $result->fetch_array())
                    {
                        echo "<tr>
                                <td>".$row['data_roz']."</td>
                                <td>".$row['data_zak']."</td>
                                <td>".$row['numer_tab']."</td>
                                <td>".$row['powod']."</td>
                            </tr>";
                                }
                }
            }
        echo "</table></div>";
?>