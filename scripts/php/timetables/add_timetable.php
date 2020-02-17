<?php
    require_once("scripts/php/db_connect.php");
    $connect = new mysqli($host, $db_user, $db_password, $db_name);
                if ($result = @$connect->query("SELECT * FROM `destination` ORDER BY `city`"))
                        {
                            $destination = $result->num_rows;
                            if($destination>0)
                            {
                                while($row = $result->fetch_array())
                                {
                                    echo "<option value='$row[id]'>".$row['name']."</option>";
                                }
                            }
                        }
?>