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
	header('Location: /modules/students');
	exit();
}

$sql = "SELECT * FROM students WHERE user = '" . $_POST['txtuserid'] . "'";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		$date = date('Y-m-d H:i:s');
	
		$sql_update = "UPDATE students SET name = '" . trim($_POST['txtname']) . "', surnames = '" . trim($_POST['txtsurnames']) . "', curp = '" . trim($_POST['txtcurp']) . "', rfc = '" . trim($_POST['txtrfc']) . "', date_of_birth = '" . trim($_POST['dateofbirth']) . "', gender = '" . trim($_POST['selectGender']) . "', phone = '" . trim($_POST['txtphone']) . "', address = '" . trim($_POST['txtaddress']) . "', career = '" . trim($_POST['selectCareer']) . "', documentation = '" . trim($_POST['selectDocumentation']) . "', admission_date = '" . trim($_POST['dateadmission']) . "', updated_at = '" . $date . "' WHERE user = '" . trim($_POST['txtuserid']) . "'";

		if (mysqli_query($conexion, $sql_update)) {
			Info('Alumno actualizado.');
		} else {
			Error('Error al actualizar.');
		}
		
		header('Location: /modules/students');
		exit();
	} else {
		Error('Este ID de alumno no existe.');
		header('Location: /modules/students');
		exit();
	}
}