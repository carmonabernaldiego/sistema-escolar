<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

function unique_id($l = 10)
{
	return substr(md5(uniqid(mt_rand(), true)), 0, $l);
}

$id_generate = 'stdt' . unique_id(6);
?>
<div class="form-data">
	<div class="head">
		<h1 class="titulo">Agregar</h1>
	</div>
	<div class="body">
		<form name="form-add-students" action="insert.php" method="POST">
			<div class="wrap">
				<div class="first">
					<label for="txtuserid" class="label">Usuario</label>
					<input class="text" style=" display: none;" type="text" name="txtuserid" value="<?php echo $id_generate; ?>" maxlength="50" required />
					<input id="txtuserid" class="text" type="text" name="txt" value="<?php echo $id_generate; ?>" required disabled />
					<label for="txtusername" class="label">Nombre</label>
					<input id="txtusername" class="text" type="text" name="txtname" value="" maxlength="30" required autofocus />
					<label for="txtusersurnames" class="label">Apellidos</label>
					<input id="txtusersurnames" class="text" type="text" name="txtsurnames" value="" maxlength="50" required />
					<label for="txtusercurp" class="label">CURP</label>
					<input id="txtusercurp" class="text" type="text" name="txtcurp" value="" maxlength="18" onkeyup="this.value = this.value.toUpperCase()" required />
					<label for="txtuserrfc" class="label">RFC</label>
					<input id="txtuserrfc" class="text" type="text" name="txtrfc" value="" maxlength="13" onkeyup="this.value = this.value.toUpperCase()" required />
				</div>
				<div class="last">
					<label for="txtuserphone" class="label">Número de teléfono</label>
					<input id="txtuserphone" class="text" type="number" name="txtphone" value="" min="0" max="9999999999" maxlength="10"  required />
					<label for="txtuseraddress" class="label">Domicilio</label>
					<input id="txtuseraddress" class="text" type="text" name="txtaddress" value="" maxlength="100" required />
					<label for="selectusercareer" class="label">Carrera</label>
					<select id="selectusercareer" class="select" name="selectcareer">
						<?php
						$i = 0;

						$sql = "SELECT * FROM careers ORDER BY name";

						if ($result = $conexion->query($sql)) {
							while ($row = mysqli_fetch_array($result)) {
								echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";

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
					<label for="selectuserdocumentation" class="label">Documentación</label>
					<select id="selectuserdocumentation" class="select" name="selectdocumentation">
						<option value="1">Si</option>
						<option value="0">No</option>
					</select>
					<label for="dateuseradmission" class="label">Fecha de admisión</label>
					<input id="dateuseradmission" class="date" type="date" name="dateadmission" value="" required />
				</div>
			</div>
			<button id="btnSave" class="btn icon" type="submit">save</button>
		</form>
	</div>
</div>
<div class="content-aside">
	<?php
	include_once "../sections/options-disabled.php";
	?>
</div>