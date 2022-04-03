<?php
include_once '../security.php';
include_once '../conexion.php';
include_once '../notif_info_msgbox.php';

require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin.php');

$_POST['txtspid'] = trim($_POST['txtspid']);

if (empty($_POST['txtspid'])) {
	header('Location: /');
	exit();
}
if ($_POST['txtspid'] == '') {
	Error('Ingrese un ID correcto.');
	header('Location: /modules/school_periods');
	exit();
}

$dateStart = new DateTime($_POST['datespstart']);
$dateEnd = new DateTime($_POST['datespend']);
$diff = $dateStart->diff($dateEnd);
$days = $diff->invert;

if ($days > 0) {
	Error('La fecha en que termina el periodo escolar, debe ser mayor que la fecha de inicio.');
	header('Location: /modules/school_periods');
	exit();
} else {
	if ($_POST['selectcurrent'] == '0' && $_SESSION['school_period'] == $_POST['txtspid']) {
		Error('Error al actualizar, seleccioné otro periodo actual.');
	} else {
		$date = date('Y-m-d H:i:s');

		$sql_update = "UPDATE school_periods SET name = '" . trim($_POST['txtspname']) . "', start_date = '" . trim($_POST['datespstart']) . "', end_date = '" . trim($_POST['datespend']) . "', active = '" . trim($_POST['selectactive']) . "', current = '" . trim($_POST['selectcurrent']) . "', updated_at = '" . $date . "' WHERE school_period = '" . trim($_POST['txtspid']) . "'";

		if (mysqli_query($conexion, $sql_update)) {
			if ($_POST['selectcurrent'] == '1') {
				$sql_update = "UPDATE school_periods SET current = '0' WHERE school_period != '" . $_POST['txtspid'] . "'";

				if (mysqli_query($conexion, $sql_update)) {
					$_SESSION['school_period'] = $_POST['txtspid'];

					Info('Periodo escolar actualizado.');
				} else {
					Error('Error al actualizar.');
				}
			} else {
				Info('Periodo escolar actualizado.');
			}
		} else {
			Error('Error al actualizar.');
		}
	}
	header('Location: /modules/school_periods');
	exit();
}