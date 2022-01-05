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
echo '
<div class="form-data">
	<div class="head">
		<h1 class="titulo">Consultar</h1>
    </div>
	<div class="body">
		<form name="form-consult-subjects" action="" method="POST">
			<div class="wrap">
				<div class="first">
					<label class="label">Asignatura</label>
					<input style="display: none;" type="text" name="txtsubject" value="' . $_SESSION['subject'][0] . '"/>
					<input class="text" type="text" name="txtsubject" value="' . $_SESSION['subject'][0] . '" disabled/>
					<label class="label">Nombre</label>
					<input class="text" type="text" name="txtsubjectname" value="' . $_SESSION['subject_name'][0] . '" maxlength="100" required disabled/>
					<label class="label">Descripción</label>
					<textarea disabled class="textarea" name="txtsubjectdescription" data-expandable>' . $_SESSION['subject_description'][0] . '</textarea>
				</div>
				<div class="last">
					<label class="label">Carrera</label>
					<select class="select" disabled>
					';
$_SESSION['subject_career_id'] = array();
$_SESSION['subject_career_name'] = array();

$sql = "SELECT * FROM careers where career = '" . $_SESSION['subject_career'][0] . "'";

if ($result = $conexion->query($sql)) {
	while ($row = mysqli_fetch_array($result)) {
		$_SESSION['subject_career_id'][0] = $row['career'];
		$_SESSION['subject_career_name'][0] = $row['name'];
	}
}
echo
'
							<option value="' . $_SESSION['subject_career_id'][0] . '">' . $_SESSION['subject_career_name'][0] . '</option>
						';
echo
'
					</select>
					<label class="label">Semestre</label>
					<input class="text" type="number" name="txtsubjectsemester" value="' . $_SESSION['subject_semester'][0] . '" maxlength="2" min="1" max="12" disabled/>
				</div>
				<div class="content-full">
                    <label class="label">Docente(s)</label>
                    <select class="select-careers-teachers disabled" name="selectCareersTeachers[]" multiple="multiple" disabled>
';
$_SESSION['subject_teachers'] = trim($_SESSION['subject_teachers'], ',');
$arraySubjectTeachers = explode(',', $_SESSION['subject_teachers']);

foreach ($arraySubjectTeachers as $key) {
	$sql = "SELECT user, name, surnames FROM teachers where user = '" . $key . "'";

	if ($result = $conexion->query($sql)) {
		while ($row = mysqli_fetch_array($result)) {
			$_SESSION['subject_teachers_user'] = $row['user'];
			$_SESSION['subject_teachers_name'] = $row['name'] . ' ' . $row['surnames'];
		}
		if ($_SESSION['subject_teachers_user'] != '') {
			echo
			'
							<option value="' . $_SESSION['subject_teachers_user'] . '" selected>' . $_SESSION['subject_teachers_name'] . '</option>
			';
		}
	}
}
echo
'
                    </select>
                </div>
			</div>
			<button id="btnSave" class="btn icon" type="submit" autofocus>done</button>
        </form>
    </div>
</div>
';
echo '<div class="content-aside">';
include_once "../sections/options-disabled.php";
echo '
</div>
<script src="/js/controls/dataexpandable.js"></script>
<script src="/js/modules/consultcareer.js"></script>
<script>
	$(document).ready(function() {
		$(".select").select2({
			minimumResultsForSearch: Infinity
		});
	});
</script>
';
