<?php
include_once '../notif_info_msgbox.php';

require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

$sql = "SELECT COUNT(career) AS total FROM careers";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		if ($row['total'] == 0) {
			Error('Crea como mínimo una carrera antes de agregar alumnos.');
			header('Location: /modules/careers');
			exit();
		} else {
			$sql = "SELECT COUNT(user) AS total FROM students";

			if ($result = $conexion->query($sql)) {
				if ($row = mysqli_fetch_array($result)) {
					$tpages = ceil($row['total'] / $max);
				}
			}

			if (!empty($_POST['search'])) {
				$_POST['search'] = trim($_POST['search']);
				$_POST['search'] = mysqli_real_escape_string($conexion, $_POST['search']);

				$_SESSION['user_id'] = array();
				$_SESSION['student_name'] = array();
				$_SESSION['student_curp'] = array();
				$_SESSION['student_date'] = array();

				$i = 0;

				$sql = "SELECT * FROM students WHERE user LIKE '%" . $_POST['search'] . "%' OR name LIKE '%" . $_POST['search'] . "%' OR surnames LIKE '%" . $_POST['search'] . "%' OR curp LIKE '%" . $_POST['search'] . "%' OR admission_date LIKE '%" . $_POST['search'] . "%' ORDER BY name";

				if ($result = $conexion->query($sql)) {
					while ($row = mysqli_fetch_array($result)) {
						$_SESSION['user_id'][$i] = $row['user'];
						$_SESSION['student_curp'][$i] = $row['curp'];
						$_SESSION['student_name'][$i] = $row['name'] . ' ' . $row['surnames'];
						$_SESSION['student_date'][$i] = $row['admission_date'];

						$i += 1;
					}
				}
				$_SESSION['total_users'] = count($_SESSION['user_id']);
			} else {
				$_SESSION['user_id'] = array();
				$_SESSION['student_name'] = array();
				$_SESSION['student_curp'] = array();
				$_SESSION['student_date'] = array();

				$i = 0;

				$sql = "SELECT * FROM students ORDER BY created_at DESC, user, name LIMIT $inicio, $max";

				if ($result = $conexion->query($sql)) {
					while ($row = mysqli_fetch_array($result)) {
						$_SESSION['user_id'][$i] = $row['user'];
						$_SESSION['student_curp'][$i] = $row['curp'];
						$_SESSION['student_name'][$i] = $row['name'] . ' ' . $row['surnames'];
						$_SESSION['student_date'][$i] = $row['admission_date'];

						$i += 1;
					}
				}
				$_SESSION['total_users'] = count($_SESSION['user_id']);
			}
		}
	}
}