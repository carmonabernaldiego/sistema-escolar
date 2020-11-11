<?php
	include_once '../security.php';
	include_once '../conexion.php';
	include_once '../functions.php';

	if ($_SESSION['permissions'] != 'admin')
	{
		header('Location: /');
		exit();
	}
	
	if (empty($_POST['txtgroup']))
	{
		header('Location: /');
		exit();
	}

	$sql_delete = "DELETE FROM groups WHERE id_group = '".$_POST['txtgroup']."' AND school_period = '".$_POST['txtgroupschoolperiod']."'";

	mysqli_query($conexion, $sql_delete);

	$sql_delete = "DELETE FROM groups_students WHERE id_group = '".$_POST['txtgroup']."' AND school_period = '".$_POST['txtgroupschoolperiod']."'";

	mysqli_query($conexion, $sql_delete);

	$_SESSION['msgbox_info'] = 1;
	$_SESSION['text_msgbox_info'] = 'Registro eliminado correctamente.';
	$_SESSION['view_form'] = 'form_default.php';

	header ('Location: /modules/groups');
?>