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
	<div class="head">
		<h1 class="titulo">Actualizar</h1>
    </div>
   <div class="body">
		<form name="form-update-users" action="update.php" enctype="multipart/form-data" method="POST" onsubmit="return confirmPass()">
			<div class="wrap">
				<div class="imageuser">
					<img id="userimage" class="user-image" src="' . '/images/users/' . $_SESSION['user_image'][0] . '" />
					<label class="file" for="fileimage"></label>
					<input id="fileimage" style="display: none;" type="file" name="fileimage" accept=".jpg, .jpeg, .png" />
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
<!--<div id="uploadimageModal" class="modal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal">&times;</button>
        		<h4 class="modal-title">Upload & Crop Image</h4>
      		</div>
      		<div class="modal-body">
        		<div class="row">
  					<div class="col-md-8 text-center">
						  <div id="image_demo" style="width:350px; margin-top:30px"></div>
  					</div>
  					<div class="col-md-4" style="padding-top:30px;">
  						<br />
  						<br />
  						<br/>
						  <button class="btn btn-success crop_image">Crop & Upload Image</button>
					</div>
				</div>
      		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      		</div>
    	</div>
    </div>
</div>-->
';
include_once '../modules/notif_info.php';
?>
<script>
	document.getElementById("fileimage").onchange = function(e) {
		// Creamos el objeto de la clase FileReader
		let reader = new FileReader();

		// Leemos el archivo subido y se lo pasamos a nuestro fileReader
		reader.readAsDataURL(e.target.files[0]);

		// Le decimos que cuando este listo ejecute el código interno
		reader.onload = function() {
			image = document.getElementById('userimage');

			image.src = reader.result;
		};
	}

	function confirmPass() {
		pass1 = document.getElementById('pass1');
		pass2 = document.getElementById('pass2');

		if (pass1.value != pass2.value) {
			document.getElementById("labelError").classList.add("show");

			return false;
		} else {
			document.getElementById("labelError").classList.remove("show");

			/*setTimeout(function() {
				location.reload();
			}, 3000);*/

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
</script>