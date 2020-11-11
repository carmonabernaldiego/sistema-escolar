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

	$directorioSubida = "../../images/users/";
	$max_file_size = "1024000";
	$extensionesValidas = array("jpg", "png");

	if(isset($_FILES['fileimage']))
	{
		$errores = array();
		$nombreArchivo = $_FILES['fileimage']['name'];
		$filesize = $_FILES['fileimage']['size'];
		$directorioTemp = $_FILES['fileimage']['tmp_name'];
		$tipoArchivo = $_FILES['fileimage']['type'];
		$arrayArchivo = pathinfo($nombreArchivo);
		$extension = $arrayArchivo['extension'];

		// Comprobamos la extensión del archivo
		if(!in_array($extension, $extensionesValidas)){
			$errores[] = "La extensión del archivo no es válida o no se ha subido ningún archivo";
		}

		// Comprobamos el tamaño del archivo
		if($filesize > $max_file_size){
			$errores[] = "La imagen debe de tener un tamaño inferior a 1 mb";
		}

		// Comprobamos y renombramos el nombre del archivo
		$nombreArchivo = $arrayArchivo['filename'];
		$nombreArchivo = preg_replace("/[^A-Z0-9._-]/i", "_", $nombreArchivo);
		$nombreArchivo = $nombreArchivo . rand(1, 1000);

		// Desplazamos el archivo si no hay errores
		if(empty($errores))
		{
			$nombreCompleto = $directorioSubida.$nombreArchivo.".".$extension;
			$nombre_img = $nombreArchivo.".".$extension;
        	move_uploaded_file($directorioTemp, $nombreCompleto);
		}
		else
		{
			$nombre_img = $_SESSION['user_image'][0];
		}
	}
	
	$sql_update = "UPDATE users SET permissions = '".$_POST['txtusertype']."', image = '".$nombre_img."' WHERE user = '".$_POST['txtuserid']."'";

	mysqli_query($conexion, $sql_update);

	$_SESSION['msgbox_info'] = 1;
	$_SESSION['text_msgbox_info'] = 'Registro modificado correctamente.';

	header ('Location: /modules/users');
?>