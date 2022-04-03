<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin.php');

$sql = "SELECT * FROM administratives WHERE user = '" . $_POST['txtuserid'] . "'";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['user_id'] = $row['user'];
		$_SESSION['administrative_name'] = $row['name'];
		$_SESSION['administrative_surnames'] = $row['surnames'];
		$_SESSION['administrative_date_of_birth'] = $row['date_of_birth'];
		$_SESSION['administrative_gender'] = $row['gender'];
		$_SESSION['administrative_curp'] = $row['curp'];
		$_SESSION['administrative_rfc'] = $row['rfc'];
		$_SESSION['administrative_phone'] = $row['phone'];
		$_SESSION['administrative_address'] = $row['address'];
		$_SESSION['administrative_level_studies'] = $row['level_studies'];
		$_SESSION['administrative_occupation'] = $row['occupation'];
		$_SESSION['administrative_observations'] = $row['observations'];
	}
}
?>
<div class="form-data">
	<div class="head">
		<h1 class="titulo">Actualizar</h1>
	</div>
	<div class="body">
		<form name="form-update-administratives" action="update.php" method="POST" autocomplete="off" autocapitalize="on">
			<div class="wrap">
				<div class="first">
					<label for="txtuserid" class="label">Usuario</label>
					<input id="txtuserid" style="display: none;" type="text" name="txtuserid" value="<?php echo $_SESSION['user_id']; ?>" maxlength="50">
					<input class="text" type="text" name="txt" value="<?php echo $_SESSION['user_id']; ?>" maxlength="50" disabled />
					<label for="txtusername" class="label">Nombre</label>
					<input id="txtusername" class="text" type="text" name="txtname" value="<?php echo $_SESSION['administrative_name']; ?>" placeholder="Nombre" autofocus maxlength="30" required />
					<label for="txtusersurnames" class="label">Apellidos</label>
					<input id="txtusersurnames" class="text" type="text" name="txtsurnames" value="<?php echo $_SESSION['administrative_surnames']; ?>" placeholder="Apellidos" maxlength="60" required />
					<label for="dateofbirth" class="label">Fecha de nacimiento</label>
					<input id="dateofbirth" class="date" type="text" name="dateofbirth" value="<?php echo $_SESSION['administrative_date_of_birth']; ?>" pattern="\d{4}-\d{2}-\d{2}" placeholder="aaaa-mm-dd" maxlength="10" required />
					<label for="selectgender" class="label">Género</label>
					<select id="selectgender" class="select" name="selectgender" required>
						<?php
						if ($_SESSION['administrative_gender'] == '') {
							echo '
								<option value="">Seleccioné</option>
								<option value="mujer">Mujer</option>
								<option value="hombre">Hombre</option>
								<option value="otro">Otro</option>
								<option value="nodecirlo">Prefiero no decirlo</option>
							';
						} elseif ($_SESSION['administrative_gender'] == 'mujer') {
							echo '
								<option value="mujer">Mujer</option>
								<option value="hombre">Hombre</option>
								<option value="otro">Otro</option>
								<option value="nodecirlo">Prefiero no decirlo</option>
							';
						} elseif ($_SESSION['administrative_gender'] == 'hombre') {
							echo '
								<option value="hombre">Hombre</option>
								<option value="mujer">Mujer</option>
								<option value="otro">Otro</option>
								<option value="nodecirlo">Prefiero no decirlo</option>
							';
						} elseif ($_SESSION['administrative_gender'] == 'otro') {
							echo '
								<option value="otro">Otro</option>
								<option value="mujer">Mujer</option>
								<option value="hombre">Hombre</option>
								<option value="nodecirlo">Prefiero no decirlo</option>
							';
						} elseif ($_SESSION['administrative_gender'] == 'nodecirlo') {
							echo '
								<option value="nodecirlo">Prefiero no decirlo</option>
								<option value="otro">Otro</option>
								<option value="mujer">Mujer</option>
								<option value="hombre">Hombre</option>
							';
						}
						?>
					</select>
					<label for="txtusercurp" class="label">CURP</label>
					<input id="txtusercurp" class="text" type="text" name="txtcurp" value="<?php echo $_SESSION['administrative_curp']; ?>" placeholder="Clave Única de Registro de Población" pattern="[A-Za-z0-9]{18}" maxlength="18" onkeyup="this.value = this.value.toUpperCase()" required />
				</div>
				<div class="last">
					<label for="txtuserrfc" class="label">RFC</label>
					<input id="txtuserrfc" class="text" type="text" name="txtrfc" value="<?php echo $_SESSION['administrative_rfc']; ?>" placeholder="XAXX010101000" pattern="[A-Za-z0-9]{13}" maxlength="13" onkeyup="this.value = this.value.toUpperCase()" required />
					<label for="txtuserphone" class="label">Número de teléfono</label>
					<input id="txtuserphone" class="text" type="text" name="txtphone" value="<?php echo $_SESSION['administrative_phone']; ?>" pattern="[0-9]{10}" title="Ingresa un número de teléfono válido." placeholder="9998887766" maxlength="10" required />
					<label for="txtuseraddress" class="label">Domicilio</label>
					<input id="txtuseraddress" class="text" type="text" name="txtaddress" value="<?php echo $_SESSION['administrative_address']; ?>" placeholder="Domicilio" maxlength="200" required />
					<label for="selectuserlevelstudies" class="label">Nivel de estudios</label>
					<select id="selectuserlevelstudies" class="select" name="selectlevelstudies" required>
						<?php
						if ($_SESSION['administrative_level_studies'] == 'Licenciatura') {
							echo
							'
								<option value="Licenciatura">Licenciatura</option>
								<option value="Ingenieria">Ingenieria</option>
								<option value="Maestria">Maestria</option>
								<option value="Doctorado">Doctorado</option>
							';
						} elseif ($_SESSION['administrative_level_studies'] == 'Ingenieria') {
							echo
							'
								<option value="Ingenieria">Ingenieria</option>
								<option value="Licenciatura">Licenciatura</option>
								<option value="Maestria">Maestria</option>
								<option value="Doctorado">Doctorado</option>
							';
						} elseif ($_SESSION['administrative_level_studies'] == 'Maestria') {
							echo
							'
								<option value="Maestria">Maestria</option>
								<option value="Licenciatura">Licenciatura</option>
								<option value="Ingenieria">Ingenieria</option>
								<option value="Doctorado">Doctorado</option>
							';
						} elseif ($_SESSION['administrative_level_studies'] == 'Doctorado') {
							echo
							'
								<option value="Doctorado">Doctorado</option>
								<option value="Licenciatura">Licenciatura</option>
								<option value="Ingenieria">Ingenieria</option>
								<option value="Maestria">Maestria</option>
							';
						}
						?>
					</select>
					<label for="txtuseroccupation" class="label">Cargo</label>
					<input id="txtuseroccupation" class="text" type="text" name="txtoccupation" value="<?php echo $_SESSION['administrative_occupation']; ?>" placeholder="Cargo" maxlength="100" required />
					<label for="txtuserobservation" class="label">Observación</label>
					<input id="txtuserobservation" class="text" type="text" name="txtobservation" value="<?php echo $_SESSION['administrative_observations']; ?>" placeholder="Observación" maxlength="200" />
				</div>
			</div>
			<button id="btnBack" class="btn back icon" type="button">arrow_back</button>
			<button id="btnNext" class="btn icon" type="button">arrow_forward</button>
			<button id="btnSave" class="btn icon" type="submit">save</button>
		</form>
	</div>
</div>
<div class="content-aside">
	<?php include_once "../sections/options-disabled.php"; ?>
</div>
<script src="/js/modules/administratives.js" type="text/javascript"></script>