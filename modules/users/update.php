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
		$sql_update = "UPDATE users SET email = null, permissions = '" . $permissions . "' WHERE user = '" . $user . "', last_update = '" . date('Y-m-d') . "'";
	} else {
		$sql_update = "UPDATE users SET email = '" . $email . "', permissions = '" . $permissions . "' WHERE user = '" . $user . "', last_update = '" . date('Y-m-d') . "'";
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

$sql = "SELECT user, email FROM users WHERE email = '" . $_POST['txtemailUpdate'] . "' AND user != '" . $_POST['txtuseridUpdate'] . "' LIMIT 1";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		Error('Este correo electrónico ya está en uso.');
	} else {
		UpdateUserDB($conexion, $_POST['txtuseridUpdate'], $_POST['txtemailUpdate'], $_POST['txtusertype']);
	}
}

/*if ($nombre_img != "") {
	if ($_POST['txtuseridUpdate'] == $_SESSION['user']) {
		$_SESSION['image'] = $nombre_img;
		setcookie('image', $nombre_img, time() + 365 * 24 * 60 * 60, "/");
	}
}*/