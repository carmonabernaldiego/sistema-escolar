<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin.php');

$sql = "SELECT * FROM school_periods WHERE school_period = '" . $_POST['txtspid'] . "'";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['sp_id'] = $row['school_period'];
		$_SESSION['sp_name'] = $row['name'];
		$_SESSION['sp_start'] = $row['start_date'];
		$_SESSION['sp_end'] = $row['end_date'];
		$_SESSION['sp_active'] = $row['active'];
		$_SESSION['sp_current'] = $row['current'];
	}
}
?>
<div class="form-data">
	<div class="head">
		<h1 class="titulo">Actualizar</h1>
	</div>
	<div class="body">
		<form name="form-update-school-periods" action="update.php" method="POST" autocomplete="off" autocapitalize="on">
			<div class="wrap">
				<div class="first">
					<label for="txtspid" class="label">Periodo escolar</label>
					<input style="display: none;" type="text" name="txtspid" value="<?php echo $_SESSION['sp_id']; ?>" maxlength="20" />
					<input id="txtspid" class="text" type="text" name="txt" value="<?php echo $_SESSION['sp_id']; ?>" maxlength="20" placeholder="ID Periodo escolar" disabled />
					<label for="txtspname" class="label">Nombre</label>
					<input id="txtspname" class="text" type="text" name="txtspname" value="<?php echo $_SESSION['sp_name']; ?>" maxlength="100" placeholder="Nombre" required autofocus />
					<label for="datespstart" class="label">Inicia</label>
					<input id="datespstart" class="date" type="text" name="datespstart" value="<?php echo $_SESSION['sp_start']; ?>" pattern="\d{4}-\d{2}-\d{2}" placeholder="aaaa-mm-dd" maxlength="10" required />
				</div>
				<div class="last">
					<label for="datespend" class="label">Termina</label>
					<input id="datespend" class="date" type="text" name="datespend" value="<?php echo $_SESSION['sp_end']; ?>" pattern="\d{4}-\d{2}-\d{2}" placeholder="aaaa-mm-dd" maxlength="10" required />
					<label for="selectactive" class="label">Activo</label>
					<select id="selectactive" class="select" name="selectactive" required>
						<?php
						if ($_SESSION['sp_active'] == 1) {
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
						?>
					</select>
					<label for="selectcurrent" class="label">Actual</label>
					<select id="selectcurrent" class="select" name="selectcurrent" required>
						<?php
						if ($_SESSION['sp_current'] == 1) {
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
						?>
					</select>
				</div>
			</div>
			<button id="btnSave" class="btn icon" type="submit">save</button>
		</form>
	</div>
</div>
<div class="content-aside">
	<?php include_once "../sections/options-disabled.php"; ?>
</div>
<script src="/js/modules/schoolperiods.js" type="text/javascript"></script>