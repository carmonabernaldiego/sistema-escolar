<?php
include_once '../security.php';
include_once '../conexion.php';

require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

//  form_add
unset($_SESSION['temp_subject']);
unset($_SESSION['temp_subject_name']);
unset($_SESSION['temp_subject_semester']);
unset($_SESSION['temp_subject_description']);
unset($_SESSION['temp_subject_career_id']);
unset($_SESSION['temp_subject_career_name']);
unset($_SESSION['subject_teachers_user']);
unset($_SESSION['subject_teachers_name']);
unset($_SESSION['temp_select_teachers']);

//  form_consult
unset($_SESSION['subject']);
unset($_SESSION['subject_career']);
unset($_SESSION['subject_career_id']);
unset($_SESSION['subject_career_name']);
unset($_SESSION['subject_name']);
unset($_SESSION['subject_semester']);
unset($_SESSION['subject_description']);
unset($_SESSION['subject_teachers']);
unset($_SESSION['subject_teachers_user']);
unset($_SESSION['subject_teachers_name']);

//  form_update
unset($_SESSION['temp_subject_teachers_user']);
unset($_SESSION['temp_subject_teachers_name']);