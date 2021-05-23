<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin.php');

if (isset($_POST['id'])) {
	$_SESSION['POST_id'] = $_POST['id'];
}

$_SESSION['user_id'] = array();
$_SESSION['email'] = array();
$_SESSION['user_type'] = array();
$_SESSION['user_image'] = array();

$sql = "SELECT * FROM users WHERE user = '" . $_SESSION['POST_id'] . "'";

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
<div class="form-data form-users">
	<div class="loader-image-upload">
	</div>
	<div class="body">
		<div id="section-croppie-image">
			<div id="image_crop"></div>
			<button class="crop_btn"><span class="icon">crop</span></button>
		</div>
		<form name="form-update-users" action="update.php" enctype="multipart/form-data" method="POST">
			<div class="wrap">
				<div id="section-user-image">
					<img src="' . '/images/users/' . $_SESSION['user_image'][0] . '" />
					<label class="file" for="file_upload_image"><span class="icon">add_a_photo</span></label>
					<input id="file_upload_image" style="display: none;" type="file" name="file_upload_image" accept=".jpg, .jpeg, .png" />
				</div>
				<div class="first">
					<label for="txtuserid" class="label">Usuario</label>
					<input style="display: none;" type="text" name="txtuseridUpdate" value="' . $_SESSION['user_id'][0] . '"/>
					<input id="txtuserid" class="text" type="text" name="txt" value="' . $_SESSION['user_id'][0] . '" disabled/>
					<label for="txtuseremail" class="label">Email</label>
					<input id="txtuseremail" class="text" type="email" name="txtemailUpdate" value="' . $_SESSION['email'][0] . '" maxlength="200" autofocus/>
				</div>
				<div class="last">
					<label for="txtuserpass" class="label">Contraseña</label>
					<input id="txtuserpass" class="text" type="password" name="txtuserpassUpdate" value="Password1234//*" disabled/>
					<label for="selectusertype" class="label">Permisos</label>
					<select id="selectusertype" class="select" name="txtusertype">
					';
if ($_SESSION['user_type'][0] == 'admin') {
	echo
	'
								<option value="admin">Administrador</option>
								<option value="student">Alumno</option>
								<option value="teacher">Docente</option>
								<option value="editor">Editor</option>	
							';
} elseif ($_SESSION['user_type'][0] == 'student') {
	echo
	'
								<option value="student">Alumno</option>
								<option value="admin">Administrador</option>
								<option value="teacher">Docente</option>
								<option value="editor">Editor</option>	
							';
} elseif ($_SESSION['user_type'][0] == 'teacher') {
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
			</div>
			<button id="btnSave" class="btn icon" type="submit">save</button>
        </form>
    </div>
</div>
';
echo '<div class="content-aside">';
include_once "../sections/options-disabled.php";
echo '</div>';