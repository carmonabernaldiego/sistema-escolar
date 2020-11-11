<?php
	if ($_SESSION['permissions'] != 'admin')
	{
		header('Location: /');
		exit();
	}
	
	$sql = "SELECT COUNT(school_period) AS total FROM school_periods";

	if ($result = $conexion -> query($sql))
	{
		if ($row = mysqli_fetch_array($result))
		{
			$tpages = ceil($row['total'] / $max);
		}
	}

	if (!empty($_POST['search']))
	{
		$_SESSION['sp_id'] = array();
		$_SESSION['sp_start'] = array();
		$_SESSION['sp_end'] = array();
		$_SESSION['sp_active'] = array();
		$_SESSION['sp_current'] = array();

		$i = 0;

		$sql = "SELECT * FROM school_periods WHERE school_period = '".$_POST['search']."'";

		if ($result = $conexion -> query($sql))
		{
			while ($row = mysqli_fetch_array($result))
			{
				$_SESSION['sp_id'][$i] = $row['school_period'];
				$_SESSION['sp_start'][$i] = $row['start_date'];
				$_SESSION['sp_end'][$i] = $row['end_date'];
				$_SESSION['sp_current'][$i] = $row['current'];

				if($row['active'] == 1)
				{
					$_SESSION['sp_active'][$i] = 'Si';
				}
				else
				{
					$_SESSION['sp_active'][$i] = 'No';
				}

				if($row['current'] == 1)
				{
					$_SESSION['sp_current'][$i] = 'Si';
				}
				else
				{
					$_SESSION['sp_current'][$i] = 'No';
				}

				$i += 1;
			}
		}
		$_SESSION['total_school_periods'] = count($_SESSION['sp_id']);
	}
	else
	{
		$_SESSION['sp_id'] = array();
		$_SESSION['sp_start'] = array();
		$_SESSION['sp_end'] = array();
		$_SESSION['sp_active'] = array();
		$_SESSION['sp_current'] = array();

		$i = 0;

		$sql = "SELECT * FROM school_periods ORDER BY school_period LIMIT $inicio, $max";

		if ($result = $conexion -> query($sql))
		{
			while ($row = mysqli_fetch_array($result))
			{
				$_SESSION['sp_id'][$i] = $row['school_period'];
				$_SESSION['sp_start'][$i] = $row['start_date'];
				$_SESSION['sp_end'][$i] = $row['end_date'];
				$_SESSION['sp_current'][$i] = $row['current'];

				if($row['active'] == 1)
				{
					$_SESSION['sp_active'][$i] = 'Si';
				}
				else
				{
					$_SESSION['sp_active'][$i] = 'No';
				}

				if($row['current'] == 1)
				{
					$_SESSION['sp_current'][$i] = 'Si';
				}
				else
				{
					$_SESSION['sp_current'][$i] = 'No';
				}

				$i += 1;
			}
		}
		$_SESSION['total_school_periods'] = count($_SESSION['sp_id']);
	}
?>