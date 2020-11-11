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

	$sql_delete = "DELETE FROM school_periods WHERE school_period = '".$_POST['txtspid']."'";

	mysqli_query($conexion, $sql_delete);

	$_SESSION['msgbox_info'] = 1;
	$_SESSION['text_msgbox_info'] = 'Registro eliminado correctamente.';

	header ('Location: /modules/school_periods');
?>