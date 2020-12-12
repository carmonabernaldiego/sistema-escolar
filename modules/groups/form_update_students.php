<?php
	require_once($_SESSION['raiz'].'/modules/sections/role-access-admin-editor.php');

	//Recuperamos las Asignaturas seleccionadas del form_add_subjects
	$i = 0;

	$_SESSION['subjects'] = '';
	$_SESSION['subjects_count'] = 0;

	if(isset($_SESSION['subjects_group']))
	{
		foreach($_SESSION['subjects_group'] as $row)
		{
			if(isset($_POST['check-subject-group'.$i.'']))
			{
				$_SESSION['subjects'] .= $_POST['check-subject-group'.$i.''].',';

				$_SESSION['subjects_count'] += 1;
			}
			$i += 1;
		}
	}

	if($_SESSION['subjects_count'] == 0)
	{
		$_SESSION['msgbox_error'] = 1;
		$_SESSION['text_msgbox_error'] = 'Debe seleccionar minimo una asignatura.';

		print "<script>window.setTimeout(function() { window.location = '/modules/groups' }, 0000);</script>";
	}
	
	//Recuperar alumnos guardados
	if(isset($_SESSION['school_period_group']) != '')
	{
		$_SESSION['get_students'] = '';

		$i = 0;

		$sql = "SELECT * FROM groups_students WHERE id_group = '".$_SESSION['id_group']."' AND school_period = '".$_SESSION['school_period']."'";

		if ($result = $conexion -> query($sql))
		{
			while ($row = mysqli_fetch_array($result))
			{
				$_SESSION['get_students'] .= $row['user_student'].',';

				$i += 1;
			}
		}
	}
	$get_students = explode(",", $_SESSION['get_students']);
	
    //Cargamos datos de estudiantes
	if(isset($_SESSION['school_period_group']) != '')
	{
		$_SESSION['user_student_group'] = array();
		$_SESSION['name_student_group'] = array();

		$i = 0;

		$sql = "SELECT * FROM students WHERE school_period = '".$_SESSION['school_period']."' ORDER BY name";

		if ($result = $conexion -> query($sql))
		{
			while ($row = mysqli_fetch_array($result))
			{
				$_SESSION['checked_student'][$i] = '';

				foreach ($get_students as $key => $student) {
					if ($student == $row['user']) {
						$_SESSION['checked_student'][$i] = 'checked';
					}
				}

				$_SESSION['user_student_group'][$i] = $row['user'];
				$_SESSION['name_student_group'][$i] = $row['name'].' '.$row['surnames'];

				$i += 1;
			}
		}
	}
?>
<div class="form-data">
    <div class="head">
		<h1 class="titulo">Actualizar</h1>
    </div>
    <div class="body">
        <form name="form-add-groups-students" action="update.php" method="POST">
            <div class="wrap">
				<?php
				echo
					'	
						<table>
							<tr>
								<th class="center" colspan="2">Alumnos</th>
							</tr>
					';
								$i = 0;

								foreach($_SESSION['user_student_group'] as $row)
								{ 
									echo'
										<tr>
											<td style="width: 40px;"><input id="cbox-student'.$i.'" class="cbox-student" type="checkbox" name="check-student-group'.$i.'" value="'.$_SESSION["user_student_group"][$i].'"'.' '.$_SESSION['checked_student'][$i].'></td>
											<td><label for="cbox-student'.$i.'">'.$_SESSION['name_student_group'][$i].'</label></td>
										</tr>
										';
										
									$i += 1;
								}
						echo'
						</table>
					';
                    ?>
                <button class="btn-save icon" name="btnsave" type="submit">save</button>
            </div>
        </form>
    </div>
</div>
<div class="content-aside">
<?php
	include_once "../sections/options-disabled.php";
?>
</div>