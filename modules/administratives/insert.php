<?php
include_once '../security.php';
include_once '../conexion.php';


require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin.php');

if (empty($_POST['txtuserid'])) {
	header('Location: /');
	exit();
}

$sql_insert = "INSERT INTO administratives(user, name, surnames, curp, rfc, gender, date_of_birth, phone, address, level_studies, employment, observations) VALUES('" . $_POST['txtuserid'] . "', '" . $_POST['txtname'] . "', '" . $_POST['txtsurnames'] . "', '" . $_POST['txtcurp'] . "', '" . $_POST['txtrfc'] . "', '" . $_POST['selectgender'] . "', '" . $_POST['dateofbirth'] . "', '" . $_POST['txtphone'] . "', '" . $_POST['txtaddress'] . "', '" . $_POST['selectlevelstudies'] . "', '" . $_POST['txtemployment'] . "', '" . $_POST['txtobservation'] . "')";

if (mysqli_query($conexion, $sql_insert)) {
	$_SESSION['msgbox_error'] = 0;
	$_SESSION['msgbox_info'] = 1;
	$_SESSION['text_msgbox_info'] = 'Personal administrativo agregado.';
} else {
	$_SESSION['msgbox_info'] = 0;
	$_SESSION['msgbox_error'] = 1;
	$_SESSION['text_msgbox_error'] = 'Error al guardar.';
}

header('Location: /modules/administratives');
