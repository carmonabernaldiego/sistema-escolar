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
                    <label for="txtcareerid" class="label">Carrera</label>
                    <input id="txtcareerid" class="text" type="text" name="txtcareer" value="" maxlength="20" onkeyup="this.value = this.value.toUpperCase()" autofocus required />
                </div>
                <div class="last">
                    <label for="txtcareername" class="label">Nombre</label>
                    <input id="txtcareername" class="text" type="text" name="txtcareername" value="" maxlength="100" required />
                </div>
                <div class="description">
                    <label for="txtcareerdescription" class="label">Descripción</label>
                    <textarea id="txtcareerdescription" maxlength="2000" class="textarea" name="txtcareerdescription" data-expandable></textarea>
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
<script src="/js/controls/dataexpandable.js"></script>