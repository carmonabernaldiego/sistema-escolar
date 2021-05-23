<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

$_SESSION['user_id'] = array();
$_SESSION['teacher_name'] = array();
$_SESSION['teacher_surnames'] = array();

$sql = "SELECT * FROM teachers WHERE user = '" . $_POST['txtuserid'] . "'";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['user_id'][0] = $row['user'];
		$_SESSION['teacher_name'][0] = $row['name'];
		$_SESSION['teacher_surnames'][0] = $row['surnames'];
		$_SESSION['teacher_curp'][0] = $row['curp'];
		$_SESSION['teacher_rfc'][0] = $row['rfc'];
		$_SESSION['teacher_address'][0] = $row['address'];
		$_SESSION['teacher_phone'][0] = $row['phone'];
		$_SESSION['teacher_level_studies'][0] = $row['level_studies'];
		$_SESSION['teacher_specialty'][0] = $row['specialty'];

		$sql = "SELECT * FROM careers WHERE career = '" . $row['career'] . "' ORDER BY name";

		if ($result = $conexion->query($sql)) {
			while ($row = mysqli_fetch_array($result)) {
				$_SESSION['teacher_career'][0] = $row['career'];
				$_SESSION['teacher_career_name'][0] = $row['name'];
			}
		}
	}
}

echo '
<div class="form-data">
	<div class="head">
		<h1 class="titulo">Consultar</h1>
    </div>
    <div class="body">
        <form name="form-consult-teachers" action="" method="POST">
			<div class="wrap">
				<div class="first">
					<label class="label">Usuario</label>
					<input style="display: none;" type="text" name="btn" value="form_default"/>
					<input class="text" type="text" name="txt" value="' . $_SESSION['user_id'][0] . '" disabled/>
					<label class="label">Nombre</label>
					<input class="text" type="text" name="txtname" value="' . $_SESSION['teacher_name'][0] . '" autofocus disabled/>
					<label class="label">Apellidos</label>
					<input class="text" type="text" name="txtsurnames" value="' . $_SESSION['teacher_surnames'][0] . '" disabled/>
					<label class="label">CURP</label>
					<input class="text" type="text" name="txtcurp" value="' . $_SESSION['teacher_curp'][0] . '" disabled/>
					<label class="label">RFC</label>
					<input class="text" type="text" name="txtrfc" value="' . $_SESSION['teacher_rfc'][0] . '" disabled/>
				</div>
				<div class="last">
					<label class="label">Telefono</label>
					<input class="text" type="number" name="txtphone" value="' . $_SESSION['teacher_phone'][0] . '" disabled/>
					<label class="label">Domicilio</label>
					<input class="text" type="text" name="txtaddress" value="' . $_SESSION['teacher_address'][0] . '" disabled/>
					<label class="label">Facultad</label>
					<select class="select" name="selectcareer" disabled>
						<option value="' . $_SESSION['teacher_career'][0] . '">' . $_SESSION['teacher_career_name'][0] . '</option>
					</select>
					<label class="label">Nivel de estudios</label>
					<select class="select" name="selectnivelestudios" disabled>
				';
if ($_SESSION['teacher_level_studies'][0] == 'Licenciatura') {
	echo
	'
							<option value="Licenciatura">Licenciatura</option>
							<option value="Ingenieria">Ingenieria</option>
							<option value="Maestria">Maestria</option>
							<option value="Doctorado">Doctorado</option>
						';
} elseif ($_SESSION['teacher_level_studies'][0] == 'Ingenieria') {
	echo
	'
							<option value="Ingenieria">Ingenieria</option>
							<option value="Licenciatura">Licenciatura</option>
							<option value="Maestria">Maestria</option>
							<option value="Doctorado">Doctorado</option>
						';
} elseif ($_SESSION['teacher_level_studies'][0] == 'Maestria') {
	echo
	'
							<option value="Maestria">Maestria</option>
							<option value="Licenciatura">Licenciatura</option>
							<option value="Ingenieria">Ingenieria</option>
							<option value="Doctorado">Doctorado</option>
						';
} elseif ($_SESSION['teacher_level_studies'][0] == 'Doctorado') {
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
					<label class="label">Especialidad</label>
					<input class="text" type="text" name="txtspecialty" value="' . $_SESSION['teacher_specialty'][0] . '" disabled/>
				</div>
			</div>
			<button id="btnSave" class="btn icon" type="submit" autofocus>done</button>
        </form>
    </div>
</div>
';
echo '<div class="content-aside">';
include_once "../sections/options-disabled.php";
echo '</div>';