<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin.php');
?>
<div class="form-data">
    <div class="head">
        <h1 class="titulo">Agregar</h1>
    </div>
    <div class="body">
        <form name="form-add-school-periods" action="insert.php" method="POST" autocomplete="off" autocapitalize="off">
            <div class="wrap">
                <div class="first">
                    <label for="txtspid" class="label">Periodo escolar</label>
                    <input id="txtspid" class="text" type="text" name="txtspid" value="" maxlength="20" onkeyup="this.value = this.value.toUpperCase()" required autofocus />
                    <label for="datespstart" class="label">Inicia</label>
                    <input id="datespstart" class="date" type="text" name="datespstart" value="" pattern="^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[13-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$" placeholder="DD/MM/YYYY" maxlength="10" required />
                    <label for="datespend" class="label">Termina</label>
                    <input id="datespend" class="date" type="text" name="datespend" value="" pattern="^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[13-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$" placeholder="DD/MM/YYYY" maxlength="10" required />
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
<script src="/js/schoolperiods.js" type="text/javascript"></script>