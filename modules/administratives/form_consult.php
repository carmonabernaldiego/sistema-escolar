<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin.php');

$_SESSION['user_id'] = array();
$_SESSION['administrative_name'] = array();
$_SESSION['administrative_surnames'] = array();

$sql = "SELECT * FROM administratives WHERE user = '" . $_POST['txtuserid'] . "'";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['user_id'][0] = $row['user'];
		$_SESSION['administrative_name'][0] = $row['name'];
		$_SESSION['administrative_surnames'][0] = $row['surnames'];
		$_SESSION['administrative_gender'][0] = $row['gender'];
		$_SESSION['administrative_date_of_birth'][0] = $row['date_of_birth'];
		$_SESSION['administrative_curp'][0] = $row['curp'];
		$_SESSION['administrative_rfc'][0] = $row['rfc'];
		$_SESSION['administrative_phone'][0] = $row['phone'];
		$_SESSION['administrative_address'][0] = $row['address'];
		$_SESSION['administrative_level_studies'][0] = $row['level_studies'];
		$_SESSION['administrative_occupation'][0] = $row['occupation'];
		$_SESSION['ss'][0] = $row['observations'];
	}
}

echo '
<div class="form-data">
	<div class="head">
		<h1 class="titulo">Consultar</h1>
    </div>
    <div class="body">
        <form name="form-consult-administratives" action="#" method="POST">
			<div class="wrap">
				<div class="first">
					<label class="label">Usuario</label>
					<input style="display: none;" type="text" name="btn" value="form_default"/>
					<input class="text" type="text" name="txt" value="' . $_SESSION['user_id'][0] . '" disabled/>
					<label class="label">Nombre</label>
					<input class="text" type="text" name="txtname" value="' . $_SESSION['administrative_name'][0] . '" disabled/>
					<label class="label">Apellidos</label>
					<input class="text" type="text" name="txtsurnames" value="' . $_SESSION['administrative_surnames'][0] . '" disabled/>
					<label for="dateofbirth" class="label">Fecha de nacimiento</label>
                    <input id="dateofbirth" class="date" type="text" name="dateofbirth" value="' . $_SESSION['administrative_date_of_birth'][0] . '" disabled/>
                    <label for="selectgender" class="label">Género</label>
                    <select id="selectgender" class="select" name="selectgender" disabled>
					';
if ($_SESSION['administrative_gender'][0] == '') {
	echo '
						<option value="">Seleccioné</option>
                        <option value="mujer">Mujer</option>
                        <option value="hombre">Hombre</option>
                        <option value="otro">Otro</option>
                        <option value="nodecirlo">Prefiero no decirlo</option>
	';
} elseif ($_SESSION['administrative_gender'][0] == 'mujer') {
	echo '
						<option value="mujer">Mujer</option>
                        <option value="hombre">Hombre</option>
                        <option value="otro">Otro</option>
                        <option value="nodecirlo">Prefiero no decirlo</option>
	';
} elseif ($_SESSION['administrative_gender'][0] == 'hombre') {
	echo '
						<option value="hombre">Hombre</option>
						<option value="mujer">Mujer</option>
                        <option value="otro">Otro</option>
                        <option value="nodecirlo">Prefiero no decirlo</option>
	';
} elseif ($_SESSION['administrative_gender'][0] == 'otro') {
	echo '
						<option value="otro">Otro</option>
						<option value="mujer">Mujer</option>
                        <option value="hombre">Hombre</option>
                        <option value="nodecirlo">Prefiero no decirlo</option>
	';
}elseif ($_SESSION['administrative_gender'][0] == 'nodecirlo') {
	echo '
						<option value="nodecirlo">Prefiero no decirlo</option>
						<option value="otro">Otro</option>
						<option value="mujer">Mujer</option>
                        <option value="hombre">Hombre</option>
	';
}
echo '
                    </select>
					<label class="label">CURP</label>
					<input class="text" type="text" name="txtcurp" value="' . $_SESSION['administrative_curp'][0] . '" disabled/>
				</div>
				<div class="last">
					<label class="label">RFC</label>
					<input class="text" type="text" name="txtrfc" value="' . $_SESSION['administrative_rfc'][0] . '" disabled/>
					<label class="label">Telefono</label>
					<input class="text" type="text" name="txtphone" value="' . $_SESSION['administrative_phone'][0] . '" disabled/>
					<label class="label">Domicilio</label>
					<input class="text" type="text" name="txtaddress" value="' . $_SESSION['administrative_address'][0] . '" disabled/>
					<label class="label">Nivel de estudios</label>
					<select class="select" name="selectnivelestudios" disabled>
				';
if ($_SESSION['administrative_level_studies'][0] == 'Licenciatura') {
	echo
	'
							<option value="Licenciatura">Licenciatura</option>
							<option value="Ingenieria">Ingenieria</option>
							<option value="Maestria">Maestria</option>
							<option value="Doctorado">Doctorado</option>
						';
} elseif ($_SESSION['administrative_level_studies'][0] == 'Ingenieria') {
	echo
	'
							<option value="Ingenieria">Ingenieria</option>
							<option value="Licenciatura">Licenciatura</option>
							<option value="Maestria">Maestria</option>
							<option value="Doctorado">Doctorado</option>
						';
} elseif ($_SESSION['administrative_level_studies'][0] == 'Maestria') {
	echo
	'
							<option value="Maestria">Maestria</option>
							<option value="Licenciatura">Licenciatura</option>
							<option value="Ingenieria">Ingenieria</option>
							<option value="Doctorado">Doctorado</option>
						';
} elseif ($_SESSION['administrative_level_studies'][0] == 'Doctorado') {
	echo
	'
							<option value="Doctorado">Doctorado</option>
							<option value="Licenciatura">Licenciatura</option>
							<option value="Ingenieria">Ingenieria</option>
							<option value="Maestria">Maestria</option>
						';
}
echo '
					</select>
					<label class="label">Cargo</label>
					<input class="text" type="text" name="txtoccupation" value="' . $_SESSION['administrative_occupation'][0] . '" disabled/>
					<label class="label">Observación</label>
					<input class="text" type="text" name="txtobservation" value="' . $_SESSION['administrative_observations'][0] . '" disabled/>
				</div>
			</div>
			<button id="btnBack" class="btn back icon" type="button">arrow_back</button>
			<button id="btnNext" class="btn icon" type="button">arrow_forward</button>
			<button id="btnSave" class="btn icon" type="submit" autofocus>done</button>
		</form>
    </div>
</div>
';
echo '<div class="content-aside">';
include_once "../sections/options-disabled.php";
echo '</div>
<script src="/js/administratives.js" type="text/javascript"></script>';