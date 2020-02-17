<?php
    require_once("db_connect.php");
    $connect = new mysqli($host, $db_user, $db_password, $db_name);
    
    $add_arrival = $_GET['add_arrival'];
    $add_destination = $_GET['add_destination'];
    echo $add_arrival;
    echo $add_destination;
    
    if ($result = @$connect->query("SELECT * FROM `destination` WHERE 'id' LIKE '".$add_destination))
        {
            $users = $result->num_rows;
            if($users>0)
            {
                while($row = $result->fetch_array())
                {

                    echo $row['time_to_drive']+$add_arrival;
                }
            }

            echo "</table><br/>";
        }
               
    mysqli_close($connect);
?>