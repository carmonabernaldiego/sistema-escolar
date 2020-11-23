<?php
    require_once($_SESSION['raiz'].'/modules/sections/role-access-admin-editor.php');
?>
<div class="form-gridview">
	<table>
		<tr>
			<th>Asignatura</th>
			<th>Nombre</th>
			<th class="center">Semestre</th>
			<th class="view center"><a class="icon">visibility</a></th>
			<th class="edit center"><a class="icon">edit</a></th>
			<?php
				if($_SESSION['permissions'] != 'editor')
				{
					echo '<th class="delete center"><a class="icon">delete</a></th>';
				}
			?>
		</tr>
		<?php
			for ($i = 0; $i < $_SESSION['total_subjects']; $i++)
			{ 
	    	    echo'
		    		<tr>
		    			<td>'.$_SESSION["subject"][$i].'</td>
						<td>'.$_SESSION["subject_name"][$i].'</td>
						<td class="center">'.$_SESSION["subject_semester"][$i].'</td>
						<td>
							<form action="#" method="POST">
								<input style="display:none;" type="text" name="txtsubject" value="'.$_SESSION["subject"][$i].'"/>
								<button class="btnview" name="btn" value="form_consult" type="submit"></button>
							</form>
						</td>
						<td>
							<form action="#" method="POST">
								<input style="display:none;" type="text" name="txtsubject" value="'.$_SESSION["subject"][$i].'"/>
								<button class="btnedit" name="btn" value="form_update" type="submit"></button>
							</form>
						</td>';
						if($_SESSION['permissions'] != 'editor')
						{
							echo '
								<td>
									<form action="#" method="POST">
										<input style="display:none;" type="text" name="txtsubject" value="'.$_SESSION["subject"][$i].'"/>
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
	<div class="pages">
		<ul>
			<?php
			    for	($n = 1; $n <= $tpages; $n++)
				{
					if ($page == $n)
					{
						echo '<li class="active"><form name="form-pages" action="#" method="POST"><button type="submit" name="page" value="'.$n.'">'.$n.'</button></form></li>';
					}
					else
					{
						echo '<li><form name="form-pages" action="#" method="POST"><button type="submit" name="page" value="'.$n.'">'.$n.'</button></form></li>';
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