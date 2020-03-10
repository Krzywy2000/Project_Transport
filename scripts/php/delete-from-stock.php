<?php
    require_once("db_connect.php");
    $connect = new mysqli($host, $db_user, $db_password, $db_name);

if ($connect) {
  echo 'connected';

	$id_delete_vehicles=$_POST['id_delete_vehicles'];

	$delete="DELETE FROM vehicles where id='".$id_delete_vehicles."'";


	$delete_from=@$connect->query($delete);

	echo $delete_from;
		echo "<br/>";
	echo $id_delete_vehicles;
	echo "<br/>";


		header("Location: ../../index_user.php?page=rolling_stock");
}
	else {
  echo 'not connected';
}
//<input type="hidden" id="id-delete-vehicles" name="id_delete_vehicles" value="">

?>