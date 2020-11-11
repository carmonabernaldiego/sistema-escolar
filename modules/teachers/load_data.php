<?php
	if ($_SESSION['permissions'] != 'admin')
	{
		header('Location: /');
		exit();
	}

	$sql = "SELECT COUNT(user) AS total FROM teachers";

	if ($result = $conexion -> query($sql))
	{
		if ($row = mysqli_fetch_array($result))
		{
			$tpages = ceil($row['total'] / $max);
		}
	}
	
	if (!empty($_POST['search']))
	{
		$_SESSION['user_id'] = array();
		$_SESSION['teacher_name'] = array();
		$_SESSION['teacher_curp'] = array();

		$i = 0;

		$sql = "SELECT * FROM teachers WHERE user = '".$_POST['search']."' OR name = '".$_POST['search']."' OR curp = '".$_POST['search']."'";

		if ($result = $conexion -> query($sql))
		{
			while ($row = mysqli_fetch_array($result))
			{
				$_SESSION['user_id'][$i] = $row['user'];
				$_SESSION['teacher_curp'][$i] = $row['curp'];
				$_SESSION['teacher_name'][$i] = $row['name'].' '.$row['surnames'];

				$i += 1;
			}
		}
		$_SESSION['total_users'] = count($_SESSION['user_id']);
	}
	else
	{
		$_SESSION['user_id'] = array();
		$_SESSION['teacher_name'] = array();
		$_SESSION['teacher_curp'] = array();

		$i = 0;

		$sql = "SELECT * FROM teachers ORDER BY name LIMIT $inicio, $max";

		if ($result = $conexion -> query($sql))
		{
			while ($row = mysqli_fetch_array($result))
			{
				$_SESSION['user_id'][$i] = $row['user'];
				$_SESSION['teacher_curp'][$i] = $row['curp'];
				$_SESSION['teacher_name'][$i] = $row['name'].' '.$row['surnames'];

				$i += 1;
			}
		}
		$_SESSION['total_users'] = count($_SESSION['user_id']);
	}
?>