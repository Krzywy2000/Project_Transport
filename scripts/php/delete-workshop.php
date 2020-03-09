<?php
    require_once("db_connect.php");
	$connect = new mysqli($host, $db_user, $db_password, $db_name);
    $id_workshop_delete = $_POST['id_workshop_delete'];
	
	$zap1="delete from workshop where id_pojazdu='".$id_workshop_delete."'";
	$zap2="update vehicles set id_workshop='0' where id='".$id_workshop_delete."'";
	
	
			$z1=@$connect->query($zap1);
			
					$z2=@$connect->query($zap2);
					header("Location: ../../index_user.php?page=workshop");
					?>