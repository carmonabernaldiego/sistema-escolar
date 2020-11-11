<?php
    if ($_SESSION['permissions'] != 'admin')
	{
		header('Location: /');
		exit();
	}
?>
<div class="form-load">
	<div class="head">
		<h1 class="titulo">Grupos</h1>
    </div>
	<table>
		<tr>
			<th>Grupo</th>
			<th>Nombre</th>
			<th class="center">Semestre</th>
			<th class="view center"><a class="icon icon-eye"></a></th>
			<th class="delete center"><a class="icon icon-trash"></a></th>
    	</tr>
		<?php
			for ($i = 0; $i < $_SESSION['total_groups']; $i++)
			{ 
	    	    echo'
		    		<tr>
		    			<td>'.$_SESSION["group"][$i].'</td>
						<td>'.$_SESSION["group_name"][$i].'</td>
						<td class="center">'.$_SESSION["group_semester"][$i].'</td>
						<td>
							<form action="#" method="POST">
								<input style="display:none;" type="text" name="txtgroup" value="'.$_SESSION["group"][$i].'"/>
								<input style="display:none;" type="text" name="txtgroupschoolperiod" value="'.$_SESSION['group_school_period'][$i].'"/>
								<button class="btnview" name="btn" value="form_consult" type="submit"></button>
							</form>
						</td>
						<td>
							<form action="#" method="POST">
								<input style="display:none;" type="text" name="txtgroup" value="'.$_SESSION["group"][$i].'"/>
								<input style="display:none;" type="text" name="txtgroupschoolperiod" value="'.$_SESSION['group_school_period'][$i].'"/>
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