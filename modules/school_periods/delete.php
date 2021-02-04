<?php
	include_once '../security.php';
	include_once '../conexion.php';
	

	require_once($_SESSION['raiz'].'/modules/sections/role-access-admin.php');
	
	if (empty($_POST['txtspid']))
	{
		header('Location: /');
		exit();
	}

	$sql_delete = "DELETE FROM school_periods WHERE school_period = '".$_POST['txtspid']."'";

	if(mysqli_query($conexion, $sql_delete))
	{
		$_SESSION['msgbox_error'] = 0;
		$_SESSION['msgbox_info'] = 1;
		$_SESSION['text_msgbox_info'] = 'Registro eliminado correctamente.';
	}
	else
	{
		$_SESSION['msgbox_info'] = 0;
		$_SESSION['msgbox_error'] = 1;
		$_SESSION['text_msgbox_error'] = 'Error al eliminar datos en tabla.';
	}


	header ('Location: /modules/school_periods');
?>