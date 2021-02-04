<?php
	include_once '../security.php';
	include_once '../conexion.php';
	
	
	require_once($_SESSION['raiz'].'/modules/sections/role-access-admin-editor.php');
	
	if (empty($_POST['txtsubject']))
	{
		header('Location: /');
		exit();
	}

	$sql_update = "UPDATE subjects SET name = '".$_POST['txtsubjectname']."', description = '".$_POST['txtsubjectdescription']."', semester = '".$_POST['txtsubjectsemester']."', user_teacher = '".$_POST['selectteacheruser']."' WHERE subject = '".$_POST['txtsubject']."'";

	if(mysqli_query($conexion, $sql_update))
	{
		$_SESSION['msgbox_error'] = 0;
		$_SESSION['msgbox_info'] = 1;
		$_SESSION['text_msgbox_info'] = 'Registro modificado correctamente.';
	}
	else
	{
		$_SESSION['msgbox_info'] = 0;
		$_SESSION['msgbox_error'] = 1;
		$_SESSION['text_msgbox_error'] = 'Error al modificar datos en tabla.';
	}

	header ('Location: /modules/subjects');
?>