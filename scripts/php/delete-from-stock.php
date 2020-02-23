<?php
    require_once("db_connect.php");
    $connect = new mysqli($host, $db_user, $db_password, $db_name);

if ($connect) {
  echo 'connected';

	$id_delete_vehicles=$_POST['id_delete_vehicles'];

<<<<<<< HEAD
$delete="DELETE FROM vehicles where id='".$id_delete_vehicles."'";
=======
	$delete="DELETE FROM vehicles where id='".$id_delete_vehicles."'";
>>>>>>> 47e3133b7eecf23334661f05640b3bba61a182d4


	$delete_from=@$connect->query($delete);

	echo $delete_from;
		echo "<br/>";
<<<<<<< HEAD
echo $id_delete_vehicles;
	echo "<br/>";


		header("Location: ../../index_user.php?page=rolling_stock");
=======
	echo $id_delete_vehicles;
	echo "<br/>";
	echo "test";

	//header("Location: ../../index_user.php?page=rolling_stock");
>>>>>>> 47e3133b7eecf23334661f05640b3bba61a182d4
}
	else {
  echo 'not connected';
}
<<<<<<< HEAD

=======
//<input type="hidden" id="id-delete-vehicles" name="id_delete_vehicles" value="">
>>>>>>> 47e3133b7eecf23334661f05640b3bba61a182d4

?>