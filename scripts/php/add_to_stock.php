<?php
    require_once("db_connect.php");
    $connect = new mysqli($host, $db_user, $db_password, $db_name);



$add_vehicle_type=$_POST['add_vehicle_type'];
$add_vehicle_numer=$_POST['add_vehicle_numer'];
$add_vehicle_marka=$_POST['add_vehicle_marka'];
$add_vehicle_model=$_POST['add_vehicle_model'];
$add_vehicle_rocznik=$_POST['add_vehicle_rocznik'];
$add_vehicle_rok=$_POST['add_vehicle_rok'];
$add_vehicle_drzwi=$_POST['add_vehicle_drzwi'];
$add_vehicle_klimatyzacja=$_POST['add_vehicle_klimatyzacja'];
$add_vehicle_biletomat=$_POST['add_vehicle_biletomat'];
$add_vehicle_uwagi=$_POST['add_vehicle_uwagi'];
$add_vehicle_brygady=$_POST['add_vehicle_brygady'];
$add_vehicle_work=$_POST['add_vehicle_work'];

$query_add_to_stock="INSERT INTO vehicles (`type`, `marka` ,`model`, `rocznik`, `rok_wprowadzenia`, `uklad_drzwi`, `klimatyzacja` ,`biletomat`, `numer_tab`, `id_brygady` ,`uwagi`, `in_workshop`) 
values('".$add_vehicle_type."','".$add_vehicle_marka."','".$add_vehicle_model."','".$add_vehicle_rocznik."','".$add_vehicle_rok."','".$add_vehicle_drzwi."','".$add_vehicle_klimatyzacja."','".$add_vehicle_biletomat."','".$add_vehicle_numer."','".$add_vehicle_brygady."','".$add_vehicle_uwagi."','".$add_vehicle_work."',) ";
//id type marka model rocznik rok_wprowadzenia uklad_drzwi klimatyzacja biletomat numer_tab id_brygady uwagi in_workshop

	$zap1_add_to_stock=@$connect->query($query_add_to_stock);
	echo $zap1_add_to_stock;
	//header("Location: ../../../index_user.php?page=rolling_stock");
?>