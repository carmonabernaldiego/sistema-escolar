<?php
	include_once '../security.php';
	include_once '../conexion.php';
	include_once '../functions.php';
	
	if ($_SESSION['permissions'] != 'admin')
	{
		header('Location: /');
		exit();
	}
	
	if (empty($_POST['txtsubject']))
	{
		header('Location: /');
		exit();
	}

	$sql_update = "UPDATE subjects SET name = '".$_POST['txtsubjectname']."', description = '".$_POST['txtsubjectdescription']."', semester = '".$_POST['txtsubjectsemester']."', user_teacher = '".$_POST['selectteacheruser']."' WHERE subject = '".$_POST['txtsubject']."'";

	mysqli_query($conexion, $sql_update);

	$_SESSION['msgbox_info'] = 1;
	$_SESSION['text_msgbox_info'] = 'Registro modificado correctamente.';

	header ('Location: /modules/subjects');
?>