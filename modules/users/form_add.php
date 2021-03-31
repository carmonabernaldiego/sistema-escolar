<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin.php');

echo '
<div class="form-data">
	<div class="head">
		<h1 class="titulo">Agregar</h1>
    </div>
   <div class="body">
        <form name="form-add-users" action="insert.php" enctype="multipart/form-data" method="POST">
			<div class="wrap">
				<div class="first">
					<label class="label">Usuario</label>
					<input class="text" type="text" name="txtuseridAdd" value="" maxlength="50" autofocus required/>
					<label class="label">Email</label>
					<input class="text" type="email" name="txtemailAdd" value="" maxlength="200"/>
				</div>
				<div class="last">
					<label class="label">Contraseña</label>
					<input class="text" type="password" name="txtuserpassAdd" value="" maxlength="50" required/>
					<label class="label">Permisos</label>
					<select class="select" name="txtusertype">
						<option value="editor">Editor</option>
						<option value="admin">Administrador</option>
						<option value="student">Alumno</option>
						<option value="teacher">Docente</option>
					</select>
				</div>
				<div class="last imageuser">
					<label class="label" style="text-align:center;">Imagen</label>
					<img id="userimage" class="user-image" src="../../images/users/user.png" />
					<label class="file" for="fileimage">Abrir Imagen</label>
					<input id="fileimage" style="display: none;" type="file" name="fileimage" accept=".jpg, .jpeg, .png" />
				</div>
			</div>
			<button class="btn icon" type="submit">save</button>
        </form>
    </div>
</div>
';
echo '<div class="content-aside">';
include_once "../sections/options-disabled.php";
echo '</div>';
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
</script>