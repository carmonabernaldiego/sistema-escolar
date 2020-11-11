<?php
if ($_SESSION['permissions'] != 'admin')
{
	header('Location: /');
	exit();
}

$_SESSION['user_id'] = array();
$_SESSION['user_type'] = array();
$_SESSION['user_image'] = array();

$sql = "SELECT * FROM users WHERE user = '".$_POST['id']."'";

if ($result = $conexion -> query($sql))
{
	if ($row = mysqli_fetch_array($result))
	{
		$_SESSION['user_id'][0] = $row['user'];
		$_SESSION['user_type'][0] = $row['permissions'];
		$_SESSION['user_image'][0] = $row['image'];
	}
}
echo'
<div class="form-data">
	<div class="head">
		<h1 class="titulo">Actualizar</h1>
    </div>
   <div class="body">
		<form name="form-update-users" action="update.php" enctype="multipart/form-data" method="POST">
			<div class="wrap">
				<div class="first">
					<label class="label">Usuario</label>
					<input style="display: none;" type="text" name="txtuserid" value="'.$_SESSION['user_id'][0].'"/>
					<input class="text" type="text" name="txt" value="'.$_SESSION['user_id'][0].'" disabled/>
					<label class="label">Contraseña</label>
					<input class="text" type="password" name="txtuserpass" value="Password1234//*" disabled/>
					<label class="label">Permisos</label>
					<select class="select" name="txtusertype">
					';
						if ($_SESSION['user_type'][0] == 'admin')
						{
							echo
							'
								<option value="admin">Administrador</option>
								<option value="student">Alumno</option>
								<option value="teacher">Docente</option>
								<option value="editor">Editor</option>	
							';
						}
						elseif ($_SESSION['user_type'][0] == 'alumno')
						{
							echo
							'
								<option value="student">Alumno</option>
								<option value="admin">Administrador</option>
								<option value="teacher">Docente</option>
								<option value="editor">Editor</option>	
							';
						}
						elseif ($_SESSION['user_type'][0] == 'docente')
						{
							echo
							'
								<option value="teacher">Docente</option>
								<option value="admin">Administrador</option>
								<option value="student">Alumno</option>
								<option value="editor">Editor</option>	
							';
						}
						elseif ($_SESSION['user_type'][0] == 'editor')
						{
							echo
							'
								<option value="editor">Editor</option>
								<option value="admin">Administrador</option>
								<option value="student">Alumno</option>
								<option value="teacher">Docente</option>
							';
						}
					echo
					'
					</select>
				</div>
				<div class="last">
					<label class="label">Imagen</label>
					<img class="user-image" src="'.'/images/users/'.$_SESSION['user_image'][0].'" />
					<label class="file" for="fileimage">Abrir Imagen</label>
					<input id="fileimage" style="display: none;" type="file" name="fileimage" accept="image|*" />
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
				<input type="text" class="text" name="search" placeholder="Buscar..." maxlength="50">
				<button class="btn-search icon icon-search" type="submit"></button>
			</p>
		</form>
	</div>
</div>
';
?>