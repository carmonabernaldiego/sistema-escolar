<?php
	include_once '../security.php';
	include_once '../conexion.php';
	include_once '../functions.php';
	include_once '../close_notif_info.php';

	header('Content-Type: text/html; charset=UTF-8');

	//Permisos de administrador
	require_once($_SESSION['raiz'].'/modules/sections/role-access-admin-editor.php');

	// Formulario actual
	if (!empty($_POST['btn']))
	{
		$view_form = $_POST['btn'].'.php';
	}
	else
	{
		$view_form = 'form_default.php';
	}

	// Pagina actual
	if (!empty($_POST['page']))
	{
		$page = $_POST['page'];
	}
	else
	{
		$page = 1;
	}
	
	// Numero de registros a visualizar
	$max = 50;
	$inicio = ($page - 1) * $max;

	// Cargar datos de usuarios
	include_once 'load_data.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1" />
	<title>Docentes | Sistema Escolar</title>
	<link rel="icon" type="image/png" href="../../images/asistencia_icon.png" />
	<link rel="stylesheet" href="../../css/style.css" media="screen, projection" type="text/css" />
	<link rel="stylesheet" href="../../css/style_icons.css" media="screen, projection" type="text/css" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
    <script src="/js/jquery.min.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $(".loader").fadeOut("slow");
    });
    </script>
</head>
<body>
    <div class="loader"></div>
	
		<header class="header">
			<?php
				include_once "../sections/about-section.php";
			?>
		</header>
		<aside>
			<?php
				if (!empty($_SESSION['section-admin']) == 'go-'.$_SESSION['user'])
				{
					include_once '../sections/section-admin.php';
				}
				elseif (!empty($_SESSION['section-editor']) == 'go-'.$_SESSION['user'])
				{
					include_once '../sections/section-editor.php';
				}
			?>
		</aside>
		<section class="content">
			<?php
				include_once $view_form;
			?>
		</section>
</body>
</html>