<?php
    require_once("db_connect.php");
    $connect = new mysqli($host, $db_user, $db_password, $db_name);

if ($connect) {

	$id_delete_vehicles=$_POST['id_delete_vehicles'];

	$delete="DELETE FROM vehicles where id='".$id_delete_vehicles."'";


	$delete_from=@$connect->query($delete);


		@header("Location: ../../index_user.php?page=rolling_stock");
}
	else {
  echo 'not connected';
}
//<input type="hidden" id="id-delete-vehicles" name="id_delete_vehicles" value="">

?>