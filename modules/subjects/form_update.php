<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

$_SESSION['subject'] = array();
$_SESSION['subject_career'] = array();
$_SESSION['subject_name'] = array();
$_SESSION['subject_semester'] = array();
$_SESSION['subject_description'] = array();
$_SESSION['subject_teachers'] = null;
$_SESSION['subject_teachers_user'] = null;
$_SESSION['subject_teachers_name'] = null;

$sql = "SELECT * FROM subjects WHERE subject = '" . $_POST['txtsubject'] . "'";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['subject'][0] = $row['subject'];
		$_SESSION['subject_career'][0] = $row['career'];
		$_SESSION['subject_name'][0] = $row['name'];
		$_SESSION['subject_semester'][0] = $row['semester'];
		$_SESSION['subject_description'][0] = $row['description'];
		$_SESSION['subject_teachers'] = $row['user_teachers'];
	}
}

unset($_SESSION['subject_teachers_user']);
unset($_SESSION['subject_teachers_name']);

$_SESSION['subject_teachers_user'] = array();
$_SESSION['subject_teachers_name'] = array();

if (isset($_SESSION['subject_career'][0])) {
	$sql = "SELECT * FROM teachers WHERE career = '" . $_SESSION['subject_career'][0] . "' ORDER BY name";

	$i = 0;
	if ($result = $conexion->query($sql)) {
		while ($row = mysqli_fetch_array($result)) {
			$_SESSION['subject_teachers_user'][$i] = $row['user'];
			$_SESSION['subject_teachers_name'][$i] = $row['name'] . ' ' . $row['surnames'];

			$i += 1;
		}
	}
} else {
	print "<script>window.setTimeout(function() { window.location = '/modules/subjects' }, 0000);</script>";
	exit();
}
echo '
<div class="form-data">
	<div class="head">
		<h1 class="titulo">Actualizar</h1>
    </div>
	<div class="body">
		<form name="form-update-subjects" action="update.php" method="POST">
			<div class="wrap">
				<div class="first">
					<label class="label">Asignatura</label>
					<input style="display: none;" type="text" name="txtsubject" value="' . $_SESSION['subject'][0] . '"/>
					<input class="text" type="text" name="txtsubject" value="' . $_SESSION['subject'][0] . '" disabled/>
					<label class="label">Nombre</label>
					<input class="text" type="text" name="txtsubjectname" value="' . $_SESSION['subject_name'][0] . '" maxlength="100" required autofocus/>
					<label class="label">Descripción</label>
					<textarea class="textarea" name="txtsubjectdescription" data-expandable>' . $_SESSION['subject_description'][0] . '</textarea>	
				</div>
				<div class="last">
					<label class="label">Carrera</label>
					<select id="selectsubjectcareer" class="select" name="selectcareer" required>
				';
if (isset($_SESSION['subject_career'][0])) {
	$sql = "SELECT * FROM careers WHERE career = '" . $_SESSION['subject_career'][0] . "' ORDER BY name";

	if ($result = $conexion->query($sql)) {
		if ($row = mysqli_fetch_array($result)) {
			if ($row['career'] == $_SESSION['subject_career'][0]) {
				echo '<option value="' . $row['career'] . '">' . $row['name'] . '</option>';
			}
		}
	}
} else {
	echo '<option value="">Seleccioné</option>';
}

$i = 0;

$sql = "SELECT * FROM careers ORDER BY name";

if ($result = $conexion->query($sql)) {
	while ($row = mysqli_fetch_array($result)) {
		if ($row['career'] != $_SESSION['subject_career'][0]) {
			echo '<option value="' . $row['career'] . '">' . $row['name'] . '</option>';
		}
		$i += 1;
	}
}
echo
'
					</select>
					<label class="label">Semestre</label>
					<input class="text" type="number" name="txtsubjectsemester" value="' . $_SESSION['subject_semester'][0] . '" maxlength="2" min="1" max="12" list="defaultsemestres" required/>
					<datalist id="defaultsemestres">
';
for ($i = 1; $i <= 12; $i++) {
	echo '<option value="' . $i . '">';
}
echo '                        
                    </datalist>
				</div>
				<div class="content-full">
					<input style="display: none;" type="text" id="txtsubjectteachers" name="txtsubjectteachers" value="' . $_SESSION['subject_teachers'] . '"/>
                    <label class="label">Docente(s)</label>
                    <select class="select-careers-teachers" name="selectCareersTeachers[]" multiple="multiple" required>
';
$i = 0;

foreach ($_SESSION['subject_teachers_user'] as $row) {
	echo
	'
								<option value="' . $_SESSION['subject_teachers_user'][$i] . '">' . $_SESSION['subject_teachers_name'][$i] . '</option>
							';

	$i += 1;
}
echo '
                    </select>
                </div>
			</div>
			<button class="btn icon" type="submit">save</button>
        </form>
    </div>
</div>
';
echo '<div class="content-aside">';
include_once "../sections/options-disabled.php";
echo '
</div>
<script src="/js/dataexpandable.js"></script>
<script src="/js/updatecareer.js"></script>
';