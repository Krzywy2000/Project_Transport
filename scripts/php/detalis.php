<?php
    require_once("db_connect.php");
    $connect = new mysqli($host, $db_user, $db_password, $db_name);

    $id_vehicles=$_POST['id_vehicles'];
    $query_detalis="SELECT * FROM vehicles WHERE id='".$id_vehicles."'";

    $zap1_query=@$connect->query($query_detalis);
    {
        $id_1 = $check_id->num_rows;
                if($id_1>0)
                {
                    while($row = $check_id->fetch_array())
                    {
                        echo $row['id'];
                    }
                }
    }
		
?>