<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

$sql = "SELECT user, email, permissions, image, image_updated_at FROM users WHERE user = '" . $_SESSION['user'] . "'";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['user_id'] = $row['user'];
		$_SESSION['email'] = $row['email'];
		$_SESSION['user_type'] = $row['permissions'];
		$_SESSION['user_image'] = $row['image'];
		$_SESSION['image_updated_at'] = $row['image_updated_at'];
	}
}

$name_image_user = $_SESSION['raiz'] . '/images/users/' . $_SESSION['user_image'] . '';

if (!file_exists($name_image_user)) {
	$sql = "SELECT image FROM users WHERE user = '" . $_SESSION['user_id'] . "'";

	if ($result = $conexion->query($sql)) {
		if ($row = mysqli_fetch_array($result)) {
			$_SESSION['user_image'] = $row['image'];
		}

		$name_image_user = $_SESSION['raiz'] . '/images/users/' . $_SESSION['user_image'] . '';

		if (file_exists($name_image_user)) {
		} else {
			$_SESSION['user_image'] = 'user.png';
		}
	}
}

if ($_SESSION['user_type'] == 'admin') {
	$_SESSION['user_type'] = 'Adminisrador';
}