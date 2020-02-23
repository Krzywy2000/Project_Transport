<?php
    session_start();

    require_once("db_connect.php");
    $connect = new mysqli($host, $db_user, $db_password, $db_name);
    $connect -> query("SET NAMES 'utf8';");
    $connect -> query("SET CHARACTER_SET 'utf8_general_ci';");

    
    $drive = $_GET['add_forms'];
    $i=0;

    $miasto = $_SESSION['access'];
    
    while($drive > $i) {
        $i++;
        echo "<div class='col-md-12'>
            <a>Kurs:</a><br/>
            <select name='option_destination_".$i."'>";

            if ($result = @$connect->query("SELECT * FROM `destination` WHERE `miasto` LIKE '$miasto' ORDER BY `miasto`"))
            {
                $destination = $result->num_rows;
                if($destination>0)
                {
                    while($row = $result->fetch_array())
                    {
                        echo "<option name='$row[id]' value='$row[id]'>".$row['numer_linii']." | ".$row['relacja']." | Czas przejazdu: ".$row['czas_przejazdu']." min</option>";
                    }
                }
            }

        echo "</select><br/>
            </div><br/>
                <div class='col-md-4'>
                    <a>Numer linii:</a>
                    <input name='number_".$i."' type='number'/>
                </div>
                <div class='col-md-4'>
                    <a>Godzina odjazdu:</a><br/>
                    <input name='departure_".$i."' id='departure[$i]' type='time'/>
                </div><br/>
            </div><br/>";
    }
               
    mysqli_close($connect);
?>