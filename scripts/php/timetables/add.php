<?php
    $name = $_POST['name'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $count_of_course = $_POST['count_of_course'];
    $i=0;
    echo $name."<br/>";
    echo $start."<br/>";
    echo $end."<br/>";
    echo $count_of_course."<br/>";

    while($i<$count_of_course){
        $i++;
        $number[$i] = $_POST['number'];
        echo $number[$i];
    }
?>