<?php
include_once '../security.php';
include_once '../conexion.php';

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
			$sql = "SELECT school_period, current FROM school_periods WHERE current = 1";

			if ($result = $conexion->query($sql)) {
				if ($row = mysqli_fetch_array($result)) {
					$_SESSION['school_period'] = $row['school_period'];
					setcookie('school_period', $row['school_period'], time() + 365 * 24 * 60 * 60, "/");
				}
			}

			$_SESSION['msgbox_info'] = 0;
			$_SESSION['msgbox_error'] = 1;
			$_SESSION['text_msgbox_error'] = 'Periodo escolar eliminado.';
		} else {
			$_SESSION['msgbox_info'] = 0;
			$_SESSION['msgbox_error'] = 1;
			$_SESSION['text_msgbox_error'] = 'Error al eliminar.';
		}

		header('Location: /modules/school_periods');
	}
}