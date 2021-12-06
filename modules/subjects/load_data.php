<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

$sql = "SELECT COUNT(subject) AS total FROM subjects";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		$tpages = ceil($row['total'] / $max);
	}
}

if (!empty($_POST['search'])) {
	$_POST['search'] = trim($_POST['search']);
	$_POST['search'] = mysqli_real_escape_string($conexion, $_POST['search']);
	
	$_SESSION['subject'] = array();
	$_SESSION['subject_name'] = array();
	$_SESSION['subject_semester'] = array();
	$_SESSION['subject_career'] = array();

	$i = 0;

	$sql = "SELECT * FROM subjects WHERE subject LIKE '%" . $_POST['search'] . "%' OR name LIKE '%" . $_POST['search'] . "%' OR semester LIKE '%" . $_POST['search'] . "%' OR career LIKE '%" . $_POST['search'] . "%' ORDER BY semester, career, name";

	if ($result = $conexion->query($sql)) {
		while ($row = mysqli_fetch_array($result)) {
			$_SESSION['subject'][$i] = $row['subject'];
			$_SESSION['subject_name'][$i] = $row['name'];
			$_SESSION['subject_semester'][$i] = $row['semester'];
			$_SESSION['subject_career'][$i] = $row['career'];

			$i += 1;
		}
	}
	$_SESSION['total_subjects'] = count($_SESSION['subject']);
} else {
	$_SESSION['subject'] = array();
	$_SESSION['subject_name'] = array();
	$_SESSION['subject_semester'] = array();
	$_SESSION['subject_career'] = array();

	$i = 0;

	$sql = "SELECT * FROM subjects ORDER BY semester, career, name LIMIT $inicio, $max";

	if ($result = $conexion->query($sql)) {
		while ($row = mysqli_fetch_array($result)) {
			$_SESSION['subject'][$i] = $row['subject'];
			$_SESSION['subject_name'][$i] = $row['name'];
			$_SESSION['subject_semester'][$i] = $row['semester'];
			$_SESSION['subject_career'][$i] = $row['career'];

			$i += 1;
		}
	}
	$_SESSION['total_subjects'] = count($_SESSION['subject']);
}