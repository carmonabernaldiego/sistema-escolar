<?php
include_once '../security.php';
include_once '../conexion.php';


require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin.php');

if (empty($_POST['txtuserid'])) {
	header('Location: /');
	exit();
}

if ($_POST['txtuserimage'] != 'user.png') {
	unlink('../../images/users/' . $_POST['txtuserimage'] . '');
}

$sql_delete = "DELETE FROM users WHERE user = '" . $_POST['txtuserid'] . "'";

if (mysqli_query($conexion, $sql_delete)) {
	$_SESSION['msgbox_info'] = 0;
	$_SESSION['msgbox_error'] = 1;
	$_SESSION['text_msgbox_error'] = 'Usuario eliminado.';
} else {
	$_SESSION['msgbox_info'] = 0;
	$_SESSION['msgbox_error'] = 1;
	$_SESSION['text_msgbox_error'] = 'Error al eliminar.';
}

header('Location: /modules/users');