<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

$sql = "SELECT * FROM students WHERE user = '" . $_POST['txtuserid'] . "'";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['user_id'] = $row['user'];
		$_SESSION['student_name'] = $row['name'];
		$_SESSION['student_surnames'] = $row['surnames'];
		$_SESSION['student_gender'] = $row['gender'];
		$_SESSION['student_date_of_birth'] = $row['date_of_birth'];
		$_SESSION['student_curp'] = $row['curp'];
		$_SESSION['student_rfc'] = $row['rfc'];
		$_SESSION['student_phone'] = $row['phone'];
		$_SESSION['student_address'] = $row['address'];
		$_SESSION['student_career'] = $row['career'];
		$_SESSION['student_documentation'] = $row['documentation'];
		$_SESSION['student_admission_date'] = $row['admission_date'];
	}
}
?>
<div class="form-data">
	<div class="head">
		<h1 class="titulo">Actualizar</h1>
	</div>
	<div class="body">
		<form name="form-update-students" action="update.php" method="POST" autocomplete="off" autocapitalize="on">
			<div class="wrap">
				<div class="first">
					<label for="txtuserid" class="label">Usuario</label>
					<input id="txtuserid" style="display: none;" type="text" name="txtuserid" value="<?php echo $_SESSION['user_id']; ?>" maxlength="50">
					<input class="text" type="text" name="txt" value="<?php echo $_SESSION['user_id']; ?>" maxlength="50" disabled />
					<label for="txtusername" class="label">Nombre</label>
					<input id="txtusername" class="text" type="text" name="txtname" value="<?php echo $_SESSION['student_name']; ?>" placeholder="Nombre" autofocus maxlength="30" required />
					<label for="txtusersurnames" class="label">Apellidos</label>
					<input id="txtusersurnames" class="text" type="text" name="txtsurnames" value="<?php echo $_SESSION['student_surnames']; ?>" placeholder="Apellidos" maxlength="60" required />
					<label for="dateofbirth" class="label">Fecha de nacimiento</label>
					<input id="dateofbirth" class="date" type="text" name="dateofbirth" value="<?php echo $_SESSION['student_date_of_birth']; ?>" pattern="\d{4}-\d{2}-\d{2}" placeholder="aaaa-mm-dd" maxlength="10" required />
					<label for="selectgender" class="label">Género</label>
					<select id="selectgender" class="select" name="selectGender" required>
						<?php
						if ($_SESSION['student_gender'] == '') {
							echo '
								<option value="">Seleccioné</option>
								<option value="mujer">Mujer</option>
								<option value="hombre">Hombre</option>
								<option value="otro">Otro</option>
								<option value="nodecirlo">Prefiero no decirlo</option>
							';
						} elseif ($_SESSION['student_gender'] == 'mujer') {
							echo '
								<option value="mujer">Mujer</option>
								<option value="hombre">Hombre</option>
								<option value="otro">Otro</option>
								<option value="nodecirlo">Prefiero no decirlo</option>
							';
						} elseif ($_SESSION['student_gender'] == 'hombre') {
							echo '
								<option value="hombre">Hombre</option>
								<option value="mujer">Mujer</option>
								<option value="otro">Otro</option>
								<option value="nodecirlo">Prefiero no decirlo</option>
							';
						} elseif ($_SESSION['student_gender'] == 'otro') {
							echo '
								<option value="otro">Otro</option>
								<option value="mujer">Mujer</option>
								<option value="hombre">Hombre</option>
								<option value="nodecirlo">Prefiero no decirlo</option>
							';
						} elseif ($_SESSION['student_gender'] == 'nodecirlo') {
							echo '
								<option value="nodecirlo">Prefiero no decirlo</option>
								<option value="otro">Otro</option>
								<option value="mujer">Mujer</option>
								<option value="hombre">Hombre</option>
							';
						}
						?>
					</select>
					<label for="selectuserdocumentation" class="label">Documentación</label>
					<select id="selectuserdocumentation" class="select" name="selectDocumentation" required>
						<?php
						if ($_SESSION['student_documentation'] == '') {
							echo '
								<option value="">Seleccioné</option>
								<option value="1">Sí</option>
								<option value="0">No</option>
							';
						} else if ($_SESSION['student_documentation'][0] == 1) {
							echo
							'
								<option value="1">Sí</option>
								<option value="0">No</option>
							';
						} elseif ($_SESSION['student_documentation'][0] == 0) {
							echo
							'
								<option value="0">No</option>
								<option value="1">Sí</option>
							';
						}
						?>
					</select>
				</div>
				<div class="last">
					<label for="txtusercurp" class="label">CURP</label>
					<input id="txtusercurp" class="text" type="text" name="txtcurp" value="<?php echo $_SESSION['student_curp']; ?>" placeholder="Clave Única de Registro de Población" pattern="[A-Za-z0-9]{18}" maxlength="18" onkeyup="this.value = this.value.toUpperCase()" required />
					<label for="txtuserrfc" class="label">RFC</label>
					<input id="txtuserrfc" class="text" type="text" name="txtrfc" value="<?php echo $_SESSION['student_rfc']; ?>" placeholder="XAXX010101000" pattern="[A-Za-z0-9]{13}" maxlength="13" onkeyup="this.value = this.value.toUpperCase()" required />
					<label for="txtuserphone" class="label">Número de teléfono</label>
					<input id="txtuserphone" class="text" type="text" name="txtphone" value="<?php echo $_SESSION['student_phone']; ?>" pattern="[0-9]{10}" title="Ingresa un número de teléfono válido." placeholder="9998887766" maxlength="10" required />
					<label for="txtuseraddress" class="label">Domicilio</label>
					<input id="txtuseraddress" class="text" type="text" name="txtaddress" value="<?php echo $_SESSION['student_address']; ?>" placeholder="Domicilio" maxlength="200" required />
					<label for="selectusercareers" class="label">Carrera</label>
					<select id="selectusercareers" class="select" name="selectCareer" required>
						<?php
						$career = $_SESSION['student_career'];

						if ($career == '') {
							echo
							'
								<option value="">Seleccioné</option>
							';
						}

						$sql = "SELECT career, name FROM careers";

						if ($result = $conexion->query($sql)) {
							while ($row = mysqli_fetch_array($result)) {
								if ($row['career'] == $career) {
									echo
									'
										<option value="' . $row['career'] . '" selected>' . $row['name'] . '</option>
									';
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
					<label for="dateuseradmission" class="label">Fecha de admisión</label>
					<input id="dateuseradmission" class="date" type="date" name="dateadmission" value="<?php echo $_SESSION['student_admission_date']; ?>" required />
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
<script src="/js/modules/students.js" type="text/javascript"></script>