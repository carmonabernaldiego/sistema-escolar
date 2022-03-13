<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');
?>
<div class="form-gridview">
	<table class="default">
		<?php
		if ($_SESSION['total_subjects'] != 0) {
			echo '
					<tr>
						<th>Asignatura</th>
						<th>Nombre</th>
						<th>Carrera</th>
						<th class="center">Semestre</th>
						<th class="center"><a class="icon">visibility</a></th>
						<th class="center"><a class="icon">edit</a></th>
			';
			if ($_SESSION['permissions'] != 'editor') {
				echo '<th class="center"><a class="icon">delete</a></th>';
			}
			echo '
					</tr>
			';
		}
		?>
		<?php
		for ($i = 0; $i < $_SESSION['total_subjects']; $i++) {
			echo '
		    		<tr>
		    			<td>' . $_SESSION["subject"][$i] . '</td>
						<td>' . $_SESSION["subject_name"][$i] . '</td>
						<td>' . $_SESSION["subject_career"][$i] . '</td>
						<td class="center">' . $_SESSION["subject_semester"][$i] . '</td>
						<td>
							<form action="" method="POST">
								<input style="display:none;" type="text" name="txtsubject" value="' . $_SESSION["subject"][$i] . '"/>
								<button class="btnview" name="btn" value="form_consult" type="submit"></button>
							</form>
						</td>
						<td>
							<form action="" method="POST">
								<input style="display:none;" type="text" name="txtsubject" value="' . $_SESSION["subject"][$i] . '"/>
								<button class="btnedit" name="btn" value="form_update" type="submit"></button>
							</form>
						</td>';
			if ($_SESSION['permissions'] != 'editor') {
				echo '
								<td>
									<form action="" method="POST">
										<input style="display:none;" type="text" name="txtsubject" value="' . $_SESSION["subject"][$i] . '"/>
										<button class="btndelete" name="btn" value="form_delete" type="submit"></button>
									</form>
								</td>
							';
			}
			echo '
					</tr>
				';
		}
		?>
	</table>
	<?php
	if ($_SESSION['total_subjects'] == 0) {
		echo '
				<img src="/images/404.svg" class="data-not-found" alt="404">
		';
	}
	if ($_SESSION['total_subjects'] != 0) {
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