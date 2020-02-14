<?php

    require_once("scripts/php/db_connect.php");
    $connect = new mysqli($host, $db_user, $db_password, $db_name);
    echo "
    <div class='container-fluid'>
        <div class='row'>
            <div class='col-md-4'><a>Nazwa zadania: </a><input type='text'></div><br/>
            <div class='col-md-4'><a>Godzina rozpoczęcia: </a><input type='text'/></div><br/>
            <div class='col-md-4'> <a>Godzina zakończenia: </a><input type='text'/></div><br/>
            <div class='col-md-12'>
                <a>Kurs:</a><br/>";
                echo "<select>";
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
            echo "</select><br/>";
            echo "</div><br/>
            <div class='col-md-4'>
                    <a>Godzina odjazdu:</a>
                    <input type='text'/>
            </div><br/>
            <div class='col-md-4'>
                    <a>Godzina przyjazdu:</a>
            </div><br/>
            <div class='col-md-4'>
            <button class='button' data-toggle='modal' data-target='#modal-add-timetable'>Dodaj kurs</button>
            </div><br/>
    ";
        

    echo "
        </div>
    </div>
    
   
    ";
?>