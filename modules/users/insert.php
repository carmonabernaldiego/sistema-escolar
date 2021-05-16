<?php
include_once '../security.php';
include_once '../conexion.php';


require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin.php');

if (empty($_POST['txtuseridAdd'])) {
	header('Location: /');
	exit();
}

$_POST['txtuseridAdd'] = trim($_POST['txtuseridAdd']);

if ($_POST['txtuseridAdd'] == '') {
	$_SESSION['msgbox_info'] = 0;
	$_SESSION['msgbox_error'] = 1;
	$_SESSION['text_msgbox_error'] = 'Ingrese un ID de usuario correcto';
	header('Location: /modules/users');
	exit();
}

$sql_insert = "INSERT INTO users(user, email, pass, permissions, image) VALUES('" . $_POST['txtuseridAdd'] . "', '" . $_POST['txtemailAdd'] . "', '" . $_POST['txtuserpassAdd'] . "', '" . $_POST['txtusertype'] . "', 'user.png')";

if (mysqli_query($conexion, $sql_insert)) {
	$_SESSION['msgbox_error'] = 0;
	$_SESSION['msgbox_info'] = 1;
	$_SESSION['text_msgbox_info'] = 'Usuario agregado';
} else {
	$_SESSION['msgbox_info'] = 0;
	$_SESSION['msgbox_error'] = 1;
	$_SESSION['text_msgbox_error'] = 'Error al guardar';
}

header('Location: /modules/users');