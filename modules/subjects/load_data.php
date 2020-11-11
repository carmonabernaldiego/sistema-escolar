<?php
	if ($_SESSION['permissions'] != 'admin')
	{
		header('Location: /');
		exit();
	}

	$sql = "SELECT COUNT(subject) AS total FROM subjects";

	if ($result = $conexion -> query($sql))
	{
		if ($row = mysqli_fetch_array($result))
		{
			$tpages = ceil($row['total'] / $max);
		}
	}
	
	if (!empty($_POST['search']))
	{
		$_SESSION['subject'] = array();
		$_SESSION['subject_name'] = array();
		$_SESSION['subject_semester'] = array();

		$i = 0;

		$sql = "SELECT * FROM subjects WHERE subject = '".$_POST['search']."' AND school_period = '".$_SESSION['school_period']."' OR name = '".$_POST['search']."'";

		if ($result = $conexion -> query($sql))
		{
			while ($row = mysqli_fetch_array($result))
			{
				$_SESSION['subject'][$i] = $row['subject'];
				$_SESSION['subject_name'][$i] = $row['name'];
				$_SESSION['subject_semester'][$i] = $row['semester'];

				$i += 1;
			}
		}
		$_SESSION['total_subjects'] = count($_SESSION['subject']);
	}
	else
	{
		$_SESSION['subject'] = array();
		$_SESSION['subject_name'] = array();
		$_SESSION['subject_semester'] = array();

		$i = 0;

		$sql = "SELECT * FROM subjects WHERE school_period = '".$_SESSION['school_period']."' ORDER BY name LIMIT $inicio, $max";

		if ($result = $conexion -> query($sql))
		{
			while ($row = mysqli_fetch_array($result))
			{
				$_SESSION['subject'][$i] = $row['subject'];
				$_SESSION['subject_name'][$i] = $row['name'];
				$_SESSION['subject_semester'][$i] = $row['semester'];

				$i += 1;
			}
		}
		$_SESSION['total_subjects'] = count($_SESSION['subject']);
	}
?>