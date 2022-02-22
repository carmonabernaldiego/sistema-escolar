<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin.php');

$sql = "SELECT COUNT(school_period) AS total FROM school_periods";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		$tpages = ceil($row['total'] / $max);
	}
}

if (!empty($_POST['search'])) {
	$_POST['search'] = trim($_POST['search']);
	$_POST['search'] = mysqli_real_escape_string($conexion, $_POST['search']);

	$_SESSION['sp_id'] = array();
	$_SESSION['sp_name'] = array();
	$_SESSION['sp_active'] = array();
	$_SESSION['sp_current'] = array();

	$i = 0;

	$sql = "SELECT * FROM school_periods WHERE school_period LIKE '%" . $_POST['search'] . "%' OR name LIKE '%" . $_POST['search'] . "%' OR start_date LIKE '%" . $_POST['search'] . "%' OR end_date LIKE '%" . $_POST['search'] . "%' ORDER BY school_period DESC";

	if ($result = $conexion->query($sql)) {
		while ($row = mysqli_fetch_array($result)) {
			$_SESSION['sp_id'][$i] = $row['school_period'];
			$_SESSION['sp_name'][$i] = $row['name'];
			$_SESSION['sp_current'][$i] = $row['current'];

			if ($row['active'] == 1) {
				$_SESSION['sp_active'][$i] = 'Si';
			} else {
				$_SESSION['sp_active'][$i] = 'No';
			}

			if ($row['current'] == 1) {
				$_SESSION['sp_current'][$i] = 'Si';
			} else {
				$_SESSION['sp_current'][$i] = 'No';
			}

			$i += 1;
		}
	}
	$_SESSION['total_school_periods'] = count($_SESSION['sp_id']);
} else {
	$_SESSION['sp_id'] = array();
	$_SESSION['sp_name'] = array();
	$_SESSION['sp_active'] = array();
	$_SESSION['sp_current'] = array();

	$i = 0;

	$sql = "SELECT * FROM school_periods ORDER BY school_period DESC LIMIT $inicio, $max";

	if ($result = $conexion->query($sql)) {
		while ($row = mysqli_fetch_array($result)) {
			$_SESSION['sp_id'][$i] = $row['school_period'];
			$_SESSION['sp_name'][$i] = $row['name'];
			$_SESSION['sp_current'][$i] = $row['current'];

			if ($row['active'] == 1) {
				$_SESSION['sp_active'][$i] = 'Si';
			} else {
				$_SESSION['sp_active'][$i] = 'No';
			}

			if ($row['current'] == 1) {
				$_SESSION['sp_current'][$i] = 'Si';
			} else {
				$_SESSION['sp_current'][$i] = 'No';
			}

			$i += 1;
		}
	}
	$_SESSION['total_school_periods'] = count($_SESSION['sp_id']);
}