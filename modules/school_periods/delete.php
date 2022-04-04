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

$sql = "SELECT school_period FROM school_periods WHERE school_period = '" . $_POST['txtspid'] . "'";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		$sql_delete = "DELETE FROM school_periods WHERE school_period = '" . $_POST['txtspid'] . "'";

		if (mysqli_query($conexion, $sql_delete)) {
			$sql = "SELECT school_period FROM school_periods WHERE active = 1 ORDER BY school_period DESC";

			if ($result = $conexion->query($sql)) {
				if ($row = mysqli_fetch_array($result)) {
					$_SESSION['school_period'] = $row['school_period'];
					setcookie('school_period', $row['school_period'], time() + 365 * 24 * 60 * 60, "/");

					$sql_update = "UPDATE school_periods SET current = '1' WHERE school_period = '" . $row['school_period'] . "'";

					mysqli_query($conexion, $sql_update);
				} else {
					$_SESSION['school_period'] = ' ? ';
				}
			}
			Error('Periodo escolar eliminado.');
		} else {
			Error('Error al eliminar.');
		}
	} else {
		Error('Error al eliminar.');
	}
}
header('Location: /modules/school_periods');
exit();