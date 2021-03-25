<?php
include_once '../security.php';
include_once '../conexion.php';


require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin.php');

if (empty($_POST['txtuserid'])) {
	header('Location: /');
	exit();
}

$sql_update = "UPDATE administratives SET name = '" . $_POST['txtname'] . "', surnames = '" . $_POST['txtsurnames'] . "', curp = '" . $_POST['txtcurp'] . "', rfc = '" . $_POST['txtrfc'] . "', address = '" . $_POST['txtaddress'] . "', phone = '" . $_POST['txtphone'] . "', level_studies = '" . $_POST['selectlevelstudies'] . "', documentation = '" . $_POST['selectdocumentation'] . "', observations = '" . $_POST['txtobservation'] . "' WHERE user = '" . $_POST['txtuserid'] . "'";

if (mysqli_query($conexion, $sql_update)) {
	$_SESSION['msgbox_error'] = 0;
	$_SESSION['msgbox_info'] = 1;
	$_SESSION['text_msgbox_info'] = 'Registro modificado correctamente.';
} else {
	$_SESSION['msgbox_info'] = 0;
	$_SESSION['msgbox_error'] = 1;
	$_SESSION['text_msgbox_error'] = 'Error al modificar datos en tabla.';
}

header('Location: /modules/administratives');