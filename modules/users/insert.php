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

function AddUserDB($conex, $user, $email, $pass, $permissions)
{
	$date = date('Y-m-d H:i:s');

	if ($email == '') {
		$sql_insert = "INSERT INTO users(user_id, pass, permissions, image, created_at) VALUES('" . $user . "','" . $pass . "', '" . $permissions . "', 'user.png', '" . $date . "')";
	} else {
		$sql_insert = "INSERT INTO users(user_id, email, pass, permissions, image, created_at) VALUES('" . $user . "', '" . $email . "', '" . $pass . "', '" . $permissions . "', 'user.png', '" . $date . "')";
	}

	if (mysqli_query($conex, $sql_insert)) {
		Info('Usuario agregado.');
	} else {
		Error('Error al guardar.');
	}
}

$_POST['txtuseridAdd'] = trim($_POST['txtuseridAdd']);

if (empty($_POST['txtuseridAdd'])) {
	header('Location: /');
	exit();
}

if ($_POST['txtuseridAdd'] == '') {
	Error('Ingrese un ID de usuario correcto.');
}

$sql = "SELECT user_id FROM users WHERE user_id = '" . $_POST['txtuseridAdd'] . "' LIMIT 1";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		Error('Este usuario ya está en uso.');
	} else {
		if ($_POST['txtusertype'] == 'admin' || $_POST['txtusertype'] == 'editor') {
			$sql = "SELECT user FROM administratives WHERE user = '" . $_POST['txtuseridAdd'] . "' LIMIT 1";

			if ($result = $conexion->query($sql)) {
				if ($row = mysqli_fetch_array($result)) {
					if ($_POST['txtemailAdd'] == '') {
						AddUserDB($conexion, $_POST['txtuseridAdd'], '', $_POST['txtuserpassAdd'], $_POST['txtusertype']);
					} else {
						$sql = "SELECT email FROM users WHERE email = '" . $_POST['txtemailAdd'] . "' LIMIT 1";

						if ($result = $conexion->query($sql)) {
							if ($row = mysqli_fetch_array($result)) {
								Error('Este correo electrónico ya está en uso.');
							} else {
								AddUserDB($conexion, $_POST['txtuseridAdd'], $_POST['txtemailAdd'], $_POST['txtuserpassAdd'], $_POST['txtusertype']);
							}
						}
					}
				} else {
					Error('Usuario aún no registrado.');
				}
			}
		} elseif ($_POST['txtusertype'] == 'teacher') {
			$sql = "SELECT user FROM teachers WHERE user = '" . $_POST['txtuseridAdd'] . "' LIMIT 1";

			if ($result = $conexion->query($sql)) {
				if ($row = mysqli_fetch_array($result)) {
					if ($_POST['txtemailAdd'] == '') {
						AddUserDB($conexion, $_POST['txtuseridAdd'], '', $_POST['txtuserpassAdd'], $_POST['txtusertype']);
					} else {
						$sql = "SELECT email FROM users WHERE email = '" . $_POST['txtemailAdd'] . "' LIMIT 1";

						if ($result = $conexion->query($sql)) {
							if ($row = mysqli_fetch_array($result)) {
								Error('Este correo electrónico ya está en uso.');
							} else {
								AddUserDB($conexion, $_POST['txtuseridAdd'], $_POST['txtemailAdd'], $_POST['txtuserpassAdd'], $_POST['txtusertype']);
							}
						}
					}
				} else {
					Error('Usuario aún no registrado.');
				}
			}
		} elseif ($_POST['txtusertype'] == 'student') {
			$sql = "SELECT user FROM students WHERE user = '" . $_POST['txtuseridAdd'] . "' LIMIT 1";

			if ($result = $conexion->query($sql)) {
				if ($row = mysqli_fetch_array($result)) {
					if ($_POST['txtemailAdd'] == '') {
						AddUserDB($conexion, $_POST['txtuseridAdd'], '', $_POST['txtuserpassAdd'], $_POST['txtusertype']);
					} else {
						$sql = "SELECT email FROM users WHERE email = '" . $_POST['txtemailAdd'] . "' LIMIT 1";

						if ($result = $conexion->query($sql)) {
							if ($row = mysqli_fetch_array($result)) {
								Error('Este correo electrónico ya está en uso.');
							} else {
								AddUserDB($conexion, $_POST['txtuseridAdd'], $_POST['txtemailAdd'], $_POST['txtuserpassAdd'], $_POST['txtusertype']);
							}
						}
					}
				} else {
					Error('Usuario aún no registrado.');
				}
			}
		}
	}
}

header('Location: /modules/users');