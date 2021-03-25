<?php
include_once '../security.php';
include_once '../conexion.php';


require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

if (empty($_SESSION['id_group'])) {
	header('Location: /');
	exit();
}

//Recuperamos los alumnos seleccionados
$i = 0;

$_SESSION['students'] = array();
$_SESSION['students_count'] = 0;

if (isset($_SESSION['user_student_group'])) {
	foreach ($_SESSION['user_student_group'] as $row) {
		if (isset($_POST['check-student-group' . $i . ''])) {
			$_SESSION['students'][$i] = $_POST['check-student-group' . $i . ''];

			$_SESSION['students_count'] += 1;
		} else {
			$_SESSION['students'][$i] = '';
		}

		$i += 1;
	}
}

if ($_SESSION['students_count'] == 0) {
	$_SESSION['msgbox_info'] = 0;
	$_SESSION['msgbox_error'] = 1;
	$_SESSION['text_msgbox_error'] = 'Debe seleccionar minimo un estudiante.';

	header('Location: /modules/groups');
	exit();
} else {
	$sql = "SELECT * FROM groups WHERE id_group = '" . $_SESSION['id_group'] . "' AND school_period = '" . $_SESSION['school_period_group'] . "'";

	if ($result = $conexion->query($sql)) {
		if ($row = mysqli_fetch_array($result)) {
			$_SESSION['msgbox_info'] = 0;
			$_SESSION['msgbox_error'] = 1;
			$_SESSION['text_msgbox_error'] = 'El grupo que intenta crear ya éxiste.';

			header('Location: /modules/groups');
		} else {
			$sql_insert = "INSERT INTO groups(id_group, school_period, name, semester, subjects) VALUES('" . $_SESSION['id_group'] . "', '" . $_SESSION['school_period_group'] . "', '" . $_SESSION['name_group'] . "', '" . intval($_SESSION['semester_group']) . "', '" . $_SESSION['subjects'] . "')";

			if (mysqli_query($conexion, $sql_insert)) {
				$i = 0;

				foreach ($_SESSION['students'] as $row) {
					if ($_SESSION['students'][$i] != '') {
						$sql_insert = "INSERT INTO groups_students(id_group, school_period, user_student) VALUES('" . $_SESSION['id_group'] . "', '" . $_SESSION['school_period_group'] . "', '" . $_SESSION['students'][$i] . "')";

						mysqli_query($conexion, $sql_insert);
					}

					$i += 1;
				}

				$_SESSION['msgbox_error'] = 0;
				$_SESSION['msgbox_info'] = 1;
				$_SESSION['text_msgbox_info'] = 'Registro cargado correctamente.';
			} else {
				$_SESSION['msgbox_info'] = 0;
				$_SESSION['msgbox_error'] = 1;
				$_SESSION['text_msgbox_error'] = 'Error al guardar datos en tabla.';
			}

			header('Location: /modules/groups');
		}
	}
}