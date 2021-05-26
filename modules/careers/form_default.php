<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');
?>
<div class="form-gridview">
	<table>
		<?php
		if ($_SESSION['total_careers'] != 0) {
			echo '
					<tr>
						<th>Carrera</th>
						<th>Nombre</th>
						<th class="view center"><a class="icon">visibility</a></th>
						<th class="edit center"><a class="icon">edit</a></th>
			';
			if ($_SESSION['permissions'] != 'editor') {
				echo '<th class="delete center"><a class="icon">delete</a></th>';
			}
			echo '	
					</tr>
			';
		}
		for ($i = 0; $i < $_SESSION['total_careers']; $i++) {
			echo '
		    		<tr>
		    			<td>' . $_SESSION["career"][$i] . '</td>
						<td>' . $_SESSION["career_name"][$i] . '</td>
						<td>
							<form action="" method="POST">
								<input style="display:none;" type="text" name="txtcareer" value="' . $_SESSION["career"][$i] . '"/>
								<button id="btnViewGrid" class="btnview" name="btn" value="form_consult" type="submit"></button>
							</form>
						</td>
						<td>
							<form action="" method="POST">
								<input style="display:none;" type="text" name="txtcareer" value="' . $_SESSION["career"][$i] . '"/>
								<button id="btnEditGrid" class="btnedit" name="btn" value="form_update" type="submit"></button>
							</form>
						</td>';
			if ($_SESSION['permissions'] != 'editor') {
				echo '
								<td>
									<form action="" method="POST">
										<input style="display:none;" type="text" name="txtcareer" value="' . $_SESSION["career"][$i] . '"/>
										<button id="btnDeleteGrid" class="btndelete" name="btn" value="form_delete" type="submit"></button>
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
	if ($_SESSION['total_careers'] == 0) {
		echo '
				<img src="/images/404.svg" class="data-not-found" alt="404">
		';
	}
	if ($_SESSION['total_careers'] != 0) {
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