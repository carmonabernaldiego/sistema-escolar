<?php
	if ($_SESSION['permissions'] != 'admin')
	{
		header('Location: /');
		exit();
	
	}

	if(isset($_POST['txtgroup']))
	{
		$sql = "SELECT * FROM groups WHERE id_group = '".$_POST['txtgroup']."' AND school_period = '".$_POST['txtgroupschoolperiod']."'";

		if($result = $conexion -> query($sql))
		{
			while ($row = mysqli_fetch_array($result))
			{
				$_SESSION['id_group'] = $row['id_group'];
				$_SESSION['school_period_group'] = $row['school_period'];
				$_SESSION['name_group'] = $row['name'];
				$_SESSION['semester_group'] = $row['semester'];
				$_SESSION['get_subjects'] = $row['subjects'];
				$_SESSION['n_load'] = 0;
			}
		}
	}

	//Cargamos datos de las materias
	if(isset($_SESSION['school_period_group']) != '')
	{
		$array_subjects = array();
		$_SESSION['get_subjects'] = trim($_SESSION['get_subjects'], ',');

		$array_subjects = explode( ',', $_SESSION['get_subjects']);

		$_SESSION['subjects_group'] = array();
		$_SESSION['subject_name_group'] = array();

		$i = 0;

		foreach($array_subjects as $row)
		{
			if($array_subjects[$i] != '')
			{
				$sql = "SELECT * FROM subjects WHERE subject = '".$array_subjects[$i]."' AND school_period = '".$_SESSION['school_period_group']."'";
			
				if($result = $conexion -> query($sql))
				{
					while ($row = mysqli_fetch_array($result))
					{
						$_SESSION['subjects_group'][$i] = $row['subject'];
						$_SESSION['subject_name_group'][$i] = $row['name'];
						$_SESSION['checked_subject'][$i] = 'checked';
					}
				}
			}
			$i += 1;
		}

		$array_subjects = implode("','",$array_subjects);
		
		$sql = "SELECT * FROM subjects WHERE subject NOT IN('".$array_subjects."') AND school_period = '".$_SESSION['school_period_group']."'";

		if($result = $conexion -> query($sql))
		{
			while ($row = mysqli_fetch_array($result))
			{
				$_SESSION['subjects_group'][$i] = $row['subject'];
				$_SESSION['subject_name_group'][$i] = $row['name'];
				$_SESSION['checked_subject'][$i] = '';

				$i += 1;
			}
		}
	}
	//Cargamos datos de estudiantes
	if(isset($_SESSION['school_period_group']) != '')
	{

		$_SESSION['get_students'] = '';

		$_SESSION['users_student_group'] = array();
		$_SESSION['name_student_group'] = array();

		$i = 0;

		$sql = "SELECT * FROM groups_students WHERE id_group = '".$_SESSION['id_group']."' AND school_period = '".$_SESSION['school_period']."'";

		if ($result = $conexion -> query($sql))
		{
			while ($row = mysqli_fetch_array($result))
			{
				$_SESSION['get_students'] .= $row['user_student'].',';

				$_SESSION['users_student_group'][$i] = $row['user_student'];
				$_SESSION['checked_student'][$i] = 'checked';

				$sql = "SELECT * FROM students WHERE user = '".$_SESSION['users_student_group'][$i]."' AND school_period = '".$_SESSION['school_period']."'";

				if($result2 = $conexion -> query($sql))
				{
					while($row2 = mysqli_fetch_array($result2))
					{
						$_SESSION['name_student_group'][$i] = $row2['name'].' '.$row2['surnames'];
					}
				}

				$i += 1;
			}
		}

		$_SESSION['get_students'] = trim($_SESSION['get_students'], ',');

		$array_students = explode( ',', $_SESSION['get_students']);

		$array_students = implode("','",$array_students);
		
		$sql = "SELECT * FROM students WHERE user NOT IN('".$array_students."') AND school_period = '".$_SESSION['school_period_group']."'";

		if($result = $conexion -> query($sql))
		{
			while ($row = mysqli_fetch_array($result))
			{
				$_SESSION['checked_student'][$i] = '';
				$_SESSION['users_student_group'][$i] = $row['user'];
				$_SESSION['name_student_group'][$i] = $row['name'].' '.$row['surnames'];

				$i += 1;
			}
		}
	}
?>
<div class="form-data">
	<div class="head">
		<h1 class="titulo">Consultar</h1>
    </div>
   <div class="body">
		<form name="form-add-groups" action="#" method="POST">
			<div class="wrap">
				<div class="first">
					<label class="label">Grupo</label>
					<input class="text" type="text" name="txtgroup" value="<?php if(!empty($_SESSION['id_group'])){ echo $_SESSION['id_group']; } ?>" maxlength="20" autofocus required disabled/>
					<label class="label">Periodo Escolar</label>
					<select class="select" name="selectgroupschoolperiod" disabled>
						<option value="<?php echo $_SESSION['school_period']; ?>"><?php echo $_SESSION['school_period']; ?></option>
					</select>
				</div>
				<div class="last">
					<label class="label">Nombre</label>
					<input class="text" type="text" name="txtgroupname" value="<?php if(!empty($_SESSION['name_group'])){ echo $_SESSION['name_group']; } ?>" maxlength="100" required disabled/>
					<label class="label">Semestre</label>
					<input class="text" type="number" name="txtgroupsemester" value="<?php if(!empty($_SESSION['semester_group'])){ echo $_SESSION['semester_group']; } ?>" maxlength="2" min="1" max="12" list="defaultsemestres" required disabled/>
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
			<?php
				echo
				'
					</br>
					<table>
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
											<td style="width: 40px;"><input class="cbox-subject" id="cbox-subject'.$i.'" type="checkbox" name="check-subject-group'.$i.'" value="'.$_SESSION['subjects_group'][$i].'"'.' '.$_SESSION['checked_subject'][$i].' disabled></td>
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
										<td style="width: 40px;"><input id="cbox-student'.$i.'" class="cbox-student" type="checkbox" name="check-student-group'.$i.'" value="'.$_SESSION["users_student_group"][$i].'"'.' '.$_SESSION['checked_student'][$i].' disabled></td>
										<td><label for="cbox-student'.$i.'">'.$_SESSION['name_student_group'][$i].'</label></td>
									</tr>
									';
									
								$i += 1;
							}
					echo'
					</table>
				';
			?>
			<button style="margin-top: -4px;" class="btn icon icon-confirm" name="btn" value="form_default" type="submit"></button>
		</form>
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