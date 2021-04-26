<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');
?>
<div class="form-data">
    <div class="head">
        <h1 class="titulo">Agregar</h1>
    </div>
    <div class="body">
        <form name="form-add-groups" action="" method="POST">
            <div class="wrap">
                <div class="first">
                    <label class="label">Grupo</label>
                    <input class="text" type="text" name="txtgroup" value="" maxlength="20" autofocus required />
                    <label class="label">Nombre</label>
                    <input class="text" type="text" name="txtgroupname" value="" maxlength="100" required />
                </div>
                <div class="last">
                    <label class="label">Semestre</label>
                    <input class="text" type="number" name="txtgroupsemester" value="" maxlength="2" min="1" max="12" list="defaultsemestres" required />
                    <datalist id="defaultsemestres">
                        <?php
                        for ($i = 1; $i <= 12; $i++) {
                            echo
                            '
								<option value="' . $i . '">
							';
                        }
                        ?>
                    </datalist>
                    <label class="label">Asignar</label>
                    <button class="btn-add-subjects" name="btn" value="form_add_subjects" type="submit">Asignaturas</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="content-aside">
    <?php
    include_once "../sections/options-disabled.php";
    ?>
</div>