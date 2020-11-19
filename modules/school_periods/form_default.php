<?php
    if ($_SESSION['permissions'] != 'admin')
	{
		header('Location: /');
		exit();
	}
?>
<div class="form-gridview">
	<table>
		<tr>
			<th>Periodo Escolar</th>
			<th>Fecha Inicio</th>
			<th>Fecha Fin</th>
			<th class="center">Activo</th>
			<th class="center">Actual</th>
			<th class="edit center"><a class="icon">edit</a></th>
			<th class="delete center"><a class="icon">delete</a></th>
    	</tr>
		<?php
			for ($i = 0; $i < $_SESSION['total_school_periods']; $i++)
			{ 
	    	    echo'
					<tr>
						<td>'.$_SESSION["sp_id"][$i].'</td>
						<td>'.$_SESSION["sp_start"][$i].'</td>
						<td>'.$_SESSION["sp_end"][$i].'</td>
						<td class="center">'.$_SESSION["sp_active"][$i].'</td>
						<td class="center">'.$_SESSION["sp_current"][$i].'</td>
						<td>
							<form action="#" method="POST">
								<input style="display:none;" type="text" name="txtspid" value="'.$_SESSION["sp_id"][$i].'"/>
								<button class="btnedit" name="btn" value="form_update" type="submit"></button>
							</form>
						</td>
						<td>
							<form action="#" method="POST">
								<input style="display:none;" type="text" name="txtspid" value="'.$_SESSION["sp_id"][$i].'"/>
								<button class="btndelete" name="btn" value="form_delete" type="submit"></button>
							</form>
						</td>
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
<?php
	include_once "../sections/options.php";
	include_once '../msgbox_info.php';
?>