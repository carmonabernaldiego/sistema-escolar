<?php
include_once '../security.php';
include_once '../conexion.php';


require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

if (empty($_POST['txtsubject'])) {
	header('Location: /');
	exit();
}

$_POST['txtsubjectdescription'] = mysqli_real_escape_string($conexion, $_POST['txtsubjectdescription']);

$sql_update = "UPDATE subjects SET career = '" . $_SESSION['temp_subject_career_id'] . "', name = '" . $_POST['txtsubjectname'] . "', semester = '" . $_POST['txtsubjectsemester'] . "', description = '" . $_POST['txtsubjectdescription'] . "', user_teachers = '" . $_SESSION['temp_select_teachers'] . "' WHERE subject = '" . $_POST['txtsubject'] . "'";

if (mysqli_query($conexion, $sql_update)) {
	$_SESSION['msgbox_error'] = 0;
	$_SESSION['msgbox_info'] = 1;
	$_SESSION['text_msgbox_info'] = 'Asignatura actualizada.';
} else {
	$_SESSION['msgbox_info'] = 0;
	$_SESSION['msgbox_error'] = 1;
	$_SESSION['text_msgbox_error'] = 'Error al actualizar.';
}

header('Location: /modules/subjects');