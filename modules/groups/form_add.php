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
                    <label for="txtgroupid" class="label">Grupo</label>
                    <input id="txtgroupid" class="text" type="text" name="txtgroup" value="" maxlength="20" onkeyup="this.value = this.value.toUpperCase()" autofocus required />
                    <label for="txtgroupname" class="label">Nombre</label>
                    <input id="txtgroupname" class="text" type="text" name="txtgroupname" value="" maxlength="100" required />
                </div>
                <div class="last">
                    <label for="selectsubjectcareer" class="label">Carrera</label>
                    <select id="selectsubjectcareer" class="select" name="selectcareer" required>
                        <?php
                        echo '
                                <option value="">Seleccioné</option>
                        ';

                        $i = 0;

                        $sql = "SELECT * FROM careers ORDER BY name";

                        if ($result = $conexion->query($sql)) {
                            while ($row = mysqli_fetch_array($result)) {
                                echo '
                                    <option value="' . $row['career'] . '">' . $row['name'] . '</option>
                                ';
                                $i += 1;
                            }
                        }
                        ?>
                    </select>
                    <label for="txtgroupsemester" class="label">Semestre</label>
                    <input id="txtgroupsemester" class="text" type="number" name="txtgroupsemester" value="" maxlength="2" min="1" max="12" list="defaultsemestres" required />
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
                </div>
            </div>
            <button class="btn icon" name="btn" value="form_add_subjects_students" type="submit">arrow_forward</button>
        </form>
    </div>
</div>
<div class="content-aside">
    <?php
    include_once "../sections/options-disabled.php";
    ?>
</div>