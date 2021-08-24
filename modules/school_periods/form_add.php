<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin.php');
?>
<div class="form-data">
    <div class="head">
        <h1 class="titulo">Agregar</h1>
    </div>
    <div class="body">
        <form name="form-add-school-periods" action="insert.php" method="POST" autocomplete="off">
            <div class="wrap">
                <div class="first">
                    <label for="txtspid" class="label">Periodo escolar</label>
                    <input id="txtspid" class="text" type="text" name="txtspid" value="" maxlength="20" onkeyup="this.value = this.value.toUpperCase()" required autofocus />
                    <label for="datespstart" class="label">Inicia</label>
                    <input id="datespstart" class="date" type="text" name="datespstart" value="'.$_SESSION['sp_start'][0].'" maxlength="10" required autofocus />
                    <label for="datespend" class="label">Termina</label>
                    <input id="datespend" class="date" type="text" name="datespend" value="'.$_SESSION['sp_end'][0].'" maxlength="10" required />
                </div>
                <div class="last">
                    <label for="selectactive" class="label">Activo</label>
                    <select id="selectactive" class="select" name="selectactive" required>
                        <option value="1">Si</option>
                        <option value="0">No</option>
                    </select>
                    <label for="selectcurrent" class="label">Actual</label>
                    <select id="selectcurrent" class="select" name="selectcurrent" required>
                        <option value="0">No</option>
                        <option value="1">Si</option>
                    </select>
                </div>
            </div>
            <button id="btnSave" class="btn icon" type="submit">save</button>
        </form>
    </div>
</div>
<div class="content-aside">
    <?php
    include_once "../sections/options-disabled.php";
    ?>
</div>