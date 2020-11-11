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
		<form name="form-add-subjects" action="insert.php" method="POST">
			<div class="wrap">
				<div class="first">
					<label class="label">Materia</label>
					<input class="text" type="text" name="txtsubject" value="" maxlength="20" autofocus required/>
					<label class="label">Nombre</label>
					<input class="text" type="text" name="txtsubjectname" value="" maxlength="100" required/>
					<label class="label">Semestre</label>
					<input class="text" type="number" name="txtsubjectsemester" value="" maxlength="2" min="1" max="12" list="defaultsemestres" required/>
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
				<div class="last">
					<label class="label">Docente</label>
					<select class="select" name="selectuserteacher">
					<?php
						$_SESSION['user_teacher'] = array();
						$_SESSION['name_teacher'] = array();

						$i = 0;

						$sql = "SELECT * FROM teachers ORDER BY name";

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
					?>
					</select>
					<label class="label">Descripción</label>
					<textarea class="textarea" name="txtsubjectdescription"></textarea>
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