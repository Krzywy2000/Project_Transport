<?php
    require_once("db_connect.php");
    $connect = new mysqli($host, $db_user, $db_password, $db_name);


	$id_vehicles=$_POST['id_vehicles'];
	$form_workshop_text=$_POST['form_workshop_text'];
	$form_workshop_data_p=$_POST['form_workshop_data_p'];
	$form_workshop_data_k=$_POST['form_workshop_data_k'];

	if($form_workshop_data_p>$form_workshop_data_k){
		echo "Data początkowa nie może być późniejsza niż końcowa";
	}
	else{	
		$query_workshop="insert into workshop_gw (`id_pojazdu`,`pocz_post`,`koniec_post`,`powod`) values(
		'".$id_vehicles."','".$form_workshop_data_p."','".$form_workshop_data_k."','".$form_workshop_text."')";

		$update_workshop="update vehicles set in_workshop='1' where id='".$id_vehicles."' ";

		$zap1_workshop=@$connect->query($query_workshop);
			$zap2_workshop=@$connect->query($update_workshop);
			echo $zap1_workshop;
			echo $zap2_workshop;

		header("Location: ../../index_user.php?page=rolling_stock");
			}
			
?>