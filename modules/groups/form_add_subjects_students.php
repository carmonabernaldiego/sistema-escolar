<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

//Recuperar datos del form_add
if (isset($_POST['txtgroup'])) {
	$_SESSION['id_group'] = $_POST['txtgroup'];
	$_SESSION['school_period_group'] = $_SESSION['school_period'];
	$_SESSION['name_group'] = $_POST['txtgroupname'];
	$_SESSION['semester_group'] = $_POST['txtgroupsemester'];
}

//Cargamos datos de las Asignaturas
if (isset($_SESSION['school_period_group']) != '') {
	$_SESSION['subjects_group'] = array();
	$_SESSION['subject_name_group'] = array();

	$i = 0;

	$sql = "SELECT * FROM subjects WHERE school_period = '" . $_SESSION['school_period_group'] . "' AND semester = '" . $_SESSION['semester_group'] . "' ORDER BY name";

	if ($result = $conexion->query($sql)) {
		while ($row = mysqli_fetch_array($result)) {
			$_SESSION['subjects_group'][$i] = $row['subject'];
			$_SESSION['subject_name_group'][$i] = $row['name'];

			$i += 1;
		}
	}
}
?>
<div class="form-data">
	<div class="head">
		<h1 class="titulo">Agregar</h1>
	</div>
	<div class="body">
		<form name="form-add-groups-subjects" action="" method="POST">
			<div class="wrap">
				<?php
				echo
				'
						<table class="default">
							<tr>
								<th class="center" colspan="2">Asignaturas</th>
							</tr>
							';
				$i = 0;

				if (!empty($_SESSION['subjects_group'])) {
					foreach ($_SESSION['subjects_group'] as $row) {
						echo '
											<tr>
												<td style="width: 40px;"><input class="cbox-subject" id="cbox-subject' . $i . '" type="checkbox" name="check-subject-group' . $i . '" value="' . $_SESSION['subjects_group'][$i] . '"></td>
												<td><label for="cbox-subject' . $i . '">' . $_SESSION['subject_name_group'][$i] . '</label></td>
											</tr>
										';

						$i += 1;
					}
				} else {
					$_SESSION['msgbox_info'] = 0;
					$_SESSION['msgbox_error'] = 1;
					$_SESSION['text_msgbox_error'] = 'No se encontraron Asignaturas para el semestre seleccionado.';
				}
				echo '
						</table>
                    ';
				?>
				<button class="btn-add-students" name="btn" value="form_add_students" type="submit">Alumnos</button>
			</div>
		</form>
	</div>
</div>
<div class="content-aside">
	<?php
	include_once "../sections/options-disabled.php";
	?>
</div>