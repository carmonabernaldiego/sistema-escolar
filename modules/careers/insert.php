<?php
include_once '../security.php';
include_once '../conexion.php';


require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

if (empty($_POST['txtcareer'])) {
	header('Location: /');
	exit();
}

$_POST['txtcareer'] = trim($_POST['txtcareer']);

if ($_POST['txtcareer'] == '') {
	$_SESSION['msgbox_info'] = 0;
	$_SESSION['msgbox_error'] = 1;
	$_SESSION['text_msgbox_error'] = 'Ingrese un ID correcto.';
	header('Location: /modules/careers');
	exit();
}

$sql = "SELECT * FROM careers WHERE career = '" . $_POST['txtcareer'] . "'";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['msgbox_info'] = 0;
		$_SESSION['msgbox_error'] = 1;
		$_SESSION['text_msgbox_error'] = 'La carrera que intenta crear ya éxiste.';

		header('Location: /modules/careers');
	} else {
		$_POST['txtcareerdescription'] = mysqli_real_escape_string($conexion, $_POST['txtcareerdescription']);
		$sql_insert = "INSERT INTO careers(career, name, description) VALUES('" . $_POST['txtcareer'] . "', '" . $_POST['txtcareername'] . "', '" . $_POST['txtcareerdescription'] . "')";

		if (mysqli_query($conexion, $sql_insert)) {
			$_SESSION['msgbox_error'] = 0;
			$_SESSION['msgbox_info'] = 1;
			$_SESSION['text_msgbox_info'] = 'Carrera agregada.';
		} else {
			$_SESSION['msgbox_info'] = 0;
			$_SESSION['msgbox_error'] = 1;
			$_SESSION['text_msgbox_error'] = 'Error al guardar.';
		}

		header('Location: /modules/careers');
	}
}