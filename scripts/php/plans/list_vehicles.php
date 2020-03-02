<?php
    require_once("scripts/php/db_connect.php");
    $connect = new mysqli($host, $db_user, $db_password, $db_name);


    $query_vehicles="SELECT * FROM vehicles WHERE miasto LIKE '$_SESSION[access]'";

    if($result = @$connect->query($query_vehicles))
    {
        $users = $result->num_rows;
        if($users>0)
        {   
            echo "<select>";
            while($row = $result->fetch_array())
            {  
                echo "<option>".$row['numer_tab']." | ".$row['model']."</option>";
            }
            echo "</select>";
        }
    }
?>