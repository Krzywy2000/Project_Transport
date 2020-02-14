<?php
    session_start();
	
	if ((!isset($_POST['login'])) || (!isset($_POST['password'])))
	{
		header('Location: ../../index.php');
		exit();
	}

	require_once "db_connect.php";

	$connect = new mysqli($host, $db_user, $db_password, $db_name);
	
	if ($connect->connect_errno!=0)
	{
		echo "Error: ".$connect->connect_errno;
	}
	else
	{
		$login = $_POST['login'];
		$password = $_POST['password'];
		
		$login = htmlentities($login, ENT_QUOTES, "UTF-8");
		$password = htmlentities($password, ENT_QUOTES, "UTF-8");
	

		if ($result = @$connect->query(
		sprintf("SELECT * FROM users WHERE login = '%s' and password = '%s'",
		mysqli_real_escape_string($connect,$login),
		mysqli_real_escape_string($connect,$password))))
		{
			$ilu_userow = $result->num_rows;
			if($ilu_userow>0)
			{
				$_SESSION['zalogowany'] = true;
				
				$row = $result->fetch_assoc();
				$_SESSION['id'] = $row['id'];
				$_SESSION['login'] = $row['login'];
				$_SESSION['password'] = $row['password'];
				$_SESSION['e-mail'] = $row['e-mail'];
				$_SESSION['access'] = $row['access'];
				$_SESSION['name'] = $row['name'];
				$_SESSION['surname'] = $row['surname'];
				
				unset($_SESSION['blad']);
				$result->free_result();

				//$date = date("Y-m-d");
				//mysqli_query("UPDATE users SET last_login = '$ip' WHERE id = '$_SESSION[id]'");
				
				if($_SESSION['access'] == '1')
				{
					header('Location: ../../index_admin.php');
				}

				if($_SESSION['access'] == '2')
				{
					header('Location: ../../index_user.php');
				}
				
			} 
			else 
			{
				header('Location: ../../index.php');
			}
			
		}
		
		$connect->close();
	}
?>