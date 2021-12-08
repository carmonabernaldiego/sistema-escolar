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

$_POST['datespstart'] = str_replace('/', '-', $_POST['datespstart']);
$_POST['datespstart'] = date('Y-m-d', strtotime($_POST['datespstart']));
$_POST['datespend'] = str_replace('/', '-', $_POST['datespend']);
$_POST['datespend'] = date('Y-m-d', strtotime($_POST['datespend']));

if ($days > 0) {
	Error('La fecha en que termina el periodo escolar, debe ser mayor que la fecha de inicio.');
	header('Location: /modules/school_periods');
	exit();
} else {
	$sql = "SELECT school_period FROM school_periods WHERE school_period = '" . $_POST['txtspid'] . "'";

	if ($result = $conexion->query($sql)) {
		if ($row = mysqli_fetch_array($result)) {
			Error('Este ID ya está en uso. Elige otro.');
			header('Location: /modules/school_periods');
			exit();
		} else {
			$date = date('Y-m-d H:i:s');

			$sql_insert = "INSERT INTO school_periods(school_period, start_date, end_date, active, current, created_at) VALUES('" . $_POST['txtspid'] . "', '" . $_POST['datespstart'] . "', '" . $_POST['datespend'] . "', '" . $_POST['selectactive'] . "', '" . $_POST['selectcurrent'] . "', '" . $date . "')";

			if (mysqli_query($conexion, $sql_insert)) {
				if ($_POST['selectcurrent'] == '1') {
					$_SESSION['school_period'] = $_POST['txtspid'];

					$sql_update = "UPDATE school_periods SET current = '0' WHERE school_period != '" . $_POST['txtspid'] . "'";

					mysqli_query($conexion, $sql_update);
				}
				Info('Periodo escolar agregado.');
			} else {
				Error('Error al guardar.');
			}
			header('Location: /modules/school_periods');
			exit();
		}
	}
}