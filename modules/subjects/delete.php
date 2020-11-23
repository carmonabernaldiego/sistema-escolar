<?php
	include_once '../security.php';
	include_once '../conexion.php';
	include_once '../functions.php';

	require_once($_SESSION['raiz'].'/modules/sections/role-access-admin-editor.php');
	
	if (empty($_POST['txtsubject']))
	{
		header('Location: /');
		exit();
	}

	$sql_delete = "DELETE FROM subjects WHERE subject = '".$_POST['txtsubject']."'";

	mysqli_query($conexion, $sql_delete);

	$_SESSION['msgbox_info'] = 1;
	$_SESSION['text_msgbox_info'] = 'Registro eliminado correctamente.';

	header ('Location: /modules/subjects');
?>