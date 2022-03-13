<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin.php');
?>
<div class="form-gridview">
	<table class="default">
		<?php
		if ($_SESSION['total_school_periods'] != 0) {
			echo '
					<tr>
						<th>Periodo Escolar</th>
						<th>Nombre</th>
						<th class="center">Activo</th>
						<th class="center">Actual</th>
						<th class="center"><a class="icon">edit</a></th>
						<th class="center"><a class="icon">delete</a></th>
					</tr>
		';
		}
		for ($i = 0; $i < $_SESSION['total_school_periods']; $i++) {
			echo '
					<tr>
						<td>' . $_SESSION["sp_id"][$i] . '</td>
						<td class="tdbreak">' . $_SESSION["sp_name"][$i] . '</td>
						<td class="center">' . $_SESSION["sp_active"][$i] . '</td>
						<td class="center">' . $_SESSION["sp_current"][$i] . '</td>
						<td>
							<form action="" method="POST">
								<input style="display:none;" type="text" name="txtspid" value="' . $_SESSION["sp_id"][$i] . '"/>
								<button class="btnedit" name="btn" value="form_update" type="submit"></button>
							</form>
						</td>
						<td>
							<form action="" method="POST">
								<input style="display:none;" type="text" name="txtspid" value="' . $_SESSION["sp_id"][$i] . '"/>
								<button class="btndelete" name="btn" value="form_delete" type="submit"></button>
							</form>
						</td>
					</tr>
				';
		}
		?>
	</table>
	<?php
	if ($_SESSION['total_school_periods'] == 0) {
		echo '
				<img src="/images/404.svg" class="data-not-found" alt="404">
		';
	}
	if ($_SESSION['total_school_periods'] != 0) {
		echo '
				<div class="pages">
					<ul>
		';
		for ($n = 1; $n <= $tpages; $n++) {
			if ($page == $n) {
				echo '<li class="active"><form name="form-pages" action="" method="POST"><button type="submit" name="page" value="' . $n . '">' . $n . '</button></form></li>';
			} else {
				echo '<li><form name="form-pages" action="" method="POST"><button type="submit" name="page" value="' . $n . '">' . $n . '</button></form></li>';
			}
		}
		echo '
					</ul>
				</div>
		';
	}
	?>
</div>
<div class="content-aside">
	<?php
	include_once '../notif_info.php';
	include_once "../sections/options.php";
	?>
</div>