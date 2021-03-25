<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin.php');
?>
<div class="form-data">
    <div class="head">
        <h1 class="titulo">Grupos</h1>
    </div>
    <div class="body">
        <div class="formAttendanceAdd">
            <?php
            $_SESSION['group'] = array();
            $_SESSION['group_name'] = array();

            $i = 0;

            $sql = "SELECT * FROM groups WHERE school_period = '" . $_SESSION['school_period'] . "' ORDER BY name";

            if ($result = $conexion->query($sql)) {
                while ($row = mysqli_fetch_array($result)) {
                    $_SESSION['group'][$i] = $row['id_group'];
                    $_SESSION['group_name'][$i] = $row['name'];

                    $i += 1;
                }
            }
            $_SESSION['total_groups'] = count($_SESSION['group']);

            for ($i = 0; $i < $_SESSION['total_groups']; $i++) {
                $sql = "SELECT * FROM groups WHERE id_group = '" . $_SESSION["group"][$i] . "' AND school_period = '" . $_SESSION['school_period'] . "'";

                if ($result = $conexion->query($sql)) {
                    while ($row = mysqli_fetch_array($result)) {
                        $_SESSION['group_subjects'] = $row['subjects'];
                    }
                }

                $array_subjects = array();
                $_SESSION['subject_group'] = array();
                $_SESSION['subject_name_group'] = array();

                $_SESSION['group_subjects'] = trim($_SESSION['group_subjects'], ',');
                $array_subjects = explode(',', $_SESSION['group_subjects']);

                $j = 0;

                foreach ($array_subjects as $row) {
                    if ($array_subjects[$j] != '') {
                        $sql = "SELECT * FROM subjects WHERE subject = '" . $array_subjects[$j] . "' AND school_period = '" . $_SESSION['school_period'] . "'";

                        if ($result = $conexion->query($sql)) {
                            while ($row = mysqli_fetch_array($result)) {
                                $_SESSION['subject_group'][$j] = $row['subject'];
                                $_SESSION['subject_name_group'][$j] = $row['name'];
                            }
                        }
                    }
                    $j += 1;
                }

                echo '
                        <table class="attendanceGroups">
                            <tr>
                                <th class="center nameGroup" colspan="2">' . $_SESSION["group_name"][$i] . ' (' . $_SESSION["group"][$i] . ')</th>
                            </tr>';

                $h = 0;

                foreach ($_SESSION['subject_name_group'] as $row) {
                    if ($_SESSION['subject_name_group'][$h] != '') {
                        echo '
                                        <tr>
                                            <td class="left">' . $_SESSION["subject_name_group"][$h] . '</td>
                                            <td class="right">
							                    <form action="/attendance" method="POST">
								                    <input style="display:none;" type="text" name="txtgroup" value="' . $_SESSION["group"][$i] . '"/>
							               	        <input style="display:none;" type="text" name="txtgroupsubject" value="' . $_SESSION["subject_group"][$h] . '"/>
							             	        <button class="btnview" name="btnAddAttendance" value="" type="submit"></button>
							                    </form>
				        		            </td>
                                        </tr>
                                    ';
                    }
                    $h += 1;
                }
                echo '
                        </table>
                    ';
            }
            ?>
        </div>
    </div>
</div>
<div class="content-aside">
    <?php
    include_once "../sections/options-disabled.php";
    ?>
</div>