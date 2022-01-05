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

if (!isset($_SESSION['temp_subject_name'])) {
	$_SESSION['temp_subject_name'] = $_SESSION['subject_name'][0];
}
if (!isset($_SESSION['temp_subject_semester'])) {
	$_SESSION['temp_subject_semester'] = $_SESSION['subject_semester'][0];
}
if (!isset($_SESSION['temp_subject_description'])) {
	$_SESSION['temp_subject_description'] = $_SESSION['subject_description'][0];
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
		<form name="form-update-subjects" action="update.php" method="POST" onsubmit="return sendTeachers()">
			<div class="wrap">
				<div class="first">
					<label for="txtsubjectid" class="label">Asignatura</label>
					<input style="display: none;" type="text" name="txtsubject" value="' . $_SESSION['subject'][0] . '"/>
					<input id="txtsubjectid" class="text" type="text" id="txtsubject" name="txtsubject" value="' . $_SESSION['subject'][0] . '" maxlength="20" onkeyup="this.value = this.value.toUpperCase()" disabled/>
					<label for="txtsubjectname" class="label">Nombre</label>
                    <input id="txtsubjectname" class="text" type="text" id="txtsubjectname" name="txtsubjectname" value="';
if (isset($_SESSION['temp_subject_name'])) {
	echo $_SESSION['temp_subject_name'];
}
echo '" maxlength="100" required autofocus/>
					<label for="txtsubjectdescription" class="label">Descripción</label>
					<textarea id="txtsubjectdescription" maxlength="2000" class="textarea" id="txtsubjectdescription" name="txtsubjectdescription" data-expandable>';
if (isset($_SESSION['temp_subject_description'])) {
	echo $_SESSION['temp_subject_description'];
}
echo '</textarea>
				</div>
				<div class="last">
					<label for="selectsubjectcareer" class="label">Carrera</label>
					<select id="selectsubjectcareer" class="selectCareer" name="selectcareer" required>';
if (isset($_SESSION['temp_subject_career_id'])) {
	if (isset($_SESSION['temp_subject_career_id'])) {
		echo '<option value="' . $_SESSION['temp_subject_career_id'] . '">' . $_SESSION['temp_subject_career_name'] . '</option>';
	}

	$i = 0;

	$sql = "SELECT * FROM careers ORDER BY name";

	if ($result = $conexion->query($sql)) {
		while ($row = mysqli_fetch_array($result)) {
			if ($row['career'] != $_SESSION['temp_subject_career_id']) {
				echo '<option value="' . $row['career'] . '">' . $row['name'] . '</option>';
			}
			$i += 1;
		}
	}
} else {
	$sql = "SELECT career, name FROM careers WHERE career = '" . $_SESSION['subject_career'][0] . "' ORDER BY name";

	if ($result = $conexion->query($sql)) {
		if ($row = mysqli_fetch_array($result)) {
			echo '<option value="' . $row['career'] . '">' . $row['name'] . '</option>';
			$_SESSION['temp_subject_career_id'] = $row['career'];
			$_SESSION['temp_subject_career_name'] = $row['name'];
		}
	}

	$i = 0;

	$sql = "SELECT career, name FROM careers ORDER BY name";

	if ($result = $conexion->query($sql)) {
		while ($row = mysqli_fetch_array($result)) {
			if ($row['career'] != $_SESSION['subject_career'][0]) {
				echo '<option value="' . $row['career'] . '">' . $row['name'] . '</option>';
			}
			$i += 1;
		}
	}
}
echo '
					</select>
					<label for="txtsubjectsemester" class="label">Semestre</label>
                    <input class="text" type="number" id="txtsubjectsemester" name="txtsubjectsemester" value="';
if (isset($_SESSION['temp_subject_semester'])) {
	echo $_SESSION['temp_subject_semester'];
}
echo '" maxlength="2" min="1" max="12" list="defaultsemestres" required/>
					<datalist id="defaultsemestres">
';
for ($i = 1; $i <= 12; $i++) {
	echo '<option value="' . $i . '">';
}
echo '
                    </datalist>
				</div>
				<div class="content-full">';
if (isset($_SESSION['temp_subject_career_id']) == '') {
	$_SESSION['temp_subject_career_id'] = $_SESSION['subject_career'][0];
	$_SESSION['temp_select_teachers'] = $_SESSION['subject_teachers'];
}
echo '
					<input style="display: none;" type="text" id="txtsubjectcareer" name="txtsubjectcareer" value="' . $_SESSION['subject_career'][0] . '"/>
					<input style="display: none;" type="text" id="tempsubjectcareer" name="tempsubjectcareer" value="' . $_SESSION['temp_subject_career_id'] . '"/>
					<input style="display: none;" type="text" id="txtsubjectteachers" name="txtsubjectteachers" value="' . $_SESSION['subject_teachers'] . '"/>
                    <label for="selectcareersteachers" class="label">Docente(s)</label>
                    <select id="selectcareersteachers" class="select-careers-teachers" name="selectCareersTeachers[]" multiple="multiple" required>
';
if (isset($_SESSION['temp_subject_teachers_user'])) {
	$i = 0;

	foreach ($_SESSION['temp_subject_teachers_user'] as $row) {
		echo
		'
								<option value="' . $_SESSION['temp_subject_teachers_user'][$i] . '">' . $_SESSION['temp_subject_teachers_name'][$i] . '</option>
		';

		$i += 1;
	}
} else {
	$i = 0;

	foreach ($_SESSION['subject_teachers_user'] as $row) {
		echo
		'
									<option value="' . $_SESSION['subject_teachers_user'][$i] . '">' . $_SESSION['subject_teachers_name'][$i] . '</option>
			';

		$i += 1;
	}
}
echo '
                    </select>
                </div>
			</div>
			<button id="btnSave" class="btn icon" type="submit">save</button>
        </form>
    </div>
</div>
';
echo '<div class="content-aside">';
include_once "../sections/options-disabled.php";
echo '
</div>
<script src="/js/controls/dataexpandable.js"></script>
<script src="/js/modules/updatesubject.js"></script>
';
