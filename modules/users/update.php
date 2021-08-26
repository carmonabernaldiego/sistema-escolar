<?php
include_once '../security.php';
include_once '../conexion.php';

require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin.php');

function Error($textMsgBox)
{
	$_SESSION['msgbox_info'] = 0;
	$_SESSION['msgbox_error'] = 1;
	$_SESSION['text_msgbox_error'] = $textMsgBox;
	header('Location: /modules/users');
	exit();
}

function Info($textMsgBox)
{
	$_SESSION['msgbox_error'] = 0;
	$_SESSION['msgbox_info'] = 1;
	$_SESSION['text_msgbox_info'] = $textMsgBox;
	header('Location: /modules/users');
	exit();
}

function UpdateUserDB($conex, $user, $email, $permissions)
{
	if ($email == '') {
		$sql_update = "UPDATE users SET email = null, permissions = '" . $permissions . "', updated_at = '" . date('Y-m-d') . "' WHERE user_id = '" . $user . "'";
	} else {
		$sql_update = "UPDATE users SET email = '" . $email . "', permissions = '" . $permissions . "', updated_at = '" . date('Y-m-d') . "' WHERE user_id = '" . $user . "'";
	}

	if (mysqli_query($conex, $sql_update)) {
		Info('Usuario actualizado.');
	} else {
		Error('Error al actualizar.');
	}
}

if (empty($_POST['txtuseridUpdate'])) {
	header('Location: /');
	exit();
}

$sql = "SELECT user_id, email FROM users WHERE email = '" . $_POST['txtemailUpdate'] . "' AND user_id != '" . $_POST['txtuseridUpdate'] . "' LIMIT 1";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		Error('Este correo electrónico ya está en uso.');
	} else {
		UpdateUserDB($conexion, $_POST['txtuseridUpdate'], $_POST['txtemailUpdate'], $_POST['txtusertype']);
	}
}