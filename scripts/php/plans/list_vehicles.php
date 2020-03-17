<?php
    require_once("scripts/php/db_connect.php");
    $connect = new mysqli($host, $db_user, $db_password, $db_name);
    $a=0;

    if($_SESSION['access'] == 4)
    {
        $query_vehicles="SELECT * FROM vehicles WHERE miasto LIKE '$_SESSION[access]' ORDER BY tablice_rej";
        if($result = @$connect->query($query_vehicles))
        {
            $users = $result->num_rows;
            if($users>0)
            {   
                echo "<select>";
                while($row = $result->fetch_array())
                {  
                    echo "<option value=$row[id]>".$row['tablice_rej']." | ".$row['model']."</option>";
                }
                echo "</select>";
            }
        }
    }
    else
    {
        $query_vehicles="SELECT * FROM vehicles WHERE miasto LIKE '$_SESSION[access]' ORDER BY numer_tab";
        if($result = @$connect->query($query_vehicles))
    {
        $users = $result->num_rows;
        if($users>0)
        {

            echo "<select name='vehicle[".$i."]'>";
            while($row = $result->fetch_array())
            {  
                echo "<option value=$row[id]>".$row['numer_tab']." | ".$row['model']."</option>";
            }
            echo "</select>";
        }
    }
    }
