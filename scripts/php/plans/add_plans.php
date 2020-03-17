<?php
    require_once("../db_connect.php");
    @$connect = new mysqli($host, $db_user, $db_password, $db_name);
    @$miasto = $_SESSION['access'];

    @session_start();
    @$timetable = $_POST['timetable'];
    @$vehicle = $_POST['vehicle'];
    @$i = $_POST['i'];
    @$liczba = 0;
    @$date = $_POST['date'];
    @$miasto = $_SESSION['access'];
    while($i >= $liczba)
    {
        $liczba++;
        @$insert = "INSERT INTO `plan`(`miasto`, `data`, `id_timetable`, `numer_pojazdu`) VALUES ($miasto,'$date',$timetable[$liczba],$vehicle[$liczba])";
        @$zap1_add_to_plans=@$connect->query($insert);
    }

    @header("Location: ../../../index_user.php?page=plans");
?>