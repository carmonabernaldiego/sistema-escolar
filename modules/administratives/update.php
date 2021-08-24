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
		$timestamp = '1299762201428';
		$date = date('Y-m-d H:i:s');

		$sql_update = "UPDATE administratives SET name = '" . $_POST['txtname'] . "', surnames = '" . $_POST['txtsurnames'] . "', curp = '" . $_POST['txtcurp'] . "', rfc = '" . $_POST['txtrfc'] . "', gender = '" . $_POST['selectgender'] . "', date_of_birth = '" . $_POST['dateofbirth'] . "', phone = '" . $_POST['txtphone'] . "', address = '" . $_POST['txtaddress'] . "', level_studies = '" . $_POST['selectlevelstudies'] . "', employment = '" . $_POST['txtemployment'] . "', observations = '" . $_POST['txtobservation'] . "', updated_at = '" . $date . "' WHERE user = '" . $_POST['txtuserid'] . "'";

		if (mysqli_query($conexion, $sql_update)) {
			$_SESSION['msgbox_error'] = 0;
			$_SESSION['msgbox_info'] = 1;
			$_SESSION['text_msgbox_info'] = 'Personal administrativo actualizado.';
		} else {
			$_SESSION['msgbox_info'] = 0;
			$_SESSION['msgbox_error'] = 1;
			$_SESSION['text_msgbox_error'] = 'Error al actualizar.';
		}

		header('Location: /modules/administratives');
		exit();
	} else {
		$_SESSION['msgbox_info'] = 0;
		$_SESSION['msgbox_error'] = 1;
		$_SESSION['text_msgbox_error'] = 'Este ID de administrativo no existe.';
		header('Location: /modules/school_periods');
	}
}