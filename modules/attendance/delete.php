<?php
	include_once '../security.php';
	include_once '../conexion.php';
	

	require_once($_SESSION['raiz'].'/modules/sections/role-access-admin-editor.php');
	
	if (empty($_POST['txtgroup']))
	{
		header('Location: /');
		exit();
	}

	$sql_delete = "DELETE FROM groups WHERE id_group = '".$_POST['txtgroup']."' AND school_period = '".$_POST['txtgroupschoolperiod']."'";

	if(mysqli_query($conexion, $sql_delete))
	{
		$sql_delete = "DELETE FROM groups_students WHERE id_group = '".$_POST['txtgroup']."' AND school_period = '".$_POST['txtgroupschoolperiod']."'";

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
	}
	else
	{
		$_SESSION['msgbox_info'] = 0;
		$_SESSION['msgbox_error'] = 1;
		$_SESSION['text_msgbox_error'] = 'Error al eliminar datos en tabla.';
	}

	header ('Location: /modules/groups');
?>