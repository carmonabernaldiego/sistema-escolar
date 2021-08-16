<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

$_SESSION['user_id'] = array();
$_SESSION['email'] = array();
$_SESSION['user_type'] = array();
$_SESSION['user_image'] = array();
$_SESSION['last_image_update'] = array();

$sql = "SELECT * FROM users WHERE user = '" . $_SESSION['user'] . "'";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['user_id'][0] = $row['user'];
		$_SESSION['email'][0] = $row['email'];
		$_SESSION['user_type'][0] = $row['permissions'];
		$_SESSION['user_image'][0] = $row['image'];
		$_SESSION['last_image_update'][0] = $row['last_image_update'];
	}
}

$name_image_user = $_SESSION['raiz'] . '/images/users/' . $_SESSION['user_image'][0] . '';

if (file_exists($name_image_user)) {
} else {
	$sql = "SELECT image FROM users WHERE user = '" . $_SESSION['user_id'][0] . "'";

	if ($result = $conexion->query($sql)) {
		if ($row = mysqli_fetch_array($result)) {
			$_SESSION['user_image'][0] = $row['image'];
		}

		$name_image_user = $_SESSION['raiz'] . '/images/users/' . $_SESSION['user_image'][0] . '';

		if (file_exists($name_image_user)) {
		} else {
			$_SESSION['user_image'][0] = 'user.png';
		}
	}
}
echo '
<div class="form-data formConfigUser">
	<div class="loader-image-upload">
	</div>
	<div class="body">
		<div id="section-croppie-image">
			<div id="image_crop"></div>
			<button class="crop_btn"><span class="icon">crop</span></button>
		</div>
		<form name="form-update-users" action="update.php" enctype="multipart/form-data" method="POST" onsubmit="return confirmPass()">
			<div class="wrap">
				<div id="section-user-image">
					<img src="' . '/images/users/' . $_SESSION['user_image'][0] . '" />
';
$date_time_start = date_create($_SESSION['last_image_update'][0]);
$date_time_end = date_create(date('Y-m-d'));
$interval = date_diff($date_time_start, $date_time_end);
$days = intval($interval->format('%a'));

if ($days >= 15 or $_SESSION['last_image_update'][0] == null) {
	echo '
					<label class="file" for="file_upload_image"><span class="icon">add_a_photo</span></label>
					<input id="file_upload_image" style="display: none;" type="file" name="file_upload_image" accept=".jpg, .jpeg, .png" />
	';
} else {
	echo '
					<label class="file disabled" for="file_upload_image"><span class="icon">add_a_photo</span></label>
	';
	if ((15 - $days) >= 1) {
		$_SESSION['msgbox_info'] = 1;
		$_SESSION['msgbox_error'] = 0;
		$_SESSION['text_msgbox_info'] = 'Imagen de usuario actualizada recientemente.';
	}
}
echo '
				</div>
				<div class="section-user-info">
					<span class="user-name">' . $_SESSION['name'] . ' ' . $_SESSION['surnames'] . '</span>
					<span class="user-id">- ' . $_SESSION['user_id'][0] . ' -</span>
				</div>
				<div class="first">
					<input id="txtemailupdate" class="text" type="email" name="txtemailUpdate" value="' . $_SESSION['email'][0] . '" maxlength="200" required placeholder="Correo electrónico" autocomplete="off"/>
					<button class="btn-edit-info-user">Actualizar mi cuenta</button>
					<button class="btn-change-pass">Cambiar contraseña</button>
				</div>
				<div class="last">
				</div>
				<div class="footer">
					<span class="user-permissions">' . $_SESSION['permissions'] . '</span>
				</div>
			</div>
        </form>
    </div>
</div>
';
include_once '../modules/notif_info.php';
