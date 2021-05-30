<?php
include_once '../security.php';
include_once '../conexion.php';


require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

if (empty($_POST['txtcareer'])) {
	header('Location: /');
	exit();
}

$sql_delete = "DELETE FROM careers WHERE career = '" . $_POST['txtcareer'] . "'";

if (mysqli_query($conexion, $sql_delete)) {
	$_SESSION['msgbox_info'] = 0;
	$_SESSION['msgbox_error'] = 1;
	$_SESSION['text_msgbox_error'] = 'Carrera eliminada.';
} else {
	$_SESSION['msgbox_info'] = 0;
	$_SESSION['msgbox_error'] = 1;
	$_SESSION['text_msgbox_error'] = 'Error al eliminar.';
}


header('Location: /modules/careers');