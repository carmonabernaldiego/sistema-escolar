<?php
include_once '../modules/security.php';
include_once '../modules/conexion.php';

require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

if (empty($_POST['txtuseridUpdate'])) {
	header('Location: /');
	exit();
} else {
	$pass = mysqli_real_escape_string($conexion, $_POST['txtuserpassOldUpdate']);

	$sql = "SELECT * FROM users WHERE user = '" . $_POST['txtuseridUpdate'] . "' and BINARY pass = '" . $pass . "' LIMIT 1";

	if ($result = $conexion->query($sql)) {
		if ($row = mysqli_fetch_array($result)) {
			$sql = "SELECT user, email FROM users WHERE email = '" . $_POST['txtemailupdate'] . "' AND user != '" . $_POST['txtuseridUpdate'] . "' LIMIT 1";

			if ($result = $conexion->query($sql)) {
				if ($row = mysqli_fetch_array($result)) {
					$_SESSION['msgbox_info'] = 0;
					$_SESSION['msgbox_error'] = 1;
					$_SESSION['text_msgbox_error'] = 'Este correo electrónico ya está en uso.';
					header('Location: /user');
					exit();
				} else {
					if ($_POST['txtuserpassNewUpdate'] == $_POST['txtuserpassConfirmUpdate'] and $_POST['txtuserpassNewUpdate'] != "" and $_POST['txtuserpassConfirmUpdate'] != "") {
						$sql_update = "UPDATE users SET email = '" . $_POST['txtemailupdate'] . "', pass = '" . $_POST['txtuserpassNewUpdate'] . "' WHERE user = '" . $_POST['txtuseridUpdate'] . "'";
					} else {
						$sql_update = "UPDATE users SET email = '" . $_POST['txtemailupdate'] . "' WHERE user = '" . $_POST['txtuseridUpdate'] . "'";
					}

					if (mysqli_query($conexion, $sql_update)) {
						$_SESSION['msgbox_error'] = 0;
						$_SESSION['msgbox_info'] = 1;
						$_SESSION['text_msgbox_info'] = 'Usuario actualizado.';
					} else {
						$_SESSION['msgbox_info'] = 0;
						$_SESSION['msgbox_error'] = 1;
						$_SESSION['text_msgbox_error'] = 'Error al actualizar.';
					}
					header('Location: /user');
					exit();
				}
			}
		} else {
			$_SESSION['msgbox_info'] = 0;
			$_SESSION['msgbox_error'] = 1;
			$_SESSION['text_msgbox_error'] = 'Contraseña incorrecta.';
			header('Location: /user');
			exit();
		}
	}
}