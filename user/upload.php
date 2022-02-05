<?php
include_once '../modules/security.php';
include_once '../modules/conexion.php';
include_once '../modules/notif_info_msgbox.php';

require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

if (isset($_POST["image"])) {
	$uploadFolder = "../images/users/";
	$imageName = $_SESSION['user_id'] . rand(1, 1000) . '.png';
	$data = $_POST["image"];

	$imageArray1 = explode(";", $data);
	$imageArray2 = explode(",", $imageArray1[1]);
	$data = base64_decode($imageArray2[1]);

	$nameFile = $uploadFolder . $imageName;

	file_put_contents($nameFile, $data);

	$uploadImage = $_SESSION['raiz'] . '/images/users/' . $_SESSION['image'] . '';

	if (file_exists($uploadImage)) {
		$date = date('Y-m-d H:i:s');

		$sql_update = "UPDATE users SET image = '" . $imageName . "', image_updated_at = '" . $date . "' WHERE user = '" . $_SESSION['user_id'] . "'";

		if (mysqli_query($conexion, $sql_update)) {
			if ($_SESSION['image'] != "user.png") {
				if (copy($uploadFolder . $_SESSION['image'], $uploadFolder . "/old/" . $_SESSION['image'])) {
					unlink($uploadFolder . $_SESSION['image']);
				}
			}
			$_SESSION['msgbox_error'] = 0;
			$_SESSION['msgbox_info'] = 1;
			Info('La imagen se cargo correctamente.');
		} else {
			Error('Existe un problema en la BD al actualizar el nombre de la imagen de usuario.');
		}

		if ($_SESSION['user'] == $_SESSION['user_id']) {
			$_SESSION['image'] = $imageName;
			setcookie('image', $imageName, time() + 365 * 24 * 60 * 60, "/");
		}
	} else {
		Error('Existe un error al cargar la imagen.');
	}
} else {
	Error('Existe un error al cargar la imagen.');
}