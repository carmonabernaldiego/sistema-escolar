<?php
include_once '../security.php';
include_once '../conexion.php';


require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

if (empty($_POST['txtsubject'])) {
	header('Location: /');
	exit();
}

$sql = "SELECT * FROM subjects WHERE subject = '" . $_POST['txtsubject'] . "'";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['msgbox_info'] = 0;
		$_SESSION['msgbox_error'] = 1;
		$_SESSION['text_msgbox_error'] = 'La asignatura que intenta crear ya éxiste.';

		header('Location: /modules/subjects');
	} else {
		$_POST['txtsubjectdescription'] = mysqli_real_escape_string($conexion, $_POST['txtsubjectdescription']);
		$sql_insert = "INSERT INTO subjects(subject, career, name, semester, description, user_teachers) VALUES('" . $_POST['txtsubject'] . "', '" . $_SESSION['temp_subject_career_id'] . "', '" . $_POST['txtsubjectname'] . "', '" . $_POST['txtsubjectsemester'] . "', '" . $_POST['txtsubjectdescription'] . "', '" . $_SESSION['temp_select_teachers'] . "')";

		if (mysqli_query($conexion, $sql_insert)) {
			unset($_SESSION['temp_subject']);
			unset($_SESSION['temp_subject_name']);
			unset($_SESSION['temp_subject_semester']);
			unset($_SESSION['temp_subject_description']);
			unset($_SESSION['temp_subject_career_id']);
			unset($_SESSION['temp_subject_career_name']);
			unset($_SESSION['subject_teachers_user']);
			unset($_SESSION['subject_teachers_name']);
			unset($_SESSION['temp_select_teachers']);

			$_SESSION['msgbox_error'] = 0;
			$_SESSION['msgbox_info'] = 1;
			$_SESSION['text_msgbox_info'] = 'Asignatura agregada.';
		} else {
			$_SESSION['msgbox_info'] = 0;
			$_SESSION['msgbox_error'] = 1;
			$_SESSION['text_msgbox_error'] = 'Error al guardar.';
		}

		header('Location: /modules/subjects');
	}
}