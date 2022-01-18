<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

unset($_SESSION['school_periods_id']);
unset($_SESSION['school_periods_start_date']);
unset($_SESSION['school_periods_end_date']);

//Cargamos Periodos Activos unicamente
if (isset($_SESSION['school_period']) != '') {
	$_SESSION['school_periods_id'] = array();
	$_SESSION['school_periods_start_date'] = array();
	$_SESSION['school_periods_end_date'] = array();

	$i = 0;

	$sql = "SELECT * FROM school_periods WHERE active = 1";

	if ($result = $conexion->query($sql)) {
		while ($row = mysqli_fetch_array($result)) {
			$_SESSION['school_periods_id'][$i] = $row['school_period'];
			$_SESSION['school_periods_start_date'][$i] = $row['start_date'];
			$_SESSION['school_periods_end_date'][$i] = $row['end_date'];

			$i += 1;
		}
	}
}
?>
<div class="form-data">
	<div class="head">
		<h1 class="titulo">Seleccioné</h1>
	</div>
	<div class="body">
		<form name="form-add-groups-subjects" action="process.php" method="POST">
			<div class="wrap">
				<?php
				echo
				'
						<table class="table-school-period">
							<tr>
								<th class="center" colspan="4">Periodos</th>
							</tr>
							';
				$i = 0;

				if (!empty($_SESSION['school_period'])) {
					foreach ($_SESSION['school_periods_id'] as $row) {
						echo '
							<tr>
							';
						if ($_SESSION['school_period'] == $_SESSION['school_periods_id'][$i]) {
							echo '<td class="td-school"><input class="cbox-school-period" id="cbox-school-period' . $i . '" type="radio" name="check-school-period" value="' . $_SESSION['school_periods_id'][$i] . '" checked></td>';
						} else {
							echo '<td class="td-school"><input class="cbox-school-period" id="cbox-school-period' . $i . '" type="radio" name="check-school-period" value="' . $_SESSION['school_periods_id'][$i] . '"></td>';
						}
						echo '
								<td class="center td-school-label"><label style="cursor: pointer;" for="cbox-school-period' . $i . '">' . $_SESSION['school_periods_id'][$i] . '</label></td>
								<td class="center td-school-label"><label style="cursor: pointer;" for="cbox-school-period' . $i . '">' . $_SESSION['school_periods_start_date'][$i] . '</label></td>
								<td class="center td-school-label"><label style="cursor: pointer;" for="cbox-school-period' . $i . '">' . $_SESSION['school_periods_end_date'][$i] . '</label></td>
							</tr>
										';

						$i += 1;
					}
				} else {
					$_SESSION['msgbox_info'] = 0;
					$_SESSION['msgbox_error'] = 1;
					$_SESSION['text_msgbox_error'] = 'No se encontraron Periodos Activos.';

					print "<script>window.setTimeout(function() { window.location = '/modules/groups' }, 0000);</script>";
				}
				echo '
						</table>
                    ';

				if ($i == 0) {
					echo '<img src="/images/404.svg" class="data-not-found" alt="404">';
				}
				?>
			</div>
			<button id="btnSave" class="btn icon" name="btn-school-period" value="true" type="submit">save</button>
		</form>
	</div>
</div>
<div class="content-aside">
	<div class="form-options">
		<div class="options">
			<form action="" method="POST">
				<button class="btn disabled icon" name="btn" value="form_add" type="submit" disabled>add</button>
			</form>
			<form action="" method="POST">
				<button class="btn disabled icon" name="btn" value="form_coding" type="submit" disabled>code</button>
			</form>
			<form action="" method="POST">
				<button class="btn disabled icon" name="btn" value="form_printer" type="submit" disabled>print</button>
			</form>
			<form action="/">
				<button class="btn btnexit icon" type="submit">exit_to_app</button>
			</form>
		</div>
		<div class="search">
			<form name="form-search" action="" method="POST">
				<p>
					<input type="text" class="text-search" name="search" placeholder="Buscar..." disabled>
					<button class="btn-search disabled icon" type="submit" disabled>search</button>
				</p>
			</form>
		</div>
	</div>
</div>