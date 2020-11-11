<?php
	if ($_SESSION['permissions'] != 'admin')
	{
		header('Location: /');
		exit();
	}

	$sql = "SELECT COUNT(user) AS total FROM users";

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
		$_SESSION['user_type'] = array();
		$_SESSION['user_image'] = array();

		$i = 0;

		$sql = "SELECT * FROM users WHERE user = '".$_POST['search']."'";

		if ($result = $conexion -> query($sql))
		{
			while ($row = mysqli_fetch_array($result))
			{
				$_SESSION['user_id'][$i] = $row['user'];
				$_SESSION['user_type'][$i] = $row['permissions'];
				$_SESSION['user_image'][$i] = $row['image'];

				$i += 1;
			}
		}
		$_SESSION['total_users'] = count($_SESSION['user_id']);
	}
	else
	{
		$_SESSION['user_id'] = array();
		$_SESSION['user_email'] = array();
		$_SESSION['user_type'] = array();
		$_SESSION['user_image'] = array();

		$i = 0;

		$sql = "SELECT * FROM users ORDER BY user LIMIT $inicio, $max";

		if ($result = $conexion -> query($sql))
		{
			while ($row = mysqli_fetch_array($result))
			{
				$_SESSION['user_id'][$i] = $row['user'];
				$_SESSION['user_type'][$i] = $row['permissions'];
				$_SESSION['user_image'][$i] = $row['image'];

				$i += 1;
			}
		}
		$_SESSION['total_users'] = count($_SESSION['user_id']);
	}
?>