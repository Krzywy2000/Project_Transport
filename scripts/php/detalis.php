<?php
    require_once("db_connect.php");
    $connect = new mysqli($host, $db_user, $db_password, $db_name);

$id_vehicles=$_POST['id_vehicles'];
$query_detalis="select * from vehicles where id='".$id_vehicles."'";

	$zap1_query=@$connect->query($query_detalis);
		
?>