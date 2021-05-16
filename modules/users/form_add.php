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
					<label for="txtuserid" class="label">Usuario</label>
					<input id="txtuserid" class="text" type="text" name="txtuseridAdd" value="" maxlength="50" autofocus autocomplete="off" required/>
					<label for="txtuseremail" class="label">Email</label>
					<input id="txtuseremail" class="text" type="email" name="txtemailAdd" value="" maxlength="200" autocomplete="new-text"/>
				</div>
				<div class="last">
					<label for="txtuserpass" class="label">Contraseña</label>
					<input id="txtuserpass" class="text" type="password" name="txtuserpassAdd" value="" maxlength="50" autocomplete="new-password" required/>
					<label for="selectusertype" class="label">Permisos</label>
					<select id="selectusertype" class="select" name="txtusertype">
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