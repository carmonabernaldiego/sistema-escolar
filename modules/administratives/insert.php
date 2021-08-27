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
		Error('Este ID ya está en uso. Elige otro.');
		header('Location: /modules/administratives');
		exit();
	} else {
		$date = date('Y-m-d H:i:s');

		$sql_insert_users = "INSERT INTO users(user_id, pass, permissions, image, created_at) VALUES('" . $_POST['txtuserid'] . "', '" . $_POST['txtuserid'] . "', 'editor', 'user.png','" . $date . "')";

		if (mysqli_query($conexion, $sql_insert_users)) {
			$sql_insert_administratives = "INSERT INTO administratives(user, name, surnames, curp, rfc, gender, date_of_birth, phone, address, level_studies, occupation, observations, created_at) VALUES('" . $_POST['txtuserid'] . "', '" . $_POST['txtname'] . "', '" . $_POST['txtsurnames'] . "', '" . $_POST['txtcurp'] . "', '" . $_POST['txtrfc'] . "', '" . $_POST['selectgender'] . "', '" . $_POST['dateofbirth'] . "', '" . $_POST['txtphone'] . "', '" . $_POST['txtaddress'] . "', '" . $_POST['selectlevelstudies'] . "', '" . $_POST['txtoccupation'] . "', '" . $_POST['txtobservation'] . "', '" . $date . "')";

			if (mysqli_query($conexion, $sql_insert_administratives)) {
				Info('Personal administrativo agregado.');
			} else {
				$sql_delete_users = "DELETE FROM users WHERE user_id = '" . $_POST['txtuserid'] . "'";
				Error('Error al guardar.');
			}
		} else {
			Error('Error al guardar.');
		}
		header('Location: /modules/administratives');
	}
}