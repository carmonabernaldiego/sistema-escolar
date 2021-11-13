<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin.php');

if (isset($_POST['id'])) {
	$_SESSION['POST_id'] = $_POST['id'];
}

$_SESSION['user_id'] = array();
$_SESSION['email'] = array();
$_SESSION['user_type'] = array();
$_SESSION['user_image'] = array();
$_SESSION['user_name'] = array();
$_SESSION['user_surnames'] = array();

$sql = "SELECT user_id, email, permissions, image FROM users WHERE user_id = '" . $_SESSION['POST_id'] . "'";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['user_id'][0] = $row['user_id'];
		$_SESSION['email'][0] = $row['email'];
		$_SESSION['user_type'][0] = $row['permissions'];
		$_SESSION['user_image'][0] = $row['image'];

		if ($_SESSION['user_type'][0] == 'admin' || $_SESSION['user_type'][0] == 'editor') {
			$sql = "SELECT name, surnames FROM administratives WHERE user = '" . $_SESSION['user_id'][0] . "'";

			if ($result = $conexion->query($sql)) {
				if ($row = mysqli_fetch_array($result)) {
					$_SESSION['user_name'][0] = $row['name'];
					$_SESSION['user_surnames'][0] = $row['surnames'];
				}
			}
		}
	}
}

$name_image_user = $_SESSION['raiz'] . '/images/users/' . $_SESSION['user_image'][0] . '';

if (!file_exists($name_image_user)) {
	$sql = "SELECT image FROM users WHERE user_id = '" . $_SESSION['user_id'][0] . "'";

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
	<div class="loader-user">
	</div>
	<div class="body">
		<div class="section-croppie-image" style="display: none;">
			<div class="image-crop"></div>
			<div class="options">
				<button class="crop-btn"><span class="icon">crop</span></button>
				<form action="#">
					<button class="cancel-btn"><span class="icon">close</span></button>
				</form>
			</div>
		</div>
		<form name="form-update-users" action="update.php" enctype="multipart/form-data" method="POST">
			<div class="wrap">
				<div class="section-user-image">
					<img src="' . '/images/users/' . $_SESSION['user_image'][0] . '" />
					<a href="#" class="file"><span class="icon">add_a_photo</span></a>
					<input id="fileuploadimage" style="display: none;" type="file" name="fileuploadimage" accept=".jpg, .jpeg, .png" />
				</div>
				<div class="section-user-info">
					<span class="user-name">' . $_SESSION['user_name'][0] . ' ' . $_SESSION['user_surnames'][0] . '</span>
					<span class="user-id">' . $_SESSION['user_id'][0] . '</span>
				</div>
				<div class="first">
					<label for="txtuseremail" class="label">Email</label>
					<input id="txtuseremail" class="text" type="email" name="txtemailupdate" value="' . $_SESSION['email'][0] . '" maxlength="200" autofocus/>
				</div>
				<div class="last">
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