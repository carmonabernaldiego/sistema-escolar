<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

$_SESSION['user_id'] = array();
$_SESSION['email'] = array();
$_SESSION['user_type'] = array();
$_SESSION['user_image'] = array();

$sql = "SELECT * FROM users WHERE user = '" . $_SESSION['user'] . "'";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['user_id'][0] = $row['user'];
		$_SESSION['email'][0] = $row['email'];
		$_SESSION['user_type'][0] = $row['permissions'];
		$_SESSION['user_image'][0] = $row['image'];
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
					<label class="file" for="file_upload_image"><span class="icon">add_a_photo</span></label>
					<input id="file_upload_image" style="display: none;" type="file" name="file_upload_image" accept=".jpg, .jpeg, .png" />
				</div>
				<div class="first">
					<label class="label">Usuario</label>
					<input style="display: none;" type="text" name="txtuseridUpdate" value="' . $_SESSION['user_id'][0] . '"/>
					<input class="text" type="text" name="txt" value="' . $_SESSION['user_id'][0] . '" disabled/>
					<label class="label">Email</label>
					<input class="text" type="email" name="txtemailUpdate" value="' . $_SESSION['email'][0] . '" maxlength="200" required autofocus/>
					<label class="label">Permisos</label>
					<select class="select" name="txt" disabled>
				';
if ($_SESSION['user_type'][0] == 'admin') {
	echo
	'
							<option value="admin">Administrador</option>
							<option value="student">Alumno</option>
							<option value="teacher">Docente</option>
							<option value="editor">Editor</option>	
						';
} elseif ($_SESSION['user_type'][0] == 'alumno') {
	echo
	'
							<option value="student">Alumno</option>
							<option value="admin">Administrador</option>
							<option value="teacher">Docente</option>
							<option value="editor">Editor</option>	
						';
} elseif ($_SESSION['user_type'][0] == 'docente') {
	echo
	'
							<option value="teacher">Docente</option>
							<option value="admin">Administrador</option>
							<option value="student">Alumno</option>
							<option value="editor">Editor</option>	
						';
} elseif ($_SESSION['user_type'][0] == 'editor') {
	echo
	'
							<option value="editor">Editor</option>
							<option value="admin">Administrador</option>
							<option value="student">Alumno</option>
							<option value="teacher">Docente</option>
						';
}
echo
'
					</select>
				</div>
				<div class="last">
					<label class="label">Confirmar contraseña</label>
					<input class="text" type="password" name="txtuserpassOldUpdate" placeholder="Contraseña actual" maxlength="50" required/>
					<label class="label">Cambiar contraseña</label>
					<input class="text" id="pass1" type="password" name="txtuserpassNewUpdate" placeholder="Nueva contraseña" maxlength="50"/>
					<label id="labelError" class="label labelError">Las contraseñas no coinciden.</label>
					<input class="text" id="pass2" type="password" name="txtuserpassConfirmUpdate" placeholder="Confirmar contraseña" maxlength="50"/>
				</div>
			</div>
			<button class="btn icon" type="submit">save</button>
        </form>
    </div>
</div>
';
include_once '../modules/notif_info.php';