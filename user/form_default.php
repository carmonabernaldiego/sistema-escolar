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

if ($_SESSION['user_type'][0] == 'admin') {
	$_SESSION['user_type'][0] = 'Administrador';
}

echo '
<div class="form-data formConfigUser">
	<div class="loader-image-upload"></div>
	<div class="body">
		<div id="section-croppie-image">
			<div id="image_crop"></div>
			<div class="options">
				<button class="crop-btn"><span class="icon">crop</span></button>
				<form action="/user">      
					<button class="cancel-btn"><span class="icon">close</span></button>
				</form>
			</div>
		</div>
		<form name="form-update-users" action="update.php" enctype="multipart/form-data" method="POST" onsubmit="return confirmPass()">
			<div class="wrap">
				<div class="first">
					<div id="section-user-image">
						<img src="' . '/images/users/' . $_SESSION['user_image'][0] . '" />
		';
$date_time_start = date_create($_SESSION['last_image_update'][0]);
$date_time_end = date_create(date('Y-m-d'));
$interval = date_diff($date_time_start, $date_time_end);
$days = intval($interval->format('%a'));

if ($days >= 15 or $_SESSION['last_image_update'][0] == null) {
	echo '
						<button class="file"><span class="icon">add_a_photo</span></button>
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
					
						<div class="section-user-info">
							<span class="user-name">' . $_SESSION['name'] . ' ' . $_SESSION['surnames'] . '</span>
							<span class="user-id">' . $_SESSION['user_id'][0] . '</span>
						</div>
					</div>
				</div>
				<div class="last">
					<div class="config-data-user">
						<p>
							<input disabled id="txtemailupdate" class="text text-edit-email" type="email" name="txtemailupdate" value="' . $_SESSION['email'][0] . '" maxlength="200" placeholder="Correo electrónico" autocomplete="off" required>
							<button id="btnemailupdate" class="btn-edit-email icon" name="btnemailupdate" type="submit">edit</button>
						</p>
						<a class="btn-edit-info-user" href="#"><span class="icon">edit_note</span>Información Personal</a>
						<a class="btn-change-pass" href="#"><span class="icon">lock_open</span>Cambiar Contraseña</a>
					</div>
				</div>
				<div class="footer">
					<span class="user-permissions">' . $_SESSION['user_type'][0] . '</span>
				</div>
			</div>
        </form>
    </div>
</div>
';
include_once '../modules/notif_info.php';
