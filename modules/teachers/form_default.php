<?php
	if ($_SESSION['permissions'] != 'admin')
	{
		header('Location: /');
		exit();
	}
?>
<div class="form-load">
	<table>
		<tr>
			<th>Usuario</th>
			<th>Nombre</th>
			<th>CURP</th>
			<th class="view center"><a class="icon">visibility</a></th>
			<th class="edit center"><a class="icon">edit</a></th>
			<th class="delete center"><a class="icon">delete</a></th>
    	</tr>
		<?php
			for ($i = 0; $i < $_SESSION['total_users']; $i++)
			{ 
	    	    echo'
		    		<tr>
		    			<td>'.$_SESSION["user_id"][$i].'</td>
						<td>'.$_SESSION["teacher_name"][$i].'</td>
						<td>'.$_SESSION["teacher_curp"][$i].'</td>
						<td>
							<form action="#" method="POST">
								<input style="display:none;" type="text" name="txtuserid" value="'.$_SESSION["user_id"][$i].'"/>
								<button class="btnview" name="btn" value="form_consult" type="submit"></button>
							</form>
						</td>
						<td>
							<form action="#" method="POST">
								<input style="display:none;" type="text" name="txtuserid" value="'.$_SESSION["user_id"][$i].'"/>
								<button class="btnedit" name="btn" value="form_update" type="submit"></button>
							</form>
						</td>
						<td>
							<form action="#" method="POST">
								<input style="display:none;" type="text" name="txtuserid" value="'.$_SESSION["user_id"][$i].'"/>
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
<div class="form-options">
	<div class="options">
		<form action="#" method="POST">
			<button class="btn icon" name="btn" value="form_add" type="submit">add</button>
		</form>
		<form action="#" method="POST">
			<button class="btn disabled icon" name="btn" value="form_coding" type="submit" disabled>code</button>		</form>
		<form action="#" method="POST">
			<button class="btn disabled icon" name="btn" value="form_printer" type="submit" disabled>print</button>
		</form>
		<form action="/">
			<button class="btn btnexit icon" type="submit">exit_to_app</button>
		</form>
    </div>
	<div class="search">
		<form name="form-search" action="#" method="POST">
			<p>
				<input type="text" class="text" name="search" placeholder="Buscar...">
				<button class="btn-search icon" type="submit">search</button>
			</p>
		</form>
	</div>
</div>
<?php
	include_once '../msgbox_info.php';
?>