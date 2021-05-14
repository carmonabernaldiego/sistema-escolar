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
		<h1 class="titulo">Consultar</h1>
    </div>
    <div class="body">
        <form name="form-consult-students" action="" method="POST">
			<div class="wrap">
				<div class="first">
					<label class="label">Usuario</label>
					<input style="display: none;" type="text" name="btn" value="form_default"/>
					<input class="text" type="text" name="txt" value="' . $_SESSION['user_id'][0] . '" disabled/>
					<label class="label">Nombre</label>
					<input class="text" type="text" name="txtname" value="' . $_SESSION['student_name'][0] . '" autofocus disabled/>
					<label class="label">Apellidos</label>
					<input class="text" type="text" name="txtsurnames" value="' . $_SESSION['student_surnames'][0] . '" disabled/>
					<label class="label">CURP</label>
					<input class="text" type="text" name="txtcurp" value="' . $_SESSION['student_curp'][0] . '" disabled/>
					<label class="label">RFC</label>
					<input class="text" type="text" name="txtrfc" value="' . $_SESSION['student_rfc'][0] . '" disabled/>
				</div>
				<div class="last">
					<label class="label">Telefono</label>
					<input class="text" type="number" name="txtphone" value="' . $_SESSION['student_phone'][0] . '" disabled/>
					<label class="label">Domicilio</label>
					<input class="text" type="text" name="txtaddress" value="' . $_SESSION['student_address'][0] . '" disabled/>
					<label class="label">Carrera</label>
					<select class="select" name="selectcareer" disabled>
						<option value="' . $_SESSION['student_career'][0] . '">' . $_SESSION['student_career'][0] . '</option>
					</select>
					<label class="label">Documentación</label>
					<select class="select" name="selectdocumentation" disabled>
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
					<label class="label">Fecha de admisión</label>
					<input class="date" type="date" name="dateadmission" value="' . $_SESSION['student_admission_date'][0] . '" disabled/>
				</div>
			</div>
			<button class="btn icon" type="submit" autofocus>done</button>
        </form>
    </div>
</div>
';
echo '<div class="content-aside">';
include_once "../sections/options-disabled.php";
echo '</div>';