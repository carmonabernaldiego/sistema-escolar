<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin.php');

if (isset($_POST['id'])) {
	$_SESSION['POST_id'] = $_POST['id'];
}

$sql = "SELECT user, email, permissions, image FROM users WHERE user = '" . $_SESSION['POST_id'] . "'";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['user_id'] = $row['user'];
		$_SESSION['email'] = $row['email'];
		$_SESSION['user_type'] = $row['permissions'];
		$_SESSION['user_image'] = $row['image'];

		if($_SESSION['user_image'] == null) {
			$_SESSION['user_image'] = 'user.png';
		}

		if ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'editor') {
			$sql = "SELECT name, surnames FROM administratives WHERE user = '" . $_SESSION['user_id'] . "'";

			if ($result = $conexion->query($sql)) {
				if ($row = mysqli_fetch_array($result)) {
					$_SESSION['user_name'] = $row['name'];
					$_SESSION['user_surnames'] = $row['surnames'];
				}
			}
		}
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
echo '
<div class="form-data form-users">
	<div class="loader-user">
	</div>
	<div class="body">
		<div class="section-croppie-image" style="display: none;">
			<div class="image-crop"></div>
			<div class="options">
				<a href="#" class="change-btn"><span class="icon">sync</span></a>
				<a href="#" class="crop-btn"><span class="icon">crop</span></a>
				<a href="#" class="cancel-btn"><span class="icon">close</span></a>
			</div>
		</div>
		<form name="form-update-users" action="update.php" enctype="multipart/form-data" method="POST">
			<div class="wrap">
				<div class="section-user-image">
					<img src="' . '/images/users/' . $_SESSION['user_image'] . '" />
					<a href="#" class="file"><span class="icon">add_a_photo</span></a>
					<input id="fileuploadimage" style="display: none;" type="file" name="fileuploadimage" accept=".jpg, .jpeg, .png" />
				</div>
				<div class="section-user-info">
					<span class="user-name">' . $_SESSION['user_name'] . ' ' . $_SESSION['user_surnames'] . '</span>
					<span class="user-id">' . $_SESSION['user_id'] . '</span>
				</div>
				<div class="first">
					<label for="txtuseremail" class="label">Email</label>
					<input id="txtuseremail" class="text" type="email" name="txtemailupdate" value="' . $_SESSION['email'] . '" placeholder="example@email.com" maxlength="200" autofocus/>
				</div>
				<div class="last">
					<label for="selectusertype" class="label">Permisos</label>
					<select id="selectusertype" class="select" name="txtusertype" required>
					';
if ($_SESSION['user_type'] == '') {
	echo
	'
								<option value="">Seleccioné</option>
								<option value="admin">Administrador</option>
								<option value="capturist">Capturista</option>
								<option value="editor">Editor</option>	
								<option value="student">Alumno</option>
								<option value="teacher">Docente</option>
	';
}
if ($_SESSION['user_type'] == 'admin') {
	echo
	'
								<option value="admin">Administrador</option>
								<option value="capturist">Capturista</option>
								<option value="editor">Editor</option>	
								<option value="student">Alumno</option>
								<option value="teacher">Docente</option>
							';
} elseif ($_SESSION['user_type'] == 'capturist') {
	echo
	'
								<option value="capturist">Capturista</option>
								<option value="admin">Administrador</option>
								<option value="editor">Editor</option>
								<option value="student">Alumno</option>
								<option value="teacher">Docente</option>
							';
} elseif ($_SESSION['user_type'] == 'editor') {
	echo
	'
								<option value="editor">Editor</option>
								<option value="admin">Administrador</option>
								<option value="capturist">Capturista</option>
								<option value="student">Alumno</option>
								<option value="teacher">Docente</option>
							';
} elseif ($_SESSION['user_type'] == 'student') {
	echo
	'
								<option value="student">Alumno</option>
								<option value="admin">Administrador</option>
								<option value="capturist">Capturista</option>
								<option value="editor">Editor</option>	
								<option value="teacher">Docente</option>
							';
} elseif ($_SESSION['user_type'] == 'teacher') {
	echo
	'
								<option value="teacher">Docente</option>
								<option value="admin">Administrador</option>
								<option value="capturist">Capturista</option>
								<option value="editor">Editor</option>	
								<option value="student">Alumno</option>	
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
