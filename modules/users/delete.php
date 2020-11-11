<?php
	include_once '../security.php';
	include_once '../conexion.php';
	include_once '../functions.php';

	if ($_SESSION['permissions'] != 'admin')
	{
		header('Location: /');
		exit();
	}
	
	if (empty($_POST['txtuserid']))
	{
		header('Location: /');
		exit();
	}

	if($_POST['txtuserimage'] != 'user.png')
	{
		unlink('../../images/users/'.$_POST['txtuserimage'].'');
	}

	$sql_delete = "DELETE FROM users WHERE user = '".$_POST['txtuserid']."'";

	mysqli_query($conexion, $sql_delete);

	$_SESSION['msgbox_info'] = 1;
	$_SESSION['text_msgbox_info'] = 'Registro eliminado correctamente.';

	header ('Location: /modules/users');
?>