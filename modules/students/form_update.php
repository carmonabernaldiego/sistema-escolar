<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

$_SESSION['user_id'] = array();
$_SESSION['student_name'] = array();
$_SESSION['student_surnames'] = array();

$sql = "SELECT * FROM students WHERE user = '" . $_POST['txtuserid'] . "'";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['user_id'][0] = $row['user'];
		$_SESSION['student_name'][0] = $row['name'];
		$_SESSION['student_surnames'][0] = $row['surnames'];
		$_SESSION['student_curp'][0] = $row['curp'];
		$_SESSION['student_rfc'][0] = $row['rfc'];
		$_SESSION['student_address'][0] = $row['address'];
		$_SESSION['student_phone'][0] = $row['phone'];
		$_SESSION['student_career'][0] = $row['career'];
		$_SESSION['student_documentation'][0] = $row['documentation'];
		$_SESSION['student_admission_date'][0] = $row['admission_date'];
	}
}

echo '
<div class="form-data">
	<div class="head">
		<h1 class="titulo">Actualizar</h1>
    </div>
    <div class="body">
        <form name="form-update-students" action="update.php" method="POST">
			<div class="wrap">
				<div class="first">
					<label for="txtuserid" class="label">Usuario</label>
					<input style="display: none;" type="text" name="txtuserid" value="' . $_SESSION['user_id'][0] . '"/>
					<input id="txtuserid" class="text" type="text" name="txt" value="' . $_SESSION['user_id'][0] . '" disabled/>
					<label for="txtusername" class="label">Nombre</label>
					<input id="txtusername" class="text" type="text" name="txtname" value="' . $_SESSION['student_name'][0] . '" autofocus maxlength="25" required/>
					<label for="txtusersurnames" class="label">Apellidos</label>
					<input id="txtusersurnames" class="text" type="text" name="txtsurnames" value="' . $_SESSION['student_surnames'][0] . '" maxlength="50" required/>
					<label for="txtusercurp" class="label">CURP</label>
					<input id="txtusercurp" class="text" type="text" name="txtcurp" value="' . $_SESSION['student_curp'][0] . '" maxlength="18" onkeyup="this.value = this.value.toUpperCase()" required/>
					<label for="txtuserrfc" class="label">RFC</label>
					<input id="txtuserrfc" class="text" type="text" name="txtrfc" value="' . $_SESSION['student_rfc'][0] . '" maxlength="13" onkeyup="this.value = this.value.toUpperCase()" required/>
				</div>
				<div class="last">
					<label for="txtuserphone" class="label">Telefono</label>
					<input id="txtuserphone" class="text" type="number" name="txtphone" value="' . $_SESSION['student_phone'][0] . '" min="0" max="9999999999" maxlength="10" required/>
					<label for="txtuseraddress" class="label">Domicilio</label>
					<input id="txtuseraddress" class="text" type="text" name="txtaddress" value="' . $_SESSION['student_address'][0] . '" maxlength="100" required/>
					<label for="selectusercareer" class="label">Carrera</label>
					<select id="selectusercareer" class="select" name="selectcareer">
						<option value="' . $_SESSION['student_career'][0] . '">' . $_SESSION['student_career'][0] . '</option>
				';
$i = 0;

$sql = "SELECT * FROM careers ORDER BY name";

if ($result = $conexion->query($sql)) {
	while ($row = mysqli_fetch_array($result)) {
		if ($_SESSION['student_career'][0] != $row['name']) {
			echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
		}

		$i += 1;
	}
} else {
	$_SESSION['msgbox_info'] = 0;
	$_SESSION['msgbox_error'] = 1;
	$_SESSION['text_msgbox_error'] = 'No existen registros en el modulo de carreras.';

	header('Location: /modules/students');
}
echo '
					</select>
					<label for="selectuserdocumentation" class="label">Documentación</label>
					<select id="selectuserdocumentation" class="select" name="selectdocumentation">
				';
if ($_SESSION['student_documentation'][0] == 1) {
	echo
	'
							<option value="1">Si</option>
							<option value="0">No</option>
						';
} elseif ($_SESSION['student_documentation'][0] == 0) {
	echo
	'
							<option value="0">No</option>
							<option value="1">Si</option>
						';
}
echo '
					</select>
					<label for="dateuseradmission" class="label">Fecha de admisión</label>
					<input id="dateuseradmission" class="date" type="date" name="dateadmission" value="' . $_SESSION['student_admission_date'][0] . '" required/>
				</div>
			</div>
			<button id="btnSave" class="btn icon" type="submit">save</button>
        </form>
    </div>
</div>
';
echo '<div class="content-aside">';
include_once "../sections/options-disabled.php";
echo '</div>';