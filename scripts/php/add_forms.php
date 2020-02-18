<?php
    require_once("db_connect.php");
    $connect = new mysqli($host, $db_user, $db_password, $db_name);
    
    $drive = $_GET['add_forms'];
    $i=0;
    
    while($drive > $i) {
        $i++;
        echo "<div class='col-md-12'>
            <a>Kurs:</a><br/>
            <select>";

            if ($result = @$connect->query("SELECT * FROM `destination` ORDER BY `city`"))
            {
                $destination = $result->num_rows;
                if($destination>0)
                {
                    while($row = $result->fetch_array())
                    {
                        echo "<option name='$row[id]' value='$row[id]'>".$row['name']."</option>";
                    }
                }
            }

        echo "</select><br/>
            </div><br/>
            <div class='col-md-4'>
                <a>Numer linii:</a>
                <input name='number[$i]' type='text'/>
            </div>
            <div class='col-md-4'>
                <a>Godzina odjazdu:</a>
                <input name='departure[$i]' id='departure[$i]' type='text'/>
            </div><br/>
            <div class='col-md-4'>
                <a>Godzina przyjazdu:</a>
                <span id='arrival'>
                
                </span>
            </div><br/>";
    }
               
    mysqli_close($connect);
?>