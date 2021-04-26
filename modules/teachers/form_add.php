<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

function unique_id($l = 10)
{
	return substr(md5(uniqid(mt_rand(), true)), 0, $l);
}

$id_generate = 'tchr' . unique_id(6);
?>
<div class="form-data">
	<div class="head">
		<h1 class="titulo">Agregar</h1>
	</div>
	<div class="body">
		<form name="form-add-teachers" action="insert.php" method="POST">
			<div class="wrap">
				<div class="first">
					<label class="label">Usuario</label>
					<input class="text" style=" display: none;" type="text" name="txtuserid" value="<?php echo $id_generate; ?>" maxlength="50" required />
					<input class="text" type="text" name="txt" value="<?php echo $id_generate; ?>" required disabled />
					<label class="label">Nombre</label>
					<input class="text" type="text" name="txtname" value="" maxlength="25" required autofocus />
					<label class="label">Apellidos</label>
					<input class="text" type="text" name="txtsurnames" value="" maxlength="50" required />
					<label class="label">CURP</label>
					<input class="text" type="text" name="txtcurp" value="" maxlength="18" onkeyup="this.value = this.value.toUpperCase()" required />
					<label class="label">RFC</label>
					<input class="text" type="text" name="txtrfc" value="" maxlength="13" onkeyup="this.value = this.value.toUpperCase()" required />
				</div>
				<div class="last">
					<label class="label">Telefono</label>
					<input class="text" type="number" name="txtphone" value="" min="0" max="9999999999" maxlength="10" inputmode="email" required />
					<label class="label">Domicilio</label>
					<input class="text" type="text" name="txtaddress" value="" maxlength="100" required />
					<label class="label">Facultad</label>
					<select class="select" name="selectcareer">
						<?php
						$i = 0;

						$sql = "SELECT * FROM careers ORDER BY name";

						if ($result = $conexion->query($sql)) {
							while ($row = mysqli_fetch_array($result)) {
								echo "<option value='" . $row['career'] . "'>" . $row['name'] . "</option>";

								$i += 1;
							}
						} else {
							$_SESSION['msgbox_info'] = 0;
							$_SESSION['msgbox_error'] = 1;
							$_SESSION['text_msgbox_error'] = 'No existen registros en el modulo de carreras.';

							header('Location: /modules/students');
						}
						?>
					</select>
					<label class="label">Nivel de estudios</label>
					<select class="select" name="selectlevelstudies">
						<option value="Licenciatura">Licenciatura</option>
						<option value="Ingenieria">Ingenieria</option>
						<option value="Maestria">Maestria</option>
						<option value="Doctorado">Doctorado</option>
					</select>
					<label class="label">Especialidad</label>
					<input class="text" type="text" name="txtspecialty" value="" maxlength="100" required />
				</div>
			</div>
			<button class="btn icon" type="submit">save</button>
		</form>
	</div>
</div>
<div class="content-aside">
	<?php
	include_once "../sections/options-disabled.php";
	?>
</div>