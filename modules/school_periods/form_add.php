<?php
    require_once($_SESSION['raiz'].'/modules/sections/role-access-admin.php');
?>
<div class="form-data">
	<div class="head">
		<h1 class="titulo">Agregar</h1>
    </div>
   <div class="body">
        <form name="form-add-school-periods" action="insert.php" method="POST">
			<div class="wrap">
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
</div><button class="btn icon" type="submit">save</button>
        </form>
    </div>
</div>
<div class="content-aside">
<?php
	include_once "../sections/options-disabled.php";
?>
</div>