<?php
	include_once '../security.php';
	include_once '../conexion.php';
	include_once '../functions.php';

	if ($_SESSION['permissions'] != 'admin')
	{
		header('Location: /');
		exit();
	}
	
	if (empty($_POST['txtspid']))
	{
		header('Location: /');
		exit();
	}

	if($_POST['selectcurrent'] == '1')
	{
		$_SESSION['school_period'] = $_POST['txtspid'];

		$sql_update = "UPDATE school_periods SET current = '0' WHERE school_period != '".$_POST['txtspid']."'";

		mysqli_query($conexion, $sql_update);
	}

	$sql_insert = "INSERT INTO school_periods(school_period, start_date, end_date, active, current) VALUES('".$_POST['txtspid']."', '".$_POST['datespstart']."', '".$_POST['datespend']."', '".$_POST['selectactive']."', '".$_POST['selectcurrent']."')";

	mysqli_query($conexion, $sql_insert);

	$_SESSION['msgbox_info'] = 1;
	$_SESSION['text_msgbox_info'] = 'Registro cargado correctamente.';

	header ('Location: /modules/school_periods');
?>