<?php
	if ($_SESSION['permissions'] != 'admin')
	{
		header('Location: /');
		exit();
	}
?>
<div class="form-load">
	<div class="head">
		<h1 class="titulo">Usuarios</h1>
    </div>
	<table>
		<tr>
			<th>Usuario</th>
			<th>Permisos</th>
			<th>Imagen</th>
			<th class="edit center"><a class="icon icon-edit"></a></th>
			<th class="delete center"><a class="icon icon-trash"></a></th>
    	</tr>
		<?php
			for ($i = 0; $i < $_SESSION['total_users']; $i++)
			{ 
	    	    echo'
		    		<tr>
						<td>'.$_SESSION["user_id"][$i].'</td>
						<td>'.$_SESSION["user_type"][$i].'</td>
						<td>'.$_SESSION["user_image"][$i].'</td>
						<td>
							<form action="#" method="POST">
								<input style="display:none;" type="text" name="id" value="'.$_SESSION["user_id"][$i].'"/>
								<button class="btnedit" name="btn" value="form_update" type="submit"></button>
							</form>
						</td>
						<td>
							<form action="#" method="POST">
								<input style="display:none;" type="text" name="id" value="'.$_SESSION["user_id"][$i].'"/>
								<input style="display:none;" type="text" name="userimage" value="'.$_SESSION["user_image"][$i].'"/>
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
			<button class="btn icon icon-plus" name="btn" value="form_add" type="submit"></button>
		</form>
		<form action="#" method="POST">
			<button class="btn disabled icon icon-coding" name="btn" value="form_coding" type="submit" disabled></button>
		</form>
		<form action="#" method="POST">
			<button class="btn disabled icon icon-printer" name="btn" value="form_printer" type="submit" disabled></button>
		</form>
		<form action="/">
			<button class="btnexit icon icon-exit" type="submit"></button>
		</form>
    </div>
	<div class="search">
		<form name="form-search" action="#" method="POST">
			<p>
				<input type="text" class="text" name="search" placeholder="Buscar...">
				<button class="btn-search icon  icon-search" type="submit"></button>
			</p>
		</form>
	</div>
</div>
<?php
	include_once '../msgbox_info.php';
?>