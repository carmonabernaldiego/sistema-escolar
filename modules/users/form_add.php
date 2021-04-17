<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin.php');

echo '
<div class="form-data form-users">
	<div class="body">
        <form name="form-add-users" action="insert.php" enctype="multipart/form-data" method="POST">
			<div class="wrap">
				<div id="section-user-image">
					<img src="/images/users/user.png" />
				</div>
				<div class="first">
					<label class="label">Usuario</label>
					<input class="text" type="text" name="txtuseridAdd" value="" maxlength="50" autofocus required/>
					<label class="label">Email</label>
					<input class="text" type="email" name="txtemailAdd" value="" maxlength="200"/>
				</div>
				<div class="last">
					<label class="label">Contraseña</label>
					<input class="text" type="password" name="txtuserpassAdd" value="" maxlength="50" required/>
					<label class="label">Permisos</label>
					<select class="select" name="txtusertype">
						<option value="editor">Editor</option>
						<option value="admin">Administrador</option>
						<option value="student">Alumno</option>
						<option value="teacher">Docente</option>
					</select>
				</div>
			</div>
			<button class="btn icon" type="submit">save</button>
        </form>
    </div>
</div>
';
echo '<div class="content-aside">';
include_once "../sections/options-disabled.php";
echo '</div>';