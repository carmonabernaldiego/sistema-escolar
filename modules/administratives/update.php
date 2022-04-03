<?php
include_once '../security.php';
include_once '../conexion.php';
include_once '../notif_info_msgbox.php';

require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin.php');

$_POST['txtuserid'] = trim($_POST['txtuserid']);

if (empty($_POST['txtuserid'])) {
	header('Location: /');
	exit();
}
if ($_POST['txtuserid'] == '') {
	Error('Ingrese un ID correcto.');
	header('Location: /modules/administratives');
	exit();
}

$sql = "SELECT * FROM administratives WHERE user = '" . $_POST['txtuserid'] . "'";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		$date = date('Y-m-d H:i:s');

		$sql_update = "UPDATE administratives SET name = '" . trim($_POST['txtname']) . "', surnames = '" . trim($_POST['txtsurnames']) . "', curp = '" . trim($_POST['txtcurp']) . "', rfc = '" . trim($_POST['txtrfc']) . "', date_of_birth = '" . trim($_POST['dateofbirth']) . "', gender = '" . trim($_POST['selectgender']) . "', phone = '" . trim($_POST['txtphone']) . "', address = '" . trim($_POST['txtaddress']) . "', level_studies = '" . trim($_POST['selectlevelstudies']) . "', occupation = '" . trim($_POST['txtoccupation']) . "', observations = '" . trim($_POST['txtobservation']) . "', updated_at = '" . $date . "' WHERE user = '" . trim($_POST['txtuserid']) . "'";

		if (mysqli_query($conexion, $sql_update)) {
			Info('Personal administrativo actualizado.');
		} else {
			Error('Error al actualizar.');
		}

		header('Location: /modules/administratives');
		exit();
	} else {
		Error('Este ID de administrativo no existe.');
		header('Location: /modules/administratives');
		exit();
	}
}