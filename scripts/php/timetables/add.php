<?php
    require_once("../db_connect.php");
    $connect = new mysqli($host, $db_user, $db_password, $db_name);

    $name = $_POST['name'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $count_of_course = $_POST['count_of_course'];
    $i=0;
    echo $name."<br/>";
    echo $start."<br/>";
    echo $end."<br/>";
    echo $count_of_course."<br/>";

    if ($result = @$connect->query("SELECT count(*) FROM `information_schema`.`columns` WHERE table_schema='edyspozytor' AND table_name='timetables_all''"))
    {
        $count = $result->num_rows;
        if($count>1)
        {
            while($row = $result->fetch_array())
            {
                echo $row('count(*)');
            }
        }
    }

    //$how_much_rows_all = $how_much_rows - 4;
    //echo $how_much_rows_all;

    while($i<$count_of_course){
        $i++;
        $number = array($_POST['number_'.$i]);
        $departure = array($_POST['departure_'.$i]);
        
        for($a=0;$a<$i;$a++){
            echo $number[$a]."<br/>";
            echo $departure[$a]."<br/>";
        }

    }
?>