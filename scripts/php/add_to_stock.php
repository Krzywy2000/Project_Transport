<?php
    require_once("db_connect.php");
	$connect = new mysqli($host, $db_user, $db_password, $db_name);
	session_start();

if ($connect) {

$add_vehicle_type=$_POST['add_vehicle_type'];
$add_vehicle_miasto=$_SESSION['access'];
$add_vehicle_marka=$_POST['add_vehicle_marka'];
$add_vehicle_model=$_POST['add_vehicle_model'];
$add_vehicle_drzwi=$_POST['add_vehicle_drzwi'];
$add_vehicle_rocznik=$_POST['add_vehicle_rocznik'];
$add_vehicle_rok=$_POST['add_vehicle_rok'];
$add_vehicle_klimatyzacja=$_POST['add_vehicle_klimatyzacja'];
$add_vehicle_biletomat=$_POST['add_vehicle_biletomat'];
$add_vehicle_numer=$_POST['add_vehicle_numer'];
$add_vehicle_typ_taboru=$_POST['add_vehicle_typ_taboru'];
$add_vehicle_uwagi=$_POST['add_vehicle_uwagi'];
$add_vehicle_podloga=$_POST['add_vehicle_podloga'];





$query_add_to_stock="INSERT INTO vehicles (`typ_pojazdu`,`miasto`,`marka`,`model`,`uklad_drzwi`,`rocznik`,`rok_wprowadzenia`,`klimatyzacja`,`biletomat`,`niska_podloga`,`numer_tab`,`typ_taboru`,`uwagi`) 
values('".$add_vehicle_type."','".$add_vehicle_miasto."','".$add_vehicle_marka."','".$add_vehicle_model."','".$add_vehicle_drzwi."','".$add_vehicle_rocznik."','".$add_vehicle_rok."','".$add_vehicle_klimatyzacja."','".$add_vehicle_biletomat."','".$add_vehicle_podloga."','".$add_vehicle_numer."','".$add_vehicle_typ_taboru."','".$add_vehicle_uwagi."')";

//,'".$add_vehicle_id_workshop."','".$add_vehicle_id_timetable."'


//id
//typ_pojazdu
//miasto
//marka
//model
//uklad_drzwi
//rocznik
//rok_wprowadzenia
//klimatyzacja
//biletomat
//numer_tab
//uwagi
//id_workshop
//id_timetable

	@$zap1_add_to_stock=@$connect->query($query_add_to_stock);

	@header("Location: ../../index_user.php?page=rolling_stock");
	} 
	else {
  echo 'not connected';
}
?>

