<?php
include_once '../modules/security.php';
include_once '../modules/conexion.php';

include_once '../modules/close_notif_info.php';

header('Content-Type: text/html; charset=UTF-8');

//Permisos de administrador
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin.php');

// Formulario actual
if (!empty($_POST['btn'])) {
	$view_form = $_POST['btn'] . '.php';
} else {
	$view_form = 'form_default.php';
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1" />
	<title>Asistencia | Sistema de Control Escolar</title>
	<link rel="icon" type="image/png" href="/images/asistencia_icon.png" />
	<link rel="stylesheet" href="/css/style.css" media="screen, projection" type="text/css" />
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
		include_once "../modules/sections/about-section.php";
		?>
	</header>
	<aside>
		<?php
		if (!empty($_SESSION['section-admin']) == 'go-' . $_SESSION['user']) {
			include_once '../modules/sections/section-admin.php';
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