<?php
    require_once("db_connect.php");
    $connect = new mysqli($host, $db_user, $db_password, $db_name);

	//$numer_tab=$_POST['id_vehicles'];
	$id_vehicles=$_POST['id_vehicles'];
	$form_workshop_text=$_POST['form_workshop_text'];
	$form_workshop_data_p=$_POST['form_workshop_data_p'];
	$form_workshop_data_k=$_POST['form_workshop_data_k'];
	$form_workshop_miasto=$_POST['form_workshop_miasto'];

	//numer_tab	id_pojazdu	powod	data_roz	data_zak
echo $id_vehicles."<br>";
echo $form_workshop_text."<br>";
echo $form_workshop_data_p."<br>";
echo $form_workshop_data_k."<br>";
echo "<br/>".$form_workshop_miasto;


	if($form_workshop_data_p>$form_workshop_data_k){
		echo "Data początkowa nie może być późniejsza niż końcowa";
	}
	else{	
		$query_workshop="insert into workshop (`id_pojazdu`,`data_roz`,`data_zak`,`powod`,`miasto`) values(
		".$id_vehicles.",
		'".$form_workshop_data_p."',
		'".$form_workshop_data_k."',
		'".$form_workshop_text."',
		".$form_workshop_miasto."
		)";

		$update_workshop="update vehicles set id_workshop='1' where id='".$id_vehicles."' ";

		$zap1_workshop=@$connect->query($query_workshop);
		$zap2_workshop=@$connect->query($update_workshop);
			echo $zap1_workshop."zap1<br>";
			echo $zap2_workshop."zap2<br>";

		
		header("Location: ../../index_user.php?page=rolling_stock");
			}
			
?>

