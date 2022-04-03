<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin.php');

function unique_id($l = 10)
{
    return substr(md5(uniqid(mt_rand(), true)), 0, $l);
}

$id_generate = 'admin-' . unique_id(5);
?>
<div class="form-data">
    <div class="head">
        <h1 class="titulo">Agregar</h1>
    </div>
    <div class="body">
        <form name="form-add-administratives" action="insert.php" method="POST" autocomplete="off" autocapitalize="on">
            <div class="wrap">
                <div class="first">
                    <label for="txtuserid" class="label">Usuario</label>
                    <input id="txtuserid" class="text" style=" display: none;" type="text" name="txtuserid" value="<?php echo $id_generate; ?>" maxlength="50" required />
                    <input class="text" type="text" name="txt" value="<?php echo $id_generate; ?>" required disabled />
                    <label for="txtusername" class="label">Nombre</label>
                    <input id="txtusername" class="text" type="text" name="txtname" value="" placeholder="Nombre" maxlength="30" required autofocus />
                    <label for="txtusersurnames" class="label">Apellidos</label>
                    <input id="txtusersurnames" class="text" type="text" name="txtsurnames" placeholder="Apellidos" value="" maxlength="60" required />
                    <label for="dateofbirth" class="label">Fecha de nacimiento</label>
                    <input id="dateofbirth" class="date" type="text" name="dateofbirth" value="" placeholder="aaaa-mm-dd" pattern="\d{4}-\d{2}-\d{2}" maxlength="10" required />
                    <label for="selectgender" class="label">Género</label>
                    <select id="selectgender" class="select" name="selectgender" required>
                        <option value="">Seleccioné</option>
                        <option value="mujer">Mujer</option>
                        <option value="hombre">Hombre</option>
                        <option value="otro">Otro</option>
                        <option value="nodecirlo">Prefiero no decirlo</option>
                    </select>
                    <label for="txtusercurp" class="label">CURP</label>
                    <input id="txtusercurp" class="text" type="text" name="txtcurp" value="" placeholder="Clave Única de Registro de Población" pattern="[A-Za-z0-9]{18}" maxlength="18" onkeyup="this.value = this.value.toUpperCase()" required />
                </div>
                <div class="last">
                    <label for="txtuserrfc" class="label">RFC</label>
                    <input id="txtuserrfc" class="text" type="text" name="txtrfc" value="" placeholder="XAXX010101000" pattern="[A-Za-z0-9]{13}" maxlength="13" onkeyup="this.value = this.value.toUpperCase()" required />
                    <label for="txtuserphone" class="label">Número de teléfono</label>
                    <input id="txtuserphone" class="text" type="text" name="txtphone" value="" placeholder="9998887766" pattern="[0-9]{10}" title="Ingresa un número de teléfono válido." maxlength="10" required />
                    <label for="txtuseraddress" class="label">Domicilio</label>
                    <input id="txtuseraddress" class="text" type="text" name="txtaddress" value="" placeholder="Domicilio" maxlength="200" required />
                    <label for="selectuserlevelstudies" class="label">Nivel de estudios</label>
                    <select id="selectuserlevelstudies" class="select" name="selectlevelstudies" required>
                        <option value="">Seleccioné</option>
                        <option value="Licenciatura">Licenciatura</option>
                        <option value="Ingenieria">Ingenieria</option>
                        <option value="Maestria">Maestria</option>
                        <option value="Doctorado">Doctorado</option>
                    </select>
                    <label for="txtuseroccupation" class="label">Cargo</label>
                    <input id="txtuseroccupation" class="text" type="text" name="txtoccupation" value="" placeholder="Cargo" maxlength="100" required />
                    <label for="txtuserobservation" class="label">Observación</label>
                    <input id="txtuserobservation" class="text" type="text" name="txtobservation" value="" placeholder="Observación" maxlength="200" />
                </div>
            </div>
            <button id="btnBack" class="btn back icon" type="button">arrow_back</button>
            <button id="btnNext" class="btn icon" type="button">arrow_forward</button>
            <button id="btnSave" class="btn icon" type="submit">save</button>
        </form>
    </div>
</div>
<div class="content-aside">
    <?php
    include_once "../sections/options-disabled.php";
    ?>
</div>
<script src="/js/modules/administratives.js" type="text/javascript"></script>