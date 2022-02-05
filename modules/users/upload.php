<?php
include_once '../security.php';
include_once '../conexion.php';
include_once '../notif_info_msgbox.php';

require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

if (isset($_POST["image"])) {
	$uploadFolder = "../../images/users/";
	$imageName = $_SESSION['user_id'] . rand(1, 1000) . '.png';
	$data = $_POST["image"];

	$imageArray1 = explode(";", $data);
	$imageArray2 = explode(",", $imageArray1[1]);
	$data = base64_decode($imageArray2[1]);

	$nameFile = $uploadFolder . $imageName;

	file_put_contents($nameFile, $data);

	$uploadImage = $_SESSION['raiz'] . '/images/users/' . $imageName . '';

	if (file_exists($uploadImage)) {
		$sql_update = "UPDATE users SET image = '" . $imageName . "' WHERE user = '" . $_SESSION['user_id'] . "'";

		if (mysqli_query($conexion, $sql_update)) {
			if ($_SESSION['user_image'] != "user.png") {
				if (copy($uploadFolder . $_SESSION['user_image'], $uploadFolder . "/old/" . $_SESSION['user_image'])) {
					unlink($uploadFolder . $_SESSION['user_image']);
				}
			}
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