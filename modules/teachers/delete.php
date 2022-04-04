<?php
include_once '../security.php';
include_once '../conexion.php';
include_once '../notif_info_msgbox.php';

require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

if (empty($_POST['txtuserid'])) {
	header('Location: /');
	exit();
}

$sql_delete = "DELETE FROM users WHERE user = '" . $_POST['txtuserid'] . "'";

if (mysqli_query($conexion, $sql_delete)) {
	$sql_delete = "DELETE FROM teachers WHERE user = '" . $_POST['txtuserid'] . "'";

	if (mysqli_query($conexion, $sql_delete)) {
		Error('Personal docente eliminado.');
	} else {
		Error('Error al eliminar.');
	}
} else {
	Error('Error al eliminar.');
}
header('Location: /modules/teachers');
exit();