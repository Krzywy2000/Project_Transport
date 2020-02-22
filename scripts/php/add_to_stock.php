<?php
    require_once("db_connect.php");
    $connect = new mysqli($host, $db_user, $db_password, $db_name);

if ($connect) {
  echo 'connected';

$add_vehicle_type=$_POST['add_vehicle_type'];
$add_vehicle_miasto=$_POST['add_vehicle_miasto'];
$add_vehicle_marka=$_POST['add_vehicle_marka'];
$add_vehicle_model=$_POST['add_vehicle_model'];
$add_vehicle_drzwi=$_POST['add_vehicle_drzwi'];
$add_vehicle_rocznik=$_POST['add_vehicle_rocznik'];
$add_vehicle_rok=$_POST['add_vehicle_rok'];
$add_vehicle_klimatyzacja=$_POST['add_vehicle_klimatyzacja'];
$add_vehicle_biletomat=$_POST['add_vehicle_biletomat'];
$add_vehicle_numer=$_POST['add_vehicle_numer'];
$add_vehicle_uwagi=$_POST['add_vehicle_uwagi'];
//$add_vehicle_id="";
$add_vehicle_id_workshop="0";
$add_vehicle_id_timetable="0";


//$add_vehicle_brygady=$_POST['add_vehicle_brygady'];
//$add_vehicle_work=$_POST['add_vehicle_work'];

$query_add_to_stock="INSERT INTO vehicles (`typ_pojazdu`,`miasto`,`marka`,`model`,`uklad_drzwi`,`rocznik`,`rok_wprowadzenia`,`klimatyzacja`,`biletomat`,`numer_tab`,`uwagi`,`id_workshop`,`id_timetable`) 
values('".$add_vehicle_type."','".$add_vehicle_miasto."','".$add_vehicle_marka."','".$add_vehicle_model."','".$add_vehicle_drzwi."','".$add_vehicle_rocznik."','".$add_vehicle_rok."','".$add_vehicle_klimatyzacja."','".$add_vehicle_biletomat."','".$add_vehicle_numer."','".$add_vehicle_uwagi."','".$add_vehicle_id_workshop."','".$add_vehicle_id_timetable."')";




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

	$zap1_add_to_stock=@$connect->query($query_add_to_stock);
	echo $zap1_add_to_stock;
	echo "<br/>";
	//echo $add_vehicle_id;
	echo "<br/>";
	echo $add_vehicle_type;
	echo "<br/>";
	echo $add_vehicle_miasto;
	echo "<br/>";
	echo $add_vehicle_marka;
	echo "<br/>";
	echo $add_vehicle_model;
	echo "<br/>";
	echo $add_vehicle_drzwi;
	echo "<br/>";
	echo $add_vehicle_rocznik;
	echo "<br/>";
	echo $add_vehicle_rok;
	echo "<br/>";
	echo $add_vehicle_klimatyzacja;
	echo "<br/>";
	echo $add_vehicle_biletomat;
	echo "<br/>";
	echo $add_vehicle_numer;
	echo "<br/>";
	echo $add_vehicle_uwagi;
	echo "<br/>";
	echo $add_vehicle_id_workshop;
	echo "<br/>";
	echo $add_vehicle_id_timetable;
	echo "<br/>";
	echo "<br/>";
	
	//header("Location: ../../../index_user.php?page=rolling_stock");
	} 
	else {
  echo 'not connected';
}
?>

<!--id
typ_pojazdu			:<input type="text" name="add_vehicle_type"/><br /><br/>
miasto				:<input type="text" name="add_vehicle_miasto"/><br /><br/>
marka				:<input type="text" name="add_vehicle_marka"><br /><br/>
model				:<input type="text" name="add_vehicle_model"><br /><br/>
uklad_drzwi			:<input type="text" name="add_vehicle_drzwi"><br /><br/>
rocznik				:<input type="year" name="add_vehicle_rocznik"><br /><br/>
rok_wprowadzenia	:<input type="year" name="add_vehicle_rok"><br /><br/>
klimatyzacja		:<input type="text" name="add_vehicle_klimatyzacja"><br /><br/>
biletomat			:<input type="text" name="add_vehicle_biletomat"><br /><br/>
numer_tab		:<input type="number" name="add_vehicle_numer"><br /><br/>
uwagi				:<input type="text" name="add_vehicle_uwagi"><br /><br/>
id_workshop
id_timetable
-->