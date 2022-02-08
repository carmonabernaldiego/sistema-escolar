<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

$sql = "SELECT * FROM teachers WHERE user = '" . $_POST['txtuserid'] . "'";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['user_id'] = $row['user'];
		$_SESSION['teacher_name'] = $row['name'];
		$_SESSION['teacher_surnames'] = $row['surnames'];
		$_SESSION['teacher_date_of_birth'] = $row['date_of_birth'];
		$_SESSION['teacher_gender'] = $row['gender'];
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
		<h1 class="titulo">Consultar</h1>
	</div>
	<div class="body">
		<form name="form-consult-teachers" action="#" method="POST">
			<div class="wrap">
				<div class="first">
					<label class="label">Usuario</label>
					<input style="display: none;" type="text" name="btn" value="form_default" />
					<input class="text" type="text" name="txt" value="<?php echo $_SESSION['user_id']; ?>" disabled />
					<label class="label">Nombre</label>
					<input class="text" type="text" name="txtname" value="<?php echo $_SESSION['teacher_name']; ?>" disabled />
					<label class="label">Apellidos</label>
					<input class="text" type="text" name="txtsurnames" value="<?php echo $_SESSION['teacher_surnames']; ?>" disabled />
					<label for="dateofbirth" class="label">Fecha de nacimiento</label>
					<input id="dateofbirth" class="date" type="text" name="dateofbirth" value="<?php echo $_SESSION['teacher_date_of_birth']; ?>" disabled />
					<label for="selectgender" class="label">Género</label>
					<select id="selectgender" class="select" name="selectgender" disabled>
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
					<label class="label">CURP</label>
					<input class="text" type="text" name="txtcurp" value="<?php echo $_SESSION['teacher_curp']; ?>" disabled />
					<label class="label">RFC</label>
					<input class="text" type="text" name="txtrfc" value="<?php echo $_SESSION['teacher_rfc']; ?>" disabled />
					<label class="label">Número de teléfono</label>
					<input class="text" type="text" name="txtphone" value="<?php echo $_SESSION['teacher_phone']; ?>" disabled />
					<label class="label">Domicilio</label>
					<input class="text" type="text" name="txtaddress" value="<?php echo $_SESSION['teacher_address']; ?>" disabled />
					<label class="label">Especialidad</label>
					<input class="text" type="text" name="txtspecialty" value="<?php echo $_SESSION['teacher_specialty']; ?>" disabled />
				</div>
				<div class="content-full">
					<label class="label">Nivel de estudios</label>
					<select class="select" name="selectnivelestudios" disabled>
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
					<label class="label">Carrera</label>
					<select class="select-user-careers disabled" name="selectCareers[]" multiple="multiple" disabled>
						<?php
						$_SESSION['teacher_career'] = trim($_SESSION['teacher_career'], ',');
						$arraySubjectTeachers = explode(',', $_SESSION['teacher_career']);

						foreach ($arraySubjectTeachers as $key) {
							$sql = "SELECT career, name FROM careers where career = '" . $key . "'";

							if ($result = $conexion->query($sql)) {
								while ($row = mysqli_fetch_array($result)) {
									$_SESSION['teacher_career_id'] = $row['career'];
									$_SESSION['teacher_career_name'] = $row['name'];
								}
								if ($_SESSION['teacher_career_id'] != '') {
									echo
									'
										<option value="' . $_SESSION['teacher_career_id'] . '" selected>' . $_SESSION['teacher_career_name'] . '</option>
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
			<button id="btnSave" class="btn icon" type="submit" autofocus>done</button>
		</form>
	</div>
</div>
<div class="content-aside">
	<?php include_once "../sections/options-disabled.php"; ?>
</div>
<script src="/js/modules/teachers.js" type="text/javascript"></script>