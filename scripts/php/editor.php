<?php
    require_once("db_connect.php");
    $connect = new mysqli($host, $db_user, $db_password, $db_name);


	$id_vehicles=$_POST['id_vehicles'];
	$edycja_vehicle_type=$_POST['edycja_vehicle_type'];
	$edycja_vehicle_numer=$_POST['edycja_vehicle_numer'];
	$edycja_vehicle_marka=$_POST['edycja_vehicle_marka'];
	$edycja_vehicle_model=$_POST['edycja_vehicle_model'];
	$edycja_vehicle_rocznik=$_POST['edycja_vehicle_rocznik'];
	$edycja_vehicle_rok=$_POST['edycja_vehicle_rok'];
	$edycja_vehicle_numer=$_POST['edycja_vehicle_drzwi'];
	$edycja_vehicle_klimatyzacja=$_POST['edycja_vehicle_klimatyzacja'];
	$edycja_vehicle_biletomat=$_POST['edycja_vehicle_biletomat'];
	$edycja_vehicle_uwagi=$_POST['edycja_vehicle_uwagi'];
	$edycja_vehicle_brygady=$_POST['edycja_vehicle_brygady'];
	$edycja_vehicle_work=$_POST['edycja_vehicle_work'];


//id type marka model rocznik rok_wprowadzenia uklad_drzwi klimatyzacja biletomat numer_tab id_brygady uwagi in_workshop
//edycja_vehicle_type

	$update_editor="update vehicles set
	type='".$edycja_vehicle_type."' 
	, marka='".$edycja_vehicle_marka."' 
	, model='".$edycja_vehicle_model."' 
	, rocznik='".$edycja_vehicle_rocznik."' 
	, rok_wprowadzenia='".$edycja_vehicle_rok."' 
	, uklad_drzwi='".$edycja_vehicle_numer."' 
	, klimatyzacja='".$edycja_vehicle_klimatyzacja."' 
	, biletomat='".$edycja_vehicle_biletomat."'
	, numer_tab='".$edycja_vehicle_numer."' 
	, id_brygady='".$edycja_vehicle_brygady."' 
	, uwagi='".$edycja_vehicle_uwagi."' 
	, in_workshop='".$edycja_vehicle_work."'
	where id='".$id_vehicles."' ";


	$zap1_editor=@$connect->query($update_editor);

	echo $zap1_editor;

		
		
	//set in_workshop='1' where id='".$id_vehicles."' "	
?>
