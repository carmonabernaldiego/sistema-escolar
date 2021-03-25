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
			$sql_update = "UPDATE groups SET name = '" . $_SESSION['name_group'] . "', semester = '" . $_SESSION['semester_group'] . "', subjects = '" . $_SESSION['subjects'] . "' WHERE id_group = '" . $_SESSION['id_group'] . "' AND school_period = '" . $_SESSION['school_period_group'] . "'";

			if (mysqli_query($conexion, $sql_update)) {
				$i = 0;

				//Eliminamos alumnos para no tener duplicados, ya que se actualizaran e ingresaran como nuevos acorde al formulario form_update_students
				$sql_delete = "DELETE FROM groups_students WHERE id_group = '" . $_SESSION['id_group'] . "' AND school_period = '" . $_SESSION['school_period_group'] . "'";

				mysqli_query($conexion, $sql_delete);

				foreach ($_SESSION['students'] as $row) {
					if ($_SESSION['students'][$i] != '') {
						$sql_insert = "INSERT INTO groups_students(id_group, school_period, user_student) VALUES('" . $_SESSION['id_group'] . "', '" . $_SESSION['school_period_group'] . "', '" . $_SESSION['students'][$i] . "')";

						mysqli_query($conexion, $sql_insert);
					}

					$i += 1;
				}

				$_SESSION['msgbox_error'] = 0;
				$_SESSION['msgbox_info'] = 1;
				$_SESSION['text_msgbox_info'] = 'Registro actualizado correctamente.';
			} else {
				$_SESSION['msgbox_info'] = 0;
				$_SESSION['msgbox_error'] = 1;
				$_SESSION['text_msgbox_error'] = 'Error al modificar datos en tabla.';
			}

			header('Location: /modules/groups');
		} else {
			$_SESSION['msgbox_info'] = 0;
			$_SESSION['msgbox_error'] = 1;
			$_SESSION['text_msgbox_error'] = 'El grupo que intenta actualizar no éxiste.';

			header('Location: /modules/groups');
		}
	}
}