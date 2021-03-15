<?php
	include_once '../security.php';
	include_once '../conexion.php';
	

	require_once($_SESSION['raiz'].'/modules/sections/role-access-admin-editor.php');
	
	if (empty($_POST['txtsubject']))
	{
		header('Location: /');
		exit();
	}

	$sql = "SELECT * FROM subjects WHERE subject = '".$_POST['txtsubject']."' AND school_period = '".$_SESSION['school_period']."'";

	if ($result = $conexion -> query($sql))
	{
		if ($row = mysqli_fetch_array($result))
		{
			$_SESSION['msgbox_info'] = 0;
			$_SESSION['msgbox_error'] = 1;
			$_SESSION['text_msgbox_error'] = 'La asignatura que intenta crear ya éxiste.';

			header ('Location: /modules/subjects');
		}
		else
		{
			$_POST['txtsubjectdescription'] = mysqli_real_escape_string($conexion, $_POST['txtsubjectdescription']);
			$sql_insert = "INSERT INTO subjects(subject, school_period, name, description, semester, user_teacher) VALUES('".$_POST['txtsubject']."', '".$_SESSION['school_period']."', '".$_POST['txtsubjectname']."', '".$_POST['txtsubjectdescription']."', '".$_POST['txtsubjectsemester']."', '".$_POST['selectuserteacher']."')";

			if(mysqli_query($conexion, $sql_insert))
			{
				$_SESSION['msgbox_error'] = 0;
				$_SESSION['msgbox_info'] = 1;
				$_SESSION['text_msgbox_info'] = 'Registro cargado correctamente.';
			}
			else
			{
				$_SESSION['msgbox_info'] = 0;
				$_SESSION['msgbox_error'] = 1;
				$_SESSION['text_msgbox_error'] = 'Error al guardar datos en tabla.';
			}

			header ('Location: /modules/subjects');
		}
	}
?>