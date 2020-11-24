<?php
	include_once '../security.php';
	include_once '../conexion.php';
	include_once '../functions.php';

	require_once($_SESSION['raiz'].'/modules/sections/role-access-admin-editor.php');
	
	if (empty($_POST['txtuserid']))
	{
		header('Location: /');
		exit();
	}

	$sql_insert = "INSERT INTO teachers(user, name, surnames, curp, rfc, address, phone, level_studies, documentation, observations) VALUES('".$_POST['txtuserid']."', '".$_POST['txtname']."', '".$_POST['txtsurnames']."', '".$_POST['txtcurp']."', '".$_POST['txtrfc']."', '".$_POST['txtaddress']."', '".$_POST['txtphone']."', '".$_POST['selectlevelstudies']."', '".$_POST['selectdocumentation']."', '".$_POST['txtobservation']."')";

	if(mysqli_query($conexion, $sql_insert))
	{
		$_SESSION['msgbox_info'] = 1;
		$_SESSION['text_msgbox_info'] = 'Registro cargado correctamente.';
	}
	else
	{
		$_SESSION['msgbox_error'] = 1;
		$_SESSION['text_msgbox_error'] = 'Error al guardar datos en tabla.';
	}

	header ('Location: /modules/teachers');
?>