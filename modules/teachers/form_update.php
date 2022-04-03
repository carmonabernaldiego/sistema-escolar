<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

$sql = "SELECT * FROM teachers WHERE user = '" . $_POST['txtuserid'] . "'";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['user_id'] = $row['user'];
		$_SESSION['teacher_name'] = $row['name'];
		$_SESSION['teacher_surnames'] = $row['surnames'];
		$_SESSION['teacher_gender'] = $row['gender'];
		$_SESSION['teacher_date_of_birth'] = $row['date_of_birth'];
		$_SESSION['teacher_curp'] = $row['curp'];
		$_SESSION['teacher_rfc'] = $row['rfc'];
		$_SESSION['teacher_phone'] = $row['phone'];
		$_SESSION['teacher_address'] = $row['address'];
		$_SESSION['teacher_level_studies'] = $row['level_studies'];
		$_SESSION['teacher_specialty'] = $row['specialty'];
		$_SESSION['teacher_career'] = $row['career'];
	}
}
?>
<div class="form-data">
	<div class="head">
		<h1 class="titulo">Actualizar</h1>
	</div>
	<div class="body">
		<form name="form-update-teachers" action="update.php" method="POST" autocomplete="off" autocapitalize="on">
			<div class="wrap">
				<div class="first">
					<label for="txtuserid" class="label">Usuario</label>
					<input id="txtuserid" style="display: none;" type="text" name="txtuserid" value="<?php echo $_SESSION['user_id']; ?>" maxlength="50">
					<input class="text" type="text" name="txt" value="<?php echo $_SESSION['user_id']; ?>" maxlength="50" disabled />
					<label for="txtusername" class="label">Nombre</label>
					<input id="txtusername" class="text" type="text" name="txtname" value="<?php echo $_SESSION['teacher_name']; ?>" placeholder="Nombre" autofocus maxlength="30" required />
					<label for="txtusersurnames" class="label">Apellidos</label>
					<input id="txtusersurnames" class="text" type="text" name="txtsurnames" value="<?php echo $_SESSION['teacher_surnames']; ?>" placeholder="Apellidos" maxlength="60" required />
					<label for="dateofbirth" class="label">Fecha de nacimiento</label>
					<input id="dateofbirth" class="date" type="text" name="dateofbirth" value="<?php echo $_SESSION['teacher_date_of_birth']; ?>" pattern="\d{4}-\d{2}-\d{2}" placeholder="aaaa-mm-dd" maxlength="10" required />
					<label for="selectgender" class="label">Género</label>
					<select id="selectgender" class="select" name="selectgender" required>
						<?php
						if ($_SESSION['teacher_gender'] == '') {
							echo '
								<option value="">Seleccioné</option>
								<option value="mujer">Mujer</option>
								<option value="hombre">Hombre</option>
								<option value="otro">Otro</option>
								<option value="nodecirlo">Prefiero no decirlo</option>
							';
						} elseif ($_SESSION['teacher_gender'] == 'mujer') {
							echo '
								<option value="mujer">Mujer</option>
								<option value="hombre">Hombre</option>
								<option value="otro">Otro</option>
								<option value="nodecirlo">Prefiero no decirlo</option>
							';
						} elseif ($_SESSION['teacher_gender'] == 'hombre') {
							echo '
								<option value="hombre">Hombre</option>
								<option value="mujer">Mujer</option>
								<option value="otro">Otro</option>
								<option value="nodecirlo">Prefiero no decirlo</option>
							';
						} elseif ($_SESSION['teacher_gender'] == 'otro') {
							echo '
								<option value="otro">Otro</option>
								<option value="mujer">Mujer</option>
								<option value="hombre">Hombre</option>
								<option value="nodecirlo">Prefiero no decirlo</option>
							';
						} elseif ($_SESSION['teacher_gender'] == 'nodecirlo') {
							echo '
								<option value="nodecirlo">Prefiero no decirlo</option>
								<option value="otro">Otro</option>
								<option value="mujer">Mujer</option>
								<option value="hombre">Hombre</option>
							';
						}
						?>
					</select>
				</div>
				<div class="last">
					<label for="txtusercurp" class="label">CURP</label>
					<input id="txtusercurp" class="text" type="text" name="txtcurp" value="<?php echo $_SESSION['teacher_curp']; ?>" placeholder="Clave Única de Registro de Población" pattern="[A-Za-z0-9]{18}" maxlength="18" onkeyup="this.value = this.value.toUpperCase()" required />
					<label for="txtuserrfc" class="label">RFC</label>
					<input id="txtuserrfc" class="text" type="text" name="txtrfc" value="<?php echo $_SESSION['teacher_rfc']; ?>" placeholder="XAXX010101000" pattern="[A-Za-z0-9]{13}" maxlength="13" onkeyup="this.value = this.value.toUpperCase()" required />
					<label for="txtuserphone" class="label">Número de teléfono</label>
					<input id="txtuserphone" class="text" type="text" name="txtphone" value="<?php echo $_SESSION['teacher_phone']; ?>" pattern="[0-9]{10}" title="Ingresa un número de teléfono válido." placeholder="9998887766" maxlength="10" required />
					<label for="txtuseraddress" class="label">Domicilio</label>
					<input id="txtuseraddress" class="text" type="text" name="txtaddress" value="<?php echo $_SESSION['teacher_address']; ?>" placeholder="Domicilio" maxlength="200" required />
					<label for="txtuserspecialty" class="label">Especialidad</label>
					<input id="txtuserspecialty" class="text" type="text" name="txtspecialty" value="<?php echo $_SESSION['teacher_specialty']; ?>" placeholder="Especialidad" maxlength="100" required />
				</div>
				<div class="content-full">
					<label for="selectuserlevelstudies" class="label">Nivel de estudios</label>
					<select id="selectuserlevelstudies" class="select" name="selectlevelstudies" required>
						<?php
						if ($_SESSION['teacher_level_studies'] == 'Licenciatura') {
							echo
							'
								<option value="Licenciatura">Licenciatura</option>
								<option value="Ingenieria">Ingenieria</option>
								<option value="Maestria">Maestria</option>
								<option value="Doctorado">Doctorado</option>
							';
						} elseif ($_SESSION['teacher_level_studies'] == 'Ingenieria') {
							echo
							'
								<option value="Ingenieria">Ingenieria</option>
								<option value="Licenciatura">Licenciatura</option>
								<option value="Maestria">Maestria</option>
								<option value="Doctorado">Doctorado</option>
							';
						} elseif ($_SESSION['teacher_level_studies'] == 'Maestria') {
							echo
							'
								<option value="Maestria">Maestria</option>
								<option value="Licenciatura">Licenciatura</option>
								<option value="Ingenieria">Ingenieria</option>
								<option value="Doctorado">Doctorado</option>
							';
						} elseif ($_SESSION['teacher_level_studies'] == 'Doctorado') {
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
				</div>
				<div class="content-full">
					<label for="selectusercareers" class="label">Carrera</label>
					<select id="selectusercareers" class="select-user-careers" name="selectCareers[]" multiple="multiple" required>
						<?php
						$_SESSION['teacher_career'] = trim($_SESSION['teacher_career'], ',');
						$careers = explode(',', $_SESSION['teacher_career']);

						$i = 0;

						$sql = "SELECT career, name FROM careers";

						if ($result = $conexion->query($sql)) {
							while ($row = mysqli_fetch_array($result)) {
								if ($row['career'] == $careers[$i]) {
									echo
									'
										<option value="' . $row['career'] . '" selected>' . $row['name'] . '</option>
									';
									$i++;
								} else {
									echo
									'
										<option value="' . $row['career'] . '">' . $row['name'] . '</option>
									';
								}
							}
						}
						?>
					</select>
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
<script src="/js/modules/teachers.js" type="text/javascript"></script>