<?php
require_once($_SESSION['raiz'].'/modules/sections/role-access-admin-editor.php');

$_SESSION['user_id'] = array();
$_SESSION['teacher_name'] = array();
$_SESSION['teacher_surnames'] = array();

$sql = "SELECT * FROM teachers WHERE user = '".$_POST['txtuserid']."'";

if ($result = $conexion -> query($sql))
{
	if ($row = mysqli_fetch_array($result))
	{
		$_SESSION['user_id'][0] = $row['user'];
		$_SESSION['teacher_name'][0] = $row['name'];
		$_SESSION['teacher_surnames'][0] = $row['surnames'];
		$_SESSION['teacher_curp'][0] = $row['curp'];
		$_SESSION['teacher_rfc'][0] = $row['rfc'];
		$_SESSION['teacher_address'][0] = $row['address'];
		$_SESSION['teacher_phone'][0] = $row['phone'];
		$_SESSION['teacher_level_studies'][0] = $row['level_studies'];
		$_SESSION['teacher_documentation'][0] = $row['documentation'];
		$_SESSION['teacher_observations'][0] = $row['observations'];
	}
}

echo'
<div class="form-data">
	<div class="head">
		<h1 class="titulo">Actualizar</h1>
    </div>
   <div class="body">
        <form name="form-update-teachers" action="update.php" method="POST">
			<div class="wrap">
				<div class="first">
                <label class="label">Usuario</label>
                <input style="display: none;" type="text" name="txtuserid" value="'.$_SESSION['user_id'][0].'"/>
                <input class="text" type="text" name="txt" value="'.$_SESSION['user_id'][0].'" disabled/>
                <label class="label">Nombre</label>
				<input class="text" type="text" name="txtname" value="'.$_SESSION['teacher_name'][0].'" autofocus maxlength="25" required/>
				<label class="label">Apellidos</label>
                <input class="text" type="text" name="txtsurnames" value="'.$_SESSION['teacher_surnames'][0].'" maxlength="50" required/>
				<label class="label">CURP</label>
                <input class="text" type="text" name="txtcurp" value="'.$_SESSION['teacher_curp'][0].'" maxlength="18" onkeyup="this.value = this.value.toUpperCase()" required/>
                <label class="label">RFC</label>
                <input class="text" type="text" name="txtrfc" value="'.$_SESSION['teacher_rfc'][0].'" maxlength="13" onkeyup="this.value = this.value.toUpperCase()" required/>
			</div>
			<div class="last">
				<label class="label">Telefono</label>
				<input class="text" type="number" name="txtphone" value="'.$_SESSION['teacher_phone'][0].'" min="0" max="9999999999" maxlength="10" required/>
                <label class="label">Domicilio</label>
                <input class="text" type="text" name="txtaddress" value="'.$_SESSION['teacher_address'][0].'" maxlength="100" required/>
				<label class="label">Nivel de estudios</label>
				<select class="select" name="selectlevelstudies">
				';
					if ($_SESSION['teacher_level_studies'][0] == 'Licenciatura')
					{
						echo
						'
							<option value="Licenciatura">Licenciatura</option>
							<option value="Ingenieria">Ingenieria</option>
							<option value="Maestria">Maestria</option>
							<option value="Doctorado">Doctorado</option>
						';
					}
					elseif ($_SESSION['teacher_level_studies'][0] == 'Ingenieria')
					{
						echo
						'
							<option value="Ingenieria">Ingenieria</option>
							<option value="Licenciatura">Licenciatura</option>
							<option value="Maestria">Maestria</option>
							<option value="Doctorado">Doctorado</option>
						';
					}
					elseif ($_SESSION['teacher_level_studies'][0] == 'Maestria')
					{
						echo
						'
							<option value="Maestria">Maestria</option>
							<option value="Licenciatura">Licenciatura</option>
							<option value="Ingenieria">Ingenieria</option>
							<option value="Doctorado">Doctorado</option>
						';
					}
					elseif ($_SESSION['teacher_level_studies'][0] == 'Doctorado')
					{
						echo
						'
							<option value="Doctorado">Doctorado</option>
							<option value="Licenciatura">Licenciatura</option>
							<option value="Ingenieria">Ingenieria</option>
							<option value="Maestria">Maestria</option>
						';
					}
					echo'
				</select>
				<label class="label">Documentación</label>
				<select class="select" name="selectdocumentation">
				';
					if ($_SESSION['teacher_documentation'][0] == 1)
					{
						echo
						'
							<option value="1">Si</option>
							<option value="0">No</option>
						';
					}
					elseif ($_SESSION['teacher_documentation'][0] == 0)
					{
						echo
						'
							<option value="0">No</option>
							<option value="1">Si</option>
						';
					}
					echo'
				</select>
				<label class="label">Observación</label>
				<input class="text" type="text" name="txtobservation" value="'.$_SESSION['teacher_observations'][0].'" maxlength="200"/>
			</div>
</div><button class="btn icon" type="submit">save</button>
        </form>
    </div>
</div>
';
echo '<div class="content-aside">';
	include_once "../sections/options-disabled.php";
echo '</div>';
?>