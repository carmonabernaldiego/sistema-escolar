<?php
    include_once '../security.php';
    include_once '../conexion.php';
    
    require_once($_SESSION['raiz'].'/modules/sections/role-access-admin-editor.php');

	if (isset($_POST['btn-school-period']) && $_POST['btn-school-period'] = 'true')
	{
		$i=0;

		if(isset($_SESSION['school_periods_id']))
		{
			foreach($_SESSION['school_periods_id'] as $row)
			{
				if(isset($_POST['check-school-period'.$i]))
				{
					$_SESSION['school_period'] = $_POST['check-school-period'.$i];
					setcookie('school_period', $_POST['check-school-period'.$i], time() + 365 * 24 * 60 * 60, "/");
				}
				$i += 1;
			}
		}
		header ('Location: /');
	}
?>