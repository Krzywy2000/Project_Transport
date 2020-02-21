<?php
    require_once("db_connect.php");
    $connect = new mysqli($host, $db_user, $db_password, $db_name);
    
    $drive = $_GET['add_forms'];
    $i=0;
    
    while($drive > $i) {
        $i++;
        echo "<div class='col-md-12'>
            <a>Kurs:</a><br/>
            <select name='option_destination'>";

            if ($result = @$connect->query("SELECT * FROM `destination` ORDER BY `miasto`"))
            {
                $destination = $result->num_rows;
                if($destination>0)
                {
                    while($row = $result->fetch_array())
                    {
                        echo "<option name='destination_".$row['id']."' value='$row[id]'>".$row['relacja']." Czas przejazdu:".$row['czas_przejazdu']." min</option>";
                    }
                }
            }

        echo "</select><br/>
            </div><br/>
                <div class='col-md-4'>
                    <a>Numer linii:</a>
                    <input name='number_".$i."' type='text'/>
                </div>
                <div class='col-md-4'>
                    <a>Godzina odjazdu:</a>
                    <input name='departure_".$i."' id='departure[$i]' type='text'/>
                </div><br/>
            </div><br/>";
    }
               
    mysqli_close($connect);
?>