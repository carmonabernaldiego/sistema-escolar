<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin.php');

$_SESSION['sp_id'] = array();
$_SESSION['sp_start'] = array();
$_SESSION['sp_end'] = array();
$_SESSION['sp_active'] = array();
$_SESSION['sp_current'] = array();

$sql = "SELECT * FROM school_periods WHERE school_period = '" . $_POST['txtspid'] . "'";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['sp_id'][0] = $row['school_period'];
		$_SESSION['sp_start'][0] = $row['start_date'];
		$_SESSION['sp_end'][0] = $row['end_date'];
		$_SESSION['sp_active'][0] = $row['active'];
		$_SESSION['sp_current'][0] = $row['current'];
	}
}

echo '
<div class="form-data">
	<div class="head">
		<h1 class="titulo">Actualizar</h1>
    </div>
    <div class="body">
        <form name="form-update-school-periods" action="update.php" method="POST" autocomplete="off" autocapitalize="off">
			<div class="wrap">
				<div class="first">
					<label for="txtspid" class="label">Periodo escolar</label>
					<input style="display: none;" type="text" name="txtspid" value="' . $_SESSION['sp_id'][0] . '"/>
					<input id="txtspid" class="text" type="text" name="txt" value="' . $_SESSION['sp_id'][0] . '" disabled/>
					<label for="datespstart" class="label">Inicia</label>
					<input id="datespstart" class="date" type="text" name="datespstart" value="' . $_SESSION['sp_start'][0] . '" maxlength="10" required autofocus/>
					<label for="datespend" class="label">Termina</label>
					<input id="datespend" class="date" type="text" name="datespend" value="' . $_SESSION['sp_end'][0] . '" maxlength="10" required/>
				</div>
				<div class="last">
					<label for="selectactive" class="label">Activo</label>
					<select id="selectactive" class="select" name="selectactive" required>
				';
if ($_SESSION['sp_active'][0] == 1) {
	echo
	'
							<option value="1">Si</option>
							<option value="0">No</option>
						';
} else {
	echo
	'
							<option value="0">No</option>
							<option value="1">Si</option>
						';
}
echo '
					</select>
					<label for="selectcurrent" class="label">Actual</label>
					<select id="selectcurrent" class="select" name="selectcurrent" required>
				';
if ($_SESSION['sp_current'][0] == 1) {
	echo
	'
							<option value="1">Si</option>
							<option value="0">No</option>
						';
} else {
	echo
	'
							<option value="0">No</option>
							<option value="1">Si</option>
						';
}
echo '
					</select>
				</div>
			</div>
			<button id="btnSave" class="btn icon" type="submit">save</button>
		</form>
	</div>
</div>
';
echo '<div class="content-aside">';
include_once "../sections/options-disabled.php";
echo '</div>
<script src="/js/schoolperiods.js" type="text/javascript"></script>';
