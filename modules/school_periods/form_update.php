<?php
if ($_SESSION['permissions'] != 'admin')
{
	header('Location: /');
	exit();
}

$_SESSION['sp_id'] = array();
$_SESSION['sp_start'] = array();
$_SESSION['sp_end'] = array();
$_SESSION['sp_active'] = array();
$_SESSION['sp_current'] = array();

$sql = "SELECT * FROM school_periods WHERE school_period = '".$_POST['txtspid']."'";

if ($result = $conexion -> query($sql))
{
	if ($row = mysqli_fetch_array($result))
	{
		$_SESSION['sp_id'][0] = $row['school_period'];
		$_SESSION['sp_start'][0] = $row['start_date'];
		$_SESSION['sp_end'][0] = $row['end_date'];
		$_SESSION['sp_active'][0] = $row['active'];
		$_SESSION['sp_current'][0] = $row['current'];
	}
}

echo'
<div class="form-data">
	<div class="head">
		<h1 class="titulo">Actualizar</h1>
    </div>
   <div class="body">
        <form name="form-update-school-periods" action="update.php" method="POST">
            <div class="first">
                <label class="label">Periodo escolar</label>
                <input style="display: none;" type="text" name="txtspid" value="'.$_SESSION['sp_id'][0].'"/>
				<input class="text" type="text" name="txt" value="'.$_SESSION['sp_id'][0].'" disabled/>
				<label class="label">Inicia</label>
                <input class="date" type="date" name="datespstart" value="'.$_SESSION['sp_start'][0].'" required autofocus/>
                <label class="label">Termina</label>
                <input class="date" type="date" name="datespend" value="'.$_SESSION['sp_end'][0].'" required/>
            </div>
			<div class="last">
				<label class="label">Activo</label>
				<select class="select" name="selectactive">
				';
					if ($_SESSION['sp_active'][0] == 1)
					{
						echo
						'
							<option value="1">Si</option>
							<option value="0">No</option>
						';
					}
					else
					{
						echo
						'
							<option value="0">No</option>
							<option value="1">Si</option>
						';
					}
				echo '
				</select>
				<label class="label">Actual</label>
				<select class="select" name="selectcurrent">
				';
					if ($_SESSION['sp_current'][0] == 1)
					{
						echo
						'
							<option value="1">Si</option>
							<option value="0">No</option>
						';
					}
					else
					{
						echo
						'
							<option value="0">No</option>
							<option value="1">Si</option>
						';
					}
				echo '
				</select>
				<label style="visibility: hidden;" class="label">Etiqueta</label>
				<select style="visibility: hidden;" class="select" name="" autofocus>
				</select>
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