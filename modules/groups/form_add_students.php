<?php
	if ($_SESSION['permissions'] != 'admin')
	{
		header('Location: /');
		exit();
	
    }

    //Recuperar datos del form_add_subjects

    
    //Cargamos datos de estudiantes
	if(isset($_SESSION['school_period_group']) != '')
	{
		$_SESSION['users_student_group'] = array();
		$_SESSION['name_student_group'] = array();

		$i = 0;

		$sql = "SELECT * FROM students WHERE school_period = '".$_SESSION['school_period']."' ORDER BY name";

		if ($result = $conexion -> query($sql))
		{
			while ($row = mysqli_fetch_array($result))
			{
				$_SESSION['users_student_group'][$i] = $row['user'];
				$_SESSION['name_student_group'][$i] = $row['name'].' '.$row['surnames'];

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
        <form name="form-add-groups-students" action="#" method="POST">
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

								foreach($_SESSION['users_student_group'] as $row)
								{ 
									echo'
										<tr>
											<td style="width: 40px;"><input id="cbox-student'.$i.'" class="cbox-student" type="checkbox" name="check-student-group'.$i.'" value="'.$_SESSION["users_student_group"][$i].'"></td>
											<td><label for="cbox-student'.$i.'">'.$_SESSION['name_student_group'][$i].'</label></td>
										</tr>
										';
										
									$i += 1;
								}
						echo'
						</table>
					';
                    ?>
                <button class="btn-add-students" name="btn" value="form_add_students" type="submit">Asignar Alumnos</button>
            </div>
        </form>
    </div>
</div>
<?php
include_once "../sections/options-disabled.php";
?>