<?php
include_once '../security.php';
include_once '../conexion.php';

require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin.php');

$_POST['txtspid'] = trim($_POST['txtspid']);

if (empty($_POST['txtspid'])) {
	header('Location: /');
	exit();
}
if ($_POST['txtspid'] == '') {
	$_SESSION['msgbox_info'] = 0;
	$_SESSION['msgbox_error'] = 1;
	$_SESSION['text_msgbox_error'] = 'Ingrese un ID correcto.';
	header('Location: /modules/school_periods');
	exit();
}

$dateStart = new DateTime($_POST['datespstart']);
$dateEnd = new DateTime($_POST['datespend']);
$diff = $dateStart->diff($dateEnd);
$days = $diff->invert;

if ($days > 0) {
	$_SESSION['msgbox_info'] = 0;
	$_SESSION['msgbox_error'] = 1;
	$_SESSION['text_msgbox_error'] = 'La fecha en que termina el periodo escolar, debe ser mayor que la fecha de inicio.';
	header('Location: /modules/school_periods');
	exit();
} else {
	$sql = "SELECT * FROM school_periods WHERE school_period = '" . $_POST['txtspid'] . "'";

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

			$sql_insert = "INSERT INTO school_periods(school_period, start_date, end_date, active, current, created_at) VALUES('" . $_POST['txtspid'] . "', '" . $_POST['datespstart'] . "', '" . $_POST['datespend'] . "', '" . $_POST['selectactive'] . "', '" . $_POST['selectcurrent'] . "', '" . $date . "')";

			if (mysqli_query($conexion, $sql_insert)) {
				if ($_POST['selectcurrent'] == '1') {
					$_SESSION['school_period'] = $_POST['txtspid'];

					$sql_update = "UPDATE school_periods SET current = '0' WHERE school_period != '" . $_POST['txtspid'] . "'";
					
					mysqli_query($conexion, $sql_update);
				}
				$_SESSION['msgbox_error'] = 0;
				$_SESSION['msgbox_info'] = 1;
				$_SESSION['text_msgbox_info'] = 'Periodo escolar agregado.';
			} else {
				$_SESSION['msgbox_info'] = 0;
				$_SESSION['msgbox_error'] = 1;
				$_SESSION['text_msgbox_error'] = 'Error al guardar.';
			}
			header('Location: /modules/school_periods');
			exit();
		}
	}
}