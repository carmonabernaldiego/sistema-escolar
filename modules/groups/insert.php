<?php
	include_once '../security.php';
	include_once '../conexion.php';
	include_once '../functions.php';

	if ($_SESSION['permissions'] != 'admin')
	{
		header('Location: /');
		exit();
	}
	
	if (empty($_SESSION['id_group']))
	{
		header('Location: /');
		exit();
	}

	if($_SESSION['students_button'] == '')
	{
		$_SESSION['msgbox_error'] = 1;
		$_SESSION['text_msgbox_error'] = 'Debe seleccionar minimo un estudiante.';
		$_SESSION['view_form'] = 'form_default.php';

		header ('Location: /modules/groups');
		exit();
	}
	else
	{
		$sql = "SELECT * FROM groups WHERE id_group = '".$_SESSION['id_group']."' AND school_period = '".$_SESSION['school_period_group']."'";

		if ($result = $conexion -> query($sql))
		{
			if ($row = mysqli_fetch_array($result))
			{
				$_SESSION['msgbox_error'] = 1;
				$_SESSION['text_msgbox_error'] = 'El grupo que intenta crear ya éxiste.';
				$_SESSION['view_form'] = 'form_default.php';

				header ('Location: /modules/groups');
			}
			else
			{
				$sql_insert = "INSERT INTO groups(id_group, school_period, name, semester, subjects) VALUES('".$_SESSION['id_group']."', '".$_SESSION['school_period_group']."', '".$_SESSION['name_group']."', '".intval($_SESSION['semester_group'])."', '".$_SESSION['subjects']."')";
			
				if(mysqli_query($conexion, $sql_insert))
				{
					$i = 0;

					foreach($_SESSION['students'] as $row)
					{
						if($_SESSION['students'][$i] != '')
						{
							$sql_insert = "INSERT INTO groups_students(id_group, school_period, user_student) VALUES('".$_SESSION['id_group']."', '".$_SESSION['school_period_group']."', '".$_SESSION['students'][$i]."')";
							
							mysqli_query($conexion, $sql_insert);
						}
				
						$i += 1;
					}
				}

				$_SESSION['msgbox_info'] = 1;
				$_SESSION['text_msgbox_info'] = 'Registro cargado correctamente.';
				$_SESSION['view_form'] = 'form_default.php';

				header ('Location: /modules/groups');
			}
		}
	}
?>