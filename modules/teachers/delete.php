<?php
include_once '../security.php';
include_once '../conexion.php';


require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

if (empty($_POST['txtuserid'])) {
	header('Location: /');
	exit();
}

$sql_delete = "DELETE FROM teachers WHERE user = '" . $_POST['txtuserid'] . "'";

if (mysqli_query($conexion, $sql_delete)) {
	$_SESSION['msgbox_info'] = 0;
	$_SESSION['msgbox_error'] = 1;
	$_SESSION['text_msgbox_error'] = 'Personal docente eliminado.';
} else {
	$_SESSION['msgbox_info'] = 0;
	$_SESSION['msgbox_error'] = 1;
	$_SESSION['text_msgbox_error'] = 'Error al eliminar.';
}


header('Location: /modules/teachers');