<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');
?>
<div class="form-data">
    <div class="head">
        <h1 class="titulo">Agregar</h1>
    </div>
    <div class="body">
        <form name="form-add-careers" action="insert.php" method="POST">
            <div class="wrap">
                <div class="first">
                    <label class="label">Carrera</label>
                    <input class="text" type="text" name="txtcareer" value="" maxlength="20" autofocus required />
                </div>
                <div class="last">
                    <label class="label">Nombre</label>
                    <input class="text" type="text" name="txtcareername" value="" maxlength="150" required />
                </div>
                <div class="description">
                    <label class="label">Descripción</label>
                    <textarea maxlength="2000" class="textarea" name="txtcareerdescription"></textarea>
                </div>
            </div>
            <button class="btn icon" type="submit">save</button>
        </form>
    </div>
</div>
<div class="content-aside">
    <?php
    include_once "../sections/options-disabled.php";
    ?>
</div>