<?php
    require_once("db_connect.php");
	$connect = new mysqli($host, $db_user, $db_password, $db_name);
    $edycja_workshop_edit = $_POST['edycja_workshop_edit'];
  $edycja_workshop_powod = $_POST['edycja_workshop_powod'];
    $edycja_workshop_data_roz = $_POST['edycja_workshop_data_roz'];
    $edycja_workshop_data_zak = $_POST['edycja_workshop_data_zak'];
	
	
	$edycja="update workshop set powod='".$edycja_workshop_powod."' , data_roz='".$edycja_workshop_data_roz."' , data_zak='".$edycja_workshop_data_zak."' where id='".$edycja_workshop_edit."'";
	
		$workshop_editor=@$connect->query($edycja);

	echo $workshop_editor;
	        header("Location: ../../index_user.php?page=workshop");
	?>