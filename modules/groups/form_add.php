<?php
	if ($_SESSION['permissions'] != 'admin')
	{
		header('Location: /');
		exit();
	
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
					<label class="label">Nombre</label>
					<input class="text" type="text" name="txtgroupname" value="<?php if(!empty($_SESSION['name_group'])){ echo $_SESSION['name_group']; } ?>" maxlength="100" required/>
				</div>
				<div class="last">
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

    </div>
</div>
<?php
include_once "../sections/options-disabled.php";
?>