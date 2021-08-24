<?php
include_once '../security.php';
include_once '../conexion.php';

require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin.php');

$_POST['txtuserid'] = trim($_POST['txtuserid']);

if (empty($_POST['txtuserid'])) {
	header('Location: /');
	exit();
}
if ($_POST['txtuserid'] == '') {
	$_SESSION['msgbox_info'] = 0;
	$_SESSION['msgbox_error'] = 1;
	$_SESSION['text_msgbox_error'] = 'Ingrese un ID correcto.';
	header('Location: /modules/administratives');
	exit();
}

$sql = "SELECT * FROM administratives WHERE user = '" . $_POST['txtuserid'] . "'";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['msgbox_info'] = 0;
		$_SESSION['msgbox_error'] = 1;
		$_SESSION['text_msgbox_error'] = 'Este ID ya está en uso. Elige otro.';
		header('Location: /modules/school_periods');
		exit();
	} else {
		$timestamp = '1299762201428';
		$date = date('Y-m-d H:i:s');

		$sql_insert = "INSERT INTO administratives(user, name, surnames, curp, rfc, gender, date_of_birth, phone, address, level_studies, employment, observations, created_at) VALUES('" . $_POST['txtuserid'] . "', '" . $_POST['txtname'] . "', '" . $_POST['txtsurnames'] . "', '" . $_POST['txtcurp'] . "', '" . $_POST['txtrfc'] . "', '" . $_POST['selectgender'] . "', '" . $_POST['dateofbirth'] . "', '" . $_POST['txtphone'] . "', '" . $_POST['txtaddress'] . "', '" . $_POST['selectlevelstudies'] . "', '" . $_POST['txtemployment'] . "', '" . $_POST['txtobservation'] . "', '" . $date . "')";

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
	}
}