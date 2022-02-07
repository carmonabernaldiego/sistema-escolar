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

		$sql_update = "UPDATE administratives SET name = '" . $_POST['txtname'] . "', surnames = '" . $_POST['txtsurnames'] . "', curp = '" . $_POST['txtcurp'] . "', rfc = '" . $_POST['txtrfc'] . "', date_of_birth = '" . $_POST['dateofbirth'] . "', gender = '" . $_POST['selectgender'] . "', phone = '" . $_POST['txtphone'] . "', address = '" . $_POST['txtaddress'] . "', level_studies = '" . $_POST['selectlevelstudies'] . "', occupation = '" . $_POST['txtoccupation'] . "', observations = '" . $_POST['txtobservation'] . "', updated_at = '" . $date . "' WHERE user = '" . $_POST['txtuserid'] . "'";

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