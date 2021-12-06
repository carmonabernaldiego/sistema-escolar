<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

$sql = "SELECT COUNT(career) AS total FROM careers";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		$tpages = ceil($row['total'] / $max);
	}
}

if (!empty($_POST['search'])) {
	$_POST['search'] = trim($_POST['search']);
	$_POST['search'] = mysqli_real_escape_string($conexion, $_POST['search']);

	$_SESSION['career'] = array();
	$_SESSION['career_name'] = array();

	$i = 0;

	$sql = "SELECT * FROM careers WHERE career LIKE '%" . $_POST['search'] . "%' OR name LIKE '%" . $_POST['search'] . "%' ORDER BY name";

	if ($result = $conexion->query($sql)) {
		while ($row = mysqli_fetch_array($result)) {
			$_SESSION['career'][$i] = $row['career'];
			$_SESSION['career_name'][$i] = $row['name'];

			$i += 1;
		}
	}
	$_SESSION['total_careers'] = count($_SESSION['career']);
} else {
	$_SESSION['career'] = array();
	$_SESSION['career_name'] = array();

	$i = 0;

	$sql = "SELECT * FROM careers ORDER BY name LIMIT $inicio, $max";

	if ($result = $conexion->query($sql)) {
		while ($row = mysqli_fetch_array($result)) {
			$_SESSION['career'][$i] = $row['career'];
			$_SESSION['career_name'][$i] = $row['name'];

			$i += 1;
		}
	}
	$_SESSION['total_careers'] = count($_SESSION['career']);
}