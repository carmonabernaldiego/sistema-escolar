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
		<h1 class="titulo">Consultar</h1>
	</div>
	<div class="body">
		<form name="form-consult-administratives" action="#" method="POST">
			<div class="wrap">
				<div class="first">
					<label class="label">Usuario</label>
					<input style="display: none;" type="text" name="btn" value="form_default" />
					<input class="text" type="text" name="txt" value="<?php echo $_SESSION['user_id']; ?>" disabled />
					<label class="label">Nombre</label>
					<input class="text" type="text" name="txtname" value="<?php echo $_SESSION['administrative_name']; ?>" disabled />
					<label class="label">Apellidos</label>
					<input class="text" type="text" name="txtsurnames" value="<?php echo $_SESSION['administrative_surnames']; ?>" disabled />
					<label for="dateofbirth" class="label">Fecha de nacimiento</label>
					<input id="dateofbirth" class="date" type="text" name="dateofbirth" value="<?php echo $_SESSION['administrative_date_of_birth']; ?>" disabled />
					<label for="selectgender" class="label">Género</label>
					<select id="selectgender" class="select" name="selectgender" disabled>
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
					<label class="label">CURP</label>
					<input class="text" type="text" name="txtcurp" value="<?php echo $_SESSION['administrative_curp']; ?>" disabled />
				</div>
				<div class="last">
					<label class="label">RFC</label>
					<input class="text" type="text" name="txtrfc" value="<?php echo $_SESSION['administrative_rfc']; ?>" disabled />
					<label class="label">Número de teléfono</label>
					<input class="text" type="text" name="txtphone" value="<?php echo $_SESSION['administrative_phone']; ?>" disabled />
					<label class="label">Domicilio</label>
					<input class="text" type="text" name="txtaddress" value="<?php echo $_SESSION['administrative_address']; ?>" disabled />
					<label class="label">Nivel de estudios</label>
					<select class="select" name="selectnivelestudios" disabled>
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
					<label class="label">Cargo</label>
					<input class="text" type="text" name="txtoccupation" value="<?php echo $_SESSION['administrative_occupation']; ?>" disabled />
					<label class="label">Observación</label>
					<input class="text" type="text" name="txtobservation" value="<?php echo $_SESSION['administrative_observations']; ?>" disabled />
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
<script src="/js/modules/administratives.js" type="text/javascript"></script>