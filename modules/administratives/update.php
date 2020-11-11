<?php
	include_once '../security.php';
	include_once '../conexion.php';
	include_once '../functions.php';
	
	if ($_SESSION['permissions'] != 'admin')
	{
		header('Location: /');
		exit();
	}
	
	if (empty($_POST['txtuserid']))
	{
		header('Location: /');
		exit();
	}

	$sql_update = "UPDATE administratives SET name = '".$_POST['txtname']."', surnames = '".$_POST['txtsurnames']."', curp = '".$_POST['txtcurp']."', rfc = '".$_POST['txtrfc']."', address = '".$_POST['txtaddress']."', phone = '".$_POST['txtphone']."', level_studies = '".$_POST['selectlevelstudies']."', documentation = '".$_POST['selectdocumentation']."', observations = '".$_POST['txtobservation']."' WHERE user = '".$_POST['txtuserid']."'";

	mysqli_query($conexion, $sql_update);

	$_SESSION['msgbox_info'] = 1;
	$_SESSION['text_msgbox_info'] = 'Registro modificado correctamente.';

	header ('Location: /modules/administratives');
?>