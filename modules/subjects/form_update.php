<?php
if ($_SESSION['permissions'] != 'admin')
{
	header('Location: /');
	exit();
}

$_SESSION['subject'] = array();
$_SESSION['subject_name'] = array();
$_SESSION['subject_description'] = array();
$_SESSION['subject_semester'] = array();
$_SESSION['subject_user_teacher'] = array();

$sql = "SELECT * FROM subjects WHERE subject = '".$_POST['txtsubject']."'";

if ($result = $conexion -> query($sql))
{
	if ($row = mysqli_fetch_array($result))
	{
		$_SESSION['subject'][0] = $row['subject'];
		$_SESSION['subject_name'][0] = $row['name'];
		$_SESSION['subject_description'][0] = $row['description'];
		$_SESSION['subject_semester'][0] = $row['semester'];
		$_SESSION['subject_user_teacher'][0] = $row['user_teacher'];
	}
}

echo'
<div class="form-data">
	<div class="head">
		<h1 class="titulo">Actualizar</h1>
    </div>
   <div class="body">
		<form name="form-update-subjects" action="update.php" method="POST">
			<div class="wrap">
				<div class="first">
					<label class="label">Materia</label>
					<input style="display: none;" type="text" name="txtsubject" value="'.$_SESSION['subject'][0].'"/>
					<input class="text" type="text" name="txtsubject" value="'.$_SESSION['subject'][0].'" disabled/>
					<label class="label">Nombre</label>
					<input class="text" type="text" name="txtsubjectname" value="'.$_SESSION['subject_name'][0].'" maxlength="100" required autofocus/>
					<label class="label">Semestre</label>
					<input class="text" type="number" name="txtsubjectsemester" value="'.$_SESSION['subject_semester'][0].'" maxlength="2" min="1" max="12" list="defaultsemestres"/>
					<datalist id="defaultsemestres">
					';
						for($i = 1; $i <= 12; $i ++)
						{
							echo
							'
								<option value="'.$i.'">
							';
						}
					echo
					'
					</datalist>
				</div>
				<div class="last">
					<label class="label">Docente</label>
					<select class="select" name="selectteacheruser">
					';
						$_SESSION['user_teacher'] = array();
						$_SESSION['name_teacher'] = array();

						$sql = "SELECT * FROM teachers where user = '".$_SESSION['subject_user_teacher'][0]."'";

						if ($result = $conexion -> query($sql))
						{
							while ($row = mysqli_fetch_array($result))
							{
								$_SESSION['user_teacher'][0] = $row['user'];
								$_SESSION['name_teacher'][0] = $row['name'].' '.$row['surnames'];
							}
						}

						$i = 1;

						$sql = "SELECT * FROM teachers where user != '".$_SESSION['subject_user_teacher'][0]."' ORDER BY name";

						if ($result = $conexion -> query($sql))
						{
							while ($row = mysqli_fetch_array($result))
							{
								$_SESSION['user_teacher'][$i] = $row['user'];
								$_SESSION['name_teacher'][$i] = $row['name'].' '.$row['surnames'];

								$i += 1;
							}
						}

						$i = 0;
						
						foreach($_SESSION['user_teacher'] as $row)
						{
							echo
							'
								<option value="'.$_SESSION['user_teacher'][$i].'">'.$_SESSION['name_teacher'][$i].'</option>
							';

							$i += 1;
						}
					echo
					'
					</select>
					<label class="label">Descripción</label>
					<textarea class="textarea" name="txtsubjectdescription">'.$_SESSION['subject_description'][0].'</textarea>
				</div>
			</div>
			<button class="btn icon icon-confirm" type="submit"></button>
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
';
?>