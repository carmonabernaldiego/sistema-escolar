<style type="text/css">
	.box-notification-ok,
	.box-notification-error {
		position: absolute;
		top: 0;
		width: 72%;
		height: 50px;
		margin: 35px 0 0 0;
	}

	.box-notification-ok p,
	.box-notification-error p {
		padding: 17px 35px;
	}

	@media only screen and (max-width: 1186px) {

		.box-notification-ok,
		.box-notification-error {
			position: absolute;
			top: 0;
			width: 94%;
			margin: 100px 0 0 0;
		}
	}

	@media only screen and (max-width: 963px) {

		.box-notification-ok,
		.box-notification-error {
			position: initial;
			width: 100%;
			margin: -77px 0 27px 0;
		}

		.box-notification-ok p,
		.box-notification-error p {
			padding: 17px 5%;
		}
	}
</style>
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
echo '
<div class="form-data formConfigUser">
	<div class="loader-image-upload">
	</div>
	<div class="body">
		<div id="section-croppie-image">
			<div id="image_crop"></div>
			<button class="crop_btn"></button>
		</div>
		<form name="form-update-users" action="update.php" enctype="multipart/form-data" method="POST" onsubmit="return confirmPass()">
			<div class="wrap">
				<div id="section-user-image">
					<img src="' . '/images/users/' . $_SESSION['user_image'][0] . '" />
					<label class="file" for="file_upload_image"></label>
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
?>
<script>
	$('#section-croppie-image').hide();

	function confirmPass() {
		pass1 = document.getElementById('pass1');
		pass2 = document.getElementById('pass2');

		if (pass1.value != pass2.value) {
			document.getElementById("labelError").classList.add("show");

			return false;
		} else {
			document.getElementById("labelError").classList.remove("show");

			return true;
		}
	}

	//Desactivamos Enter para no ejecutar un Submit al Formulario
	/*document.addEventListener('DOMContentLoaded', () => {
		document.querySelectorAll('input[type=email]').forEach(node => node.addEventListener('keypress', e => {
			if (e.keyCode == 13) {
				e.preventDefault();
			}
		}))
	});*/

	$(document).ready(function() {

		$image_crop = $('#image_crop').croppie({
			enableExif: true,
			viewport: {
				width: 190,
				height: 190,
				type: 'circle' //square
			},
			boundary: {
				width: 270,
				height: 270
			}
		});

		$('#file_upload_image').on('change', function() {
			var reader = new FileReader();
			reader.onload = function(event) {
				$image_crop.croppie('bind', {
					url: event.target.result
				}).then(function() {
					console.log('jQuery bind complete');
				});
			}
			reader.readAsDataURL(this.files[0]);
			$('#section-user-image').hide();
			$('#section-croppie-image').show();
		});

		$('.crop_btn').click(function(event) {
			$image_crop.croppie('result', {
				type: 'canvas',
				size: 'original',
				quality: 1,
				circle: false
			}).then(function(response) {
				$('.loader-image-upload').css("visibility", "visible");
				$('#section-user-image').show();
				$('#section-croppie-image').hide();
				$.ajax({
					url: "upload.php",
					type: "POST",
					data: {
						"image": response
					},
					success: function(res) {
						location.href = location.href;
						window.location.href = "/user"
					}
				});
			})

		});

	});
</script>