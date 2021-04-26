<?php
include_once '../security.php';
include_once '../conexion.php';

require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

unset($_SESSION['temp_subject']);
unset($_SESSION['temp_subject_name']);
unset($_SESSION['temp_subject_semester']);
unset($_SESSION['temp_subject_description']);
unset($_SESSION['temp_subject_career_id']);
unset($_SESSION['temp_subject_career_name']);
unset($_SESSION['career_teacher_user']);
unset($_SESSION['career_teacher_name']);
unset($_SESSION['temp_select_teachers']);