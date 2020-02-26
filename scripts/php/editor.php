<?php
    require_once("db_connect.php");
	$connect = new mysqli($host, $db_user, $db_password, $db_name);
	session_start();

if ($connect) {
  echo 'connected';

	$id_edycja_vehicles=$_POST['id_edycja_vehicles'];
	$edycja_vehicle_type=$_POST['edycja_vehicle_type'];
	$edycja_vehicle_Miasto=$_POST['edycja_vehicle_Miasto'];
	$edycja_vehicle_marka=$_POST['edycja_vehicle_marka'];
	$edycja_vehicle_model=$_POST['edycja_vehicle_model'];
	$edycja_vehicle_drzwi=$_POST['edycja_vehicle_drzwi'];
	$edycja_vehicle_rocznik=$_POST['edycja_vehicle_rocznik'];
	$edycja_vehicle_rok=$_POST['edycja_vehicle_rok'];
	$edycja_vehicle_klimatyzacja=$_POST['edycja_vehicle_klimatyzacja'];
	$edycja_vehicle_biletomat=$_POST['edycja_vehicle_biletomat'];
	$edycja_vehicle_numer=$_POST['edycja_vehicle_numer'];
	$edycja_vehicle_typ_taboru=$_POST['edycja_vehicle_typ_taboru'];
	$edycja_vehicle_uwagi=$_POST['edycja_vehicle_uwagi'];



//id type marka model rocznik rok_wprowadzenia uklad_drzwi klimatyzacja biletomat numer_tab id_brygady uwagi in_workshop
//edycja_vehicle_type
//typ_taboru:			:<input type="text" name="edycja_vehicle_typ_taboru"><br /><br/>

	$update_editor="update vehicles set
	typ_pojazdu='".$edycja_vehicle_type."'
	, miasto='".$edycja_vehicle_Miasto."'
	, marka='".$edycja_vehicle_marka."' 
	, model='".$edycja_vehicle_model."'
	, uklad_drzwi='".$edycja_vehicle_numer."' 	
	, rocznik='".$edycja_vehicle_rocznik."' 
	, rok_wprowadzenia='".$edycja_vehicle_rok."' 
	, klimatyzacja='".$edycja_vehicle_klimatyzacja."' 
	, biletomat='".$edycja_vehicle_biletomat."'
	, numer_tab='".$edycja_vehicle_numer."'
	, typ_taboru='".$edycja_vehicle_typ_taboru."' 	
	, uwagi='".$edycja_vehicle_uwagi."' 
	where id='".$id_edycja_vehicles."' ";


	$zap1_editor=@$connect->query($update_editor);

	echo $zap1_editor;

		header("Location: ../../index_user.php?page=rolling_stock");
		
		

}
	else {
  echo 'not connected';
}
?>
