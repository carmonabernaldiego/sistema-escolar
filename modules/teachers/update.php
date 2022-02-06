<?php
include_once '../security.php';
include_once '../conexion.php';
include_once '../notif_info_msgbox.php';

require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

$_POST['txtuserid'] = trim($_POST['txtuserid']);

if (empty($_POST['txtuserid'])) {
	header('Location: /');
	exit();
}
if ($_POST['txtuserid'] == '') {
	Error('Ingrese un ID correcto.');
	header('Location: /modules/teachers');
	exit();
}

$sql = "SELECT * FROM teachers WHERE user = '" . $_POST['txtuserid'] . "'";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		$date = date('Y-m-d H:i:s');
		$careers = '';

		for ($i = 0; $i < count($_POST["selectUserCareers"]); $i++) {
			$careers .= $_POST["selectUserCareers"][$i] . ',';
		}

		$careers = trim($careers, ',');

		$sql_update = "UPDATE teachers SET name = '" . $_POST['txtname'] . "', surnames = '" . $_POST['txtsurnames'] . "', curp = '" . $_POST['txtcurp'] . "', rfc = '" . $_POST['txtrfc'] . "', date_of_birth = '" . $_POST['dateofbirth'] . "', gender = '" . $_POST['selectgender'] . "', phone = '" . $_POST['txtphone'] . "', address = '" . $_POST['txtaddress'] . "', level_studies = '" . $_POST['selectlevelstudies'] . "', specialty = '" . $_POST['txtspecialty'] . "', career = '" . $careers . "', updated_at = '" . $date . "' WHERE user = '" . $_POST['txtuserid'] . "'";

		if (mysqli_query($conexion, $sql_update)) {
			Info('Docente actualizado.');
		} else {
			Error('Error al actualizar.');
		}
		
		header('Location: /modules/teachers');
		exit();
	} else {
		Error('Este ID de docente no existe.');
		header('Location: /modules/teachers');
	}
}