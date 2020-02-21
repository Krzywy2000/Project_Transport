<?php
    require_once("../db_connect.php");
    $connect = new mysqli($host, $db_user, $db_password, $db_name);

    $name = $_POST['name'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $type = $_POST['type'];
    $comment = $_POST['comment'];
    $count_of_course = $_POST['count_of_course'];
    $i=0;

    while($i<$count_of_course){
        $i++;
        $number = array($_POST['number_'.$i]);
        $departure = array($_POST['departure_'.$i]);
        $destination = array($_POST['option_destination']);

        $send = "INSERT INTO `timetable`(`nazwa_zm`, `godz_roz`, `godz_zak`, `rodzaj`, `uwagi`) VALUES ($name,$start,$end,$type,$comment)";
        // SELECT MAX(id) FROM timetable
        $connect->query($send);
            
        $check_id = "SELECT MAX(id) FROM timetable";

        $id = mysqli_fetch_assoc($check_id);

        $send_1 = "INSERT INTO `timetable_course`(`id_timetable`, `nr_kursu`, `id_destination`, `godz_roz`) VALUES ($id,$number,$destination,$departure)";
        
        $connect->query($send_1);
            
        //header("Location: ../../../index_user.php?page=timetables");

    }
?>