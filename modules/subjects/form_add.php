<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');
?>
<div class="form-data">
    <div class="head">
        <h1 class="titulo">Agregar</h1>
    </div>
    <div class="body">
        <form name="form-add-subjects" action="insert.php" method="POST" onsubmit="return sendTeachers()">
            <div class="wrap">
                <div class="first">
                    <label for="txtsubjectid" class="label">Asignatura</label>
                    <input id="txtsubjectid" class="text" type="text" id="txtsubject" name="txtsubject" value="<?php if (isset($_SESSION['temp_subject'])) {
                                                                                                    echo $_SESSION['temp_subject'];
                                                                                                } ?>" maxlength="20" onkeyup="this.value = this.value.toUpperCase()" autofocus required />
                    <label for="txtsubjectname" class="label">Nombre</label>
                    <input id="txtsubjectname" class="text" type="text" id="txtsubjectname" name="txtsubjectname" value="<?php if (isset($_SESSION['temp_subject_name'])) {
                                                                                                            echo $_SESSION['temp_subject_name'];
                                                                                                        } ?>" maxlength="100" required />
                    <label for="txtsubjectdescription" class="label">Descripción</label>
                    <textarea id="txtsubjectdescription" maxlength="2000" class="textarea" id="txtsubjectdescription" name="txtsubjectdescription" data-expandable><?php if (isset($_SESSION['temp_subject_description'])) {
                                                                                                                                            echo $_SESSION['temp_subject_description'];
                                                                                                                                        } ?></textarea>
                </div>
                <div class="last">
                    <label for="selectsubjectcareer" class="label">Carrera</label>
                    <select id="selectsubjectcareer" class="selectCareer" name="selectcareer" required>
                        <?php
                        if (isset($_SESSION['temp_subject_career_id'])) {
                            echo '<option value="' . $_SESSION['temp_subject_career_id'] . '">' . $_SESSION['temp_subject_career_name'] . '</option>';
                        } else {
                            echo '<option value="">Seleccioné</option>';
                        }

                        $i = 0;

                        $sql = "SELECT * FROM careers ORDER BY name";

                        if ($result = $conexion->query($sql)) {
                            while ($row = mysqli_fetch_array($result)) {
                                if ($row['career'] != $_SESSION['temp_subject_career_id']) {
                                    echo '<option value="' . $row['career'] . '">' . $row['name'] . '</option>';
                                }
                                $i += 1;
                            }
                        }
                        ?>
                    </select>
                    <label for="txtsubjectsemester" class="label">Semestre</label>
                    <input class="text" type="number" id="txtsubjectsemester" name="txtsubjectsemester" value="<?php if (isset($_SESSION['temp_subject_semester'])) {
                                                                                                                    echo $_SESSION['temp_subject_semester'];
                                                                                                                } ?>" maxlength="2" min="1" max="12" list="defaultsemestres" required />
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
                <div class="content-full">
                    <label for="selectcareersteachers" class="label">Docente(s)</label>
                    <select id="selectcareersteachers" class="select-careers-teachers" name="selectCareersTeachers[]" multiple="multiple" required>
                        <?php
                        $i = 0;

                        foreach ($_SESSION['subject_teachers_user'] as $row) {
                            echo
                            '
								<option value="' . $_SESSION['subject_teachers_user'][$i] . '">' . $_SESSION['subject_teachers_name'][$i] . '</option>
							';

                            $i += 1;
                        }
                        ?>
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
<script src="/js/controls/dataexpandable.js"></script>
<script src="/js/modules/addsubject.js"></script>