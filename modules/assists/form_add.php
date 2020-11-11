<?php
	if ($_SESSION['permissions'] != 'admin')
	{
		header('Location: /');
		exit();
	
	}

	//Rellenamos campos en caso de que ya se hayan ingresado datos.
	if(isset($_POST['btn-add-subjects']) || isset($_POST['btn-add-students']))
	{
		$_SESSION['id_group'] = $_POST['txtgroup'];
		$_SESSION['school_period_group'] = $_POST['selectgroupschoolperiod'];
		$_SESSION['name_group'] = $_POST['txtgroupname'];
		$_SESSION['semester_group'] = $_POST['txtgroupsemester'];
	}

	//Cargamos datos de las materias
	if(isset($_SESSION['school_period_group']) != '')
	{
		$_SESSION['subjects_group'] = array();
		$_SESSION['subject_name_group'] = array();

		$i = 0;

		$sql = "SELECT * FROM subjects WHERE school_period = '".$_SESSION['school_period_group']."' AND semester = '".$_SESSION['semester_group']."' ORDER BY name";

		if($result = $conexion -> query($sql))
		{
			while ($row = mysqli_fetch_array($result))
			{
				$_SESSION['subjects_group'][$i] = $row['subject'];
				$_SESSION['subject_name_group'][$i] = $row['name'];

				$i += 1;
			}
		}
	}

	//Recuperamos las materias seleccionadas
	$i = 0;

	$_SESSION['subjects'] = '';

	if(isset($_SESSION['subjects_group']))
	{
		foreach($_SESSION['subjects_group'] as $row)
		{
			if(isset($_POST['check-subject-group'.$i.'']))
			{
				$_SESSION['subjects'] .= $_POST['check-subject-group'.$i.''].',';
	
				$_SESSION['checked_subject'][$i] = 'checked';
			}
			else
			{
				$_SESSION['checked_subject'][$i] = '';
			}
	
			$i += 1;
		}
	}

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

	//Recuperamos los alumnos seleccionados
	$i = 0;

	$_SESSION['students'] = array();
	$_SESSION['students_button'] = '';

	if(isset($_SESSION['users_student_group']))
	{
		foreach($_SESSION['users_student_group'] as $row)
		{
			if(isset($_POST['check-student-group'.$i.'']))
			{
				$_SESSION['checked_student'][$i] = 'checked';
				$_SESSION['students'][$i] = $_POST['check-student-group'.$i.''];
				
				$_SESSION['students_button'] .= $_POST['check-student-group'.$i.''].',';
			}
			else
			{
				$_SESSION['checked_student'][$i] = '';
				$_SESSION['students'][$i] = '';
			}
	
			$i += 1;
		}
	}
?>
<div class="form-data">
	<div class="head">
		<h1 class="titulo">Agregar</h1>
    </div>
   <div class="body">
		<form name="form-add-groups" action="#" method="POST">
			<div class="wrap">
				<div class="first">
					<label class="label">Grupo</label>
					<input class="text" type="text" name="txtgroup" value="<?php if(!empty($_SESSION['id_group'])){ echo $_SESSION['id_group']; } ?>" maxlength="20" autofocus required/>
					<label class="label">Periodo Escolar</label>
					<select class="select" name="selectgroupschoolperiod">
						<option value="<?php echo $_SESSION['school_period']; ?>"><?php echo $_SESSION['school_period']; ?></option>
					</select>
				</div>
				<div class="last">
					<label class="label">Nombre</label>
					<input class="text" type="text" name="txtgroupname" value="<?php if(!empty($_SESSION['name_group'])){ echo $_SESSION['name_group']; } ?>" maxlength="100" required/>
					<label class="label">Semestre</label>
					<input class="text" type="number" name="txtgroupsemester" value="<?php if(!empty($_SESSION['semester_group'])){ echo $_SESSION['semester_group']; } ?>" maxlength="2" min="1" max="12" list="defaultsemestres" required/>
					<datalist id="defaultsemestres">
					<?php
						for($i = 1; $i <= 12; $i ++)
						{
							echo
							'
								<option value="'.$i.'">
							';
						}
					?>
					</datalist>	
				</div>
			</div>
			<button class="btn-add-subjects" name="btn-add-subjects" type="submit">Seleccionar materias</button>
			<button class="btn-add-students" name="btn-add-students" type="submit">Seleccionar alumnos</button>
			<?php

				$_SESSION['display'] = '';

				if(isset($_POST['btn-add-subjects']) || isset($_POST['btn-add-students']))
				{
					if(isset($_POST['btn-add-students']))
					{
						$_SESSION['display'] = 'display: none;';
					}
					echo
					'
						<table style="'.$_SESSION['display'].'">
							<tr>
								<th class="center" colspan="2">Materias</th>
							</tr>
							';
								$i = 0;

								if(!empty($_SESSION['subjects_group']))
								{
									foreach($_SESSION['subjects_group'] as $row)
									{ 
										echo'
											<tr>
												<td style="width: 40px;"><input class="cbox-subject" id="cbox-subject'.$i.'" type="checkbox" name="check-subject-group'.$i.'" value="'.$_SESSION['subjects_group'][$i].'"'.' '.$_SESSION['checked_subject'][$i].'></td>
												<td><label for="cbox-subject'.$i.'">'.$_SESSION['subject_name_group'][$i].'</label></td>
											</tr>
										';
						
										$i += 1;
									}
								}
								else
								{
									$_SESSION['msgbox_error'] = 1;
									$_SESSION['text_msgbox_error'] = 'No se encontraron materias para el semestre seleccionado.';

									$_SESSION['view_form'] = 'form_default.php';
									header ('Location: /modules/groups');
								}
							echo '
						</table>
					';
				}
				
				$_SESSION['display'] = '';

				if(isset($_POST['btn-add-students']) || isset($_POST['btn-add-subjects']))
				{
					if(isset($_POST['btn-add-subjects']))
					{
						$_SESSION['display'] = 'display: none;';
					}
					echo
					'	
						<table style="'.$_SESSION['display'].'">
							<tr>
								<th class="center" colspan="2">Alumnos</th>
							</tr>
					';
								$i = 0;

								foreach($_SESSION['users_student_group'] as $row)
								{ 
									echo'
										<tr>
											<td style="width: 40px;"><input id="cbox-student'.$i.'" class="cbox-student" type="checkbox" name="check-student-group'.$i.'" value="'.$_SESSION["users_student_group"][$i].'"'.' '.$_SESSION['checked_student'][$i].'></td>
											<td><label for="cbox-student'.$i.'">'.$_SESSION['name_student_group'][$i].'</label></td>
										</tr>
										';
										
									$i += 1;
								}
						echo'
						</table>
					';
				}
			?>
		</form>
		<?php
			if(isset($_SESSION['id_group']) && $_SESSION['subjects'] != '' && $_SESSION['students_button'] != '')
			{
				echo
				'
					<form action="insert.php" method="POST">
						<button name="btnsave" class="btn-add-group-students icon icon-confirm" type="submit"></button>
					</form>
				';
			}
		?>
    </div>
</div>
<div class="form-options">
	<div class="options">
		<form action="#" method="POST">
			<button class="btn disabled icon icon-plus" name="btn" value="form_add" type="submit" disabled></button>
		</form>
		<form action="#" method="POST">
			<button class="btn disabled icon icon-coding" name="btn" value="form_coding" type="submit" disabled></button>
		</form>
		<form action="#" method="POST">
			<button class="btn disabled icon icon-printer" name="btn" value="form_printer" type="submit" disabled></button>
		</form>
		<form action="#" method="POST">
			<button class="btnexit icon icon-exit" name="btn" value="form_default" type="submit"></button>
		</form>
    </div>
	<div class="search">
		<form name="form-search" action="#" method="POST">
			<p>
				<input type="text" class="text" name="search" placeholder="Buscar...">
				<button class="btn-search icon  icon-search" type="submit"></button>
			</p>
		</form>
	</div>
</div>