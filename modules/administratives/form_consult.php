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
		$_SESSION['administrative_curp'][0] = $row['curp'];
		$_SESSION['administrative_rfc'][0] = $row['rfc'];
		$_SESSION['administrative_address'][0] = $row['address'];
		$_SESSION['administrative_phone'][0] = $row['phone'];
		$_SESSION['administrative_level_studies'][0] = $row['level_studies'];
		$_SESSION['administrative_employment'][0] = $row['employment'];
		$_SESSION['administrative_observation'][0] = $row['observations'];
	}
}

echo '
<div class="form-data">
	<div class="head">
		<h1 class="titulo">Consultar</h1>
    </div>
    <div class="body">
        <form name="form-consult-administratives" action="" method="POST">
			<div class="wrap">
				<div class="first">
					<label class="label">Usuario</label>
					<input style="display: none;" type="text" name="btn" value="form_default"/>
					<input class="text" type="text" name="txt" value="' . $_SESSION['user_id'][0] . '" disabled/>
					<label class="label">Nombre</label>
					<input class="text" type="text" name="txtname" value="' . $_SESSION['administrative_name'][0] . '" autofocus disabled/>
					<label class="label">Apellidos</label>
					<input class="text" type="text" name="txtsurnames" value="' . $_SESSION['administrative_surnames'][0] . '" disabled/>
					<label class="label">CURP</label>
					<input class="text" type="text" name="txtcurp" value="' . $_SESSION['administrative_curp'][0] . '" disabled/>
					<label class="label">RFC</label>
					<input class="text" type="text" name="txtrfc" value="' . $_SESSION['administrative_rfc'][0] . '" disabled/>
				</div>
				<div class="last">
					<label class="label">Telefono</label>
					<input class="text" type="number" name="txtphone" value="' . $_SESSION['administrative_phone'][0] . '" disabled/>
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
					<input class="text" type="text" name="txtemployment" value="' . $_SESSION['administrative_employment'][0] . '" disabled/>
					<label class="label">Observación</label>
					<input class="text" type="text" name="txtobservation" value="' . $_SESSION['administrative_observation'][0] . '" disabled/>
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