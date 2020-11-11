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

	$sql_insert = "INSERT INTO subjects(subject, school_period, name, description, semester, user_teacher) VALUES('".$_POST['txtsubject']."', '".$_SESSION['school_period']."', '".$_POST['txtsubjectname']."', '".$_POST['txtsubjectdescription']."', '".$_POST['txtsubjectsemester']."', '".$_POST['selectuserteacher']."')";

	mysqli_query($conexion, $sql_insert);

	$_SESSION['msgbox_info'] = 1;
	$_SESSION['text_msgbox_info'] = 'Registro cargado correctamente.';

	header ('Location: /modules/subjects');
?>