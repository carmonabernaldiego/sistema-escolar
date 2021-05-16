<?php
include_once '../security.php';
include_once '../conexion.php';


require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin.php');

if (empty($_POST['txtspid'])) {
	header('Location: /');
	exit();
}

$_POST['txtspid'] = trim($_POST['txtspid']);

if ($_POST['txtspid'] == '') {
	$_SESSION['msgbox_info'] = 0;
	$_SESSION['msgbox_error'] = 1;
	$_SESSION['text_msgbox_error'] = 'Ingrese un ID correcto.';
	header('Location: /modules/school_periods');
	exit();
}

if ($_POST['selectcurrent'] == '1') {
	$_SESSION['school_period'] = $_POST['txtspid'];

	$sql_update = "UPDATE school_periods SET current = '0' WHERE school_period != '" . $_POST['txtspid'] . "'";

	mysqli_query($conexion, $sql_update);
}

$sql_insert = "INSERT INTO school_periods(school_period, start_date, end_date, active, current) VALUES('" . $_POST['txtspid'] . "', '" . $_POST['datespstart'] . "', '" . $_POST['datespend'] . "', '" . $_POST['selectactive'] . "', '" . $_POST['selectcurrent'] . "')";

if (mysqli_query($conexion, $sql_insert)) {
	$_SESSION['msgbox_error'] = 0;
	$_SESSION['msgbox_info'] = 1;
	$_SESSION['text_msgbox_info'] = 'Periodo escolar agregado';
} else {
	$_SESSION['msgbox_info'] = 0;
	$_SESSION['msgbox_error'] = 1;
	$_SESSION['text_msgbox_error'] = 'Error al guardar';
}

header('Location: /modules/school_periods');