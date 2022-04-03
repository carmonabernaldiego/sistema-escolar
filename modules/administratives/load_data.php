<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin.php');

$sql = "SELECT COUNT(user) AS total FROM administratives";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		$tpages = ceil($row['total'] / $max);
	}
}

if (!empty($_POST['search'])) {
	$_POST['search'] = trim($_POST['search']);
	$_POST['search'] = mysqli_real_escape_string($conexion, $_POST['search']);

	$_SESSION['user_id'] = array();
	$_SESSION['administrative_name'] = array();
	$_SESSION['administrative_curp'] = array();
	$_SESSION['administrative_phone'] = array();

	$i = 0;

	$sql = "SELECT * FROM administratives WHERE user LIKE '%" . $_POST['search'] . "%' OR name LIKE '%" . $_POST['search'] . "%' OR surnames LIKE '%" . $_POST['search'] . "%' OR CURP LIKE '%" . $_POST['search'] . "%' OR phone LIKE '%" . $_POST['search'] . "%' ORDER BY name";

	if ($result = $conexion->query($sql)) {
		while ($row = mysqli_fetch_array($result)) {
			$_SESSION['user_id'][$i] = $row['user'];
			$_SESSION['administrative_curp'][$i] = $row['curp'];
			$_SESSION['administrative_name'][$i] = $row['name'] . ' ' . $row['surnames'];
			$_SESSION['administrative_phone'][$i] = $row['phone'];

			$i += 1;
		}
	}
	$_SESSION['total_users'] = count($_SESSION['user_id']);
} else {
	$_SESSION['user_id'] = array();
	$_SESSION['administrative_name'] = array();
	$_SESSION['administrative_curp'] = array();
	$_SESSION['administrative_phone'] = array();

	$i = 0;

	$sql = "SELECT * FROM administratives ORDER BY created_at DESC, user, name LIMIT $inicio, $max";

	if ($result = $conexion->query($sql)) {
		while ($row = mysqli_fetch_array($result)) {
			$_SESSION['user_id'][$i] = $row['user'];
			$_SESSION['administrative_curp'][$i] = $row['curp'];
			$_SESSION['administrative_name'][$i] = $row['name'] . ' ' . $row['surnames'];
			$_SESSION['administrative_phone'][$i] = $row['phone'];

			$i += 1;
		}
	}
	$_SESSION['total_users'] = count($_SESSION['user_id']);
}