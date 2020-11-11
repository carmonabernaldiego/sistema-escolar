<?php
    if ($_SESSION['permissions'] != 'admin')
	{
		header('Location: /');
		exit();
	}
?>
<div class="form-data">
	<div class="head">
		<h1 class="titulo">Agregar</h1>
    </div>
   <div class="body">
        <form name="form-add-school-periods" action="insert.php" method="POST">
            <div class="first">
                <label class="label">Periodo escolar</label>
                <input class="text" type="text" name="txtspid" value="" maxlength="30" required autofocus/>
				<label class="label">Inicia</label>
                <input class="date" type="date" name="datespstart" value="'.$_SESSION['sp_start'][0].'" required autofocus/>
                <label class="label">Termina</label>
                <input class="date" type="date" name="datespend" value="'.$_SESSION['sp_end'][0].'" required/>
			</div>
			<div class="last">
				<label class="label">Activo</label>
				<select class="select" name="selectactive">
					<option value="1">Si</option>
					<option value="0">No</option>
				</select>
				<label class="label">Actual</label>
				<select class="select" name="selectcurrent">
					<option value="0">No</option>
					<option value="1">Si</option>
				</select>
				<label style="visibility: hidden;" class="label">Etiqueta</label>
				<select style="visibility: hidden;" class="select" name="" autofocus>
				</select>
			</div>
			<button class="btn icon icon-confirm" type="submit"></button>
        </form>
    </div>
</div>
<div class="form-options">
	<div class="options">
		<form action="#" method="POST">
			<button class="btn disabled icon icon-plus" name="btn" value="form_add" type="submit" disabled></button>
		</form>
		<form action="#" method="POST">
			<button class="btn disabled icon icon-coding" name="btn" value="form_coding" type="submit" disabled></button>
		</form>
		<form action="#" method="POST">
			<button class="btn disabled icon icon-printer" name="btn" value="form_printer" type="submit" disabled></button>
		</form>
		<form action="#" method="POST">
			<button class="btnexit icon icon-exit" name="btn" value="form_default" type="submit"></button>
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