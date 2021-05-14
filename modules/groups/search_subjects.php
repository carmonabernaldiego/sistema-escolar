<?php
include_once '../security.php';
include_once $_SESSION['raiz'] . '/modules/conexion.php';

require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

unset($_SESSION['temp_subject']);
unset($_SESSION['temp_subject_name']);
unset($_SESSION['temp_subject_semester']);
unset($_SESSION['temp_subject_description']);
unset($_SESSION['temp_subject_career_id']);
unset($_SESSION['temp_subject_career_name']);

$_SESSION['temp_subject'] = $_POST['txtsubject'];
$_SESSION['temp_subject_name'] = $_POST['txtsubjectname'];
$_SESSION['temp_subject_semester'] = $_POST['txtsubjectsemester'];
$_SESSION['temp_subject_description'] = $_POST['txtsubjectdescription'];
$_SESSION['temp_subject_career_id'] = $_POST['selectsubjectcareerid'];
$_SESSION['temp_subject_career_name'] = $_POST['selectsubjectcareername'];

unset($_SESSION['groups_name_user']);
unset($_SESSION['groups_name']);

$_SESSION['groups_id'] = array();
$_SESSION['groups_name'] = array();

unset($_SESSION['temp_groups_name_user']);
unset($_SESSION['temp_groups_name']);

$_SESSION['temp_groups_id'] = array();
$_SESSION['temp_groups_name'] = array();

if (isset($_SESSION['temp_subject_career_id'])) {
    $sql = "SELECT * FROM teachers WHERE career = '" . $_SESSION['temp_subject_career_id'] . "' ORDER BY name";

    $i = 0;

    if ($result = $conexion->query($sql)) {
        while ($row = mysqli_fetch_array($result)) {
            $_SESSION['groups_id'][$i] = $row['user'];
            $_SESSION['groups_name'][$i] = $row['name'] . ' ' . $row['surnames'];

            $_SESSION['temp_groups_id'][$i] = $row['user'];
            $_SESSION['temp_groups_name'][$i] = $row['name'] . ' ' . $row['surnames'];

            $i += 1;
        }
    }
} else {
    header('Location: /');
    exit();
}