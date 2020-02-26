<?php
    session_start();
    
    require_once("../db_connect.php");
    $connect = new mysqli($host, $db_user, $db_password, $db_name);

    $name = $_POST['name'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $type = $_POST['type'];
    $comment = $_POST['comment'];
    $count_of_course = $_POST['count_of_course'];
    $city = $_SESSION['access'];
    $type_of_rolling_stock = $_POST['type_of_rolling_stock'];
    $i=0;

    $send = "INSERT INTO `timetable`(`miasto`,`nazwa_zm`, `godz_roz`, `godz_zak`, `rodzaj`, `obsluga`, `uwagi`) VALUES ('$_SESSION[access]','$name','$start','$end','$type', '$type_of_rolling_stock','$comment')";
    $connect->query($send);

    if ($check_id = @$connect->query("SELECT MAX(id) FROM `timetable`"))
            {
                $id_1 = $check_id->num_rows;
                if($id_1>0)
                {
                    while($row = $check_id->fetch_array())
                    {
                        $id = $row['MAX(id)'];
                    }
                }
            }


    function sum_the_time($departure, $arrival) {
        $times = array($departure, $arrival);
        $seconds = 0;
        foreach ($times as $time)
        {
            list($hour,$minute,$second) = explode(':', $time);
            $seconds += $hour*3600;
            $seconds += $minute*60;
            $seconds += $second;
        }
        $hours = floor($seconds/3600);
        $seconds -= $hours*3600;
        $minutes  = floor($seconds/60);
        $seconds -= $minutes*60;
        if($seconds < 9)
        {
            $seconds = "0".$seconds;
        }
        if($minutes < 9)
        {
            $minutes = "0".$minutes;
        }
        if($hours < 9)
        {
            $hours = "0".$hours;
        }
        return "{$hours}:{$minutes}:{$seconds}";
    }
              
    while($i<$count_of_course){
        $i++;
        $number = $_POST['number_'.$i];
        $departure = $_POST['departure_'.$i];
        $destination = $_POST['option_destination_'.$i];
        echo $departure."<br/>";
        
        if ($check_arrival = @$connect->query("SELECT * FROM `destination` WHERE `miasto` LIKE '$_SESSION[access]' AND `id` LIKE '$destination' ORDER BY `miasto`"))
            {
                $id_2 = $check_arrival->num_rows;
                if($id_2>0)
                {
                    while($row = $check_arrival->fetch_array())
                    {
                        $arrival = $row['czas_przejazdu'];
                    }
                }
            }

        $arrival_all = sum_the_time($departure,$arrival);

        $send_1 = "INSERT INTO `timetable_course`(`id_timetable`, `nr_kursu`, `nr_linii`, `id_destination`, `godz_roz`,`godz_zak`) VALUES ('$id','$i','$number','$destination','$departure','$arrival_all')";
        
        $connect->query($send_1);
    }
        header("Location: ../../../index_user.php?page=timetables");
?>