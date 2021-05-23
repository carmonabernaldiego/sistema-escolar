<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin.php');

function unique_id($l = 10)
{
    return substr(md5(uniqid(mt_rand(), true)), 0, $l);
}

$id_generate = 'admin' . unique_id(5);
?>
<div class="form-data">
    <div class="head">
        <h1 class="titulo">Agregar</h1>
    </div>
    <div class="body">
        <form name="form-add-administratives" action="insert.php" method="POST">
            <div class="wrap">
                <div class="first">
                    <label for="txtuserid" class="label">Usuario</label>
                    <input id="txtuserid" class="text" style=" display: none;" type="text" name="txtuserid" value="<?php echo $id_generate; ?>" maxlength="50" required />
                    <input class="text" type="text" name="txt" value="<?php echo $id_generate; ?>" required disabled />
                    <label for="txtusername" class="label">Nombre</label>
                    <input id="txtusername" class="text" type="text" name="txtname" value="" maxlength="25" required autofocus />
                    <label for="txtusersurnames" class="label">Apellidos</label>
                    <input id="txtusersurnames" class="text" type="text" name="txtsurnames" value="" maxlength="50" required />
                    <label for="txtusercurp" class="label">CURP</label>
                    <input id="txtusercurp" class="text" type="text" name="txtcurp" value="" maxlength="18" onkeyup="this.value = this.value.toUpperCase()" required />
                    <label for="txtuserrfc" class="label">RFC</label>
                    <input id="txtuserrfc" class="text" type="text" name="txtrfc" value="" maxlength="13" onkeyup="this.value = this.value.toUpperCase()" required />
                </div>
                <div class="last">
                    <label for="txtuserphone" class="label">Telefono</label>
                    <input id="txtuserphone" class="text" type="number" name="txtphone" value="" min="0" max="9999999999" maxlength="10" inputmode="email" required />
                    <label for="txtuseraddress" class="label">Domicilio</label>
                    <input id="txtuseraddress" class="text" type="text" name="txtaddress" value="" maxlength="100" required />
                    <label for="selectlevelstudies" class="label">Nivel de estudios</label>
                    <select id="selectlevelstudies" class="select" name="selectlevelstudies">
                        <option value="Licenciatura">Licenciatura</option>
                        <option value="Ingenieria">Ingenieria</option>
                        <option value="Maestria">Maestria</option>
                        <option value="Doctorado">Doctorado</option>
                    </select>
                    <label for="txtuseremployment" class="label">Cargo</label>
                    <input id="txtuseremployment" class="text" type="text" name="txtemployment" value="" maxlength="100" required />
                    <label for="txtuserobservation" class="label">Observación</label>
                    <input id="txtuserobservation" class="text" type="text" name="txtobservation" value="" maxlength="200" />
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