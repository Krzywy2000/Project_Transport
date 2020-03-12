<?php
    require_once("db_connect.php");
	$connect = new mysqli($host, $db_user, $db_password, $db_name);
	

	$id_usun=$_POST['id_usun'];
	$usun_timetable="delete from timetable where id='".$id_usun."'";
	
			$u_t=@$connect->query($usun_timetable);
			
echo $id_usun." id <br>";


		header("Location: ../../index_user.php?page=timetables");
				
?>