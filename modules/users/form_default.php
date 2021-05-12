<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin.php');
?>
<div class="form-gridview">
	<table>
		<tr>
			<th>Usuario</th>
			<th>Correo</th>
			<th>Imagen</th>
			<th>Permisos</th>
			<th class="edit center"><a class="icon">edit</a></th>
			<th class="delete center"><a class="icon">delete</a></th>
		</tr>
		<?php
		for ($i = 0; $i < $_SESSION['total_users']; $i++) {
			echo '
		    		<tr>
						<td>' . $_SESSION["user_id"][$i] . '</td>
						<td><p>' . $_SESSION["user_email"][$i] . '</p></td>
						<td>' . $_SESSION["user_image"][$i] . '</td>
						<td>' . $_SESSION["user_type"][$i] . '</td>
						<td>
							<form action="" method="POST">
								<input style="display:none;" type="text" name="id" value="' . $_SESSION["user_id"][$i] . '"/>
								<button class="btnedit" name="btn" value="form_update" type="submit"></button>
							</form>
						</td>
						<td>
							<form action="" method="POST">
								<input style="display:none;" type="text" name="id" value="' . $_SESSION["user_id"][$i] . '"/>
								<input style="display:none;" type="text" name="userimage" value="' . $_SESSION["user_image"][$i] . '"/>
								<button class="btndelete" name="btn" value="form_delete" type="submit"></button>
							</form>
						</td>
					</tr>
				';
		}
		?>
	</table>
	<?php
	if ($i == 0) {
		echo '<img src="/images/404.svg" class="data-not-found" alt="404">';
	}
	?>
	<div class="pages">
		<ul>
			<?php
			for ($n = 1; $n <= $tpages; $n++) {
				if ($page == $n) {
					echo '<li class="active"><form name="form-pages" action="" method="POST"><button type="submit" name="page" value="' . $n . '">' . $n . '</button></form></li>';
				} else {
					echo '<li><form name="form-pages" action="" method="POST"><button type="submit" name="page" value="' . $n . '">' . $n . '</button></form></li>';
				}
			}
			?>
		</ul>
	</div>
</div>
<div class="content-aside">
	<?php
	include_once '../notif_info.php';
	include_once "../sections/options.php";
	?>
</div>