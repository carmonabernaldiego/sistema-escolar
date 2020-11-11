<?php
if ($_SESSION['permissions'] != 'admin')
{
	header('Location: /');
	exit();
}

echo '
<div class="form-data">
	<div class="head">
		<h1 class="titulo">Agregar</h1>
    </div>
   <div class="body">
        <form name="form-add-users" action="insert.php" enctype="multipart/form-data" method="POST">
			<div class="wrap">
				<div class="first">
					<label class="label">Usuario</label>
					<input class="text" type="text" name="txtuserid" value="" autofocus required/>
					<label class="label">Contraseña</label>
					<input class="text" type="password" name="txtuserpass" value="" required/>
					<label class="label">Permisos</label>
					<select class="select" name="txtusertype">
						<option value="editor">Editor</option>
						<option value="admin">Administrador</option>
						<option value="student">Alumno</option>
						<option value="teacher">Docente</option>
					</select>
				</div>
				<div class="last">
					<label class="label">Imagen</label>
					<img class="user-image" src="../../images/users/user.png" />
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
				<input type="text" class="text" name="search" placeholder="Buscar...">
				<button class="btn-search icon  icon-search" type="submit"></button>
			</p>
		</form>
	</div>
</div>
';
?>