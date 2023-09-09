<?php
session_start();

header('Content-Type: text/html; charset=UTF-8');

include_once 'modules/conexion.php';
include_once 'modules/cookie.php';


if (!empty($_SESSION['authenticate']) == 'go-' . !empty($_SESSION['usuario'])) {
	header('Location: home');
	exit();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1" />
	<meta name="google" value="notranslate">
	<link rel="icon" type="image/png" href="/images/icon.png" />
	<title>Sistema Escolar</title>
	<meta name="description" content="Sistema Escolar, gestión de asistencias." />
	<meta name="keywords" content="Sistema Escolar, Asistencias, Alumnos, Docentes, Administrativos, Sistema de Asistencias, MySoftUP, Diego, Carmona, Bernal, Diego Carmona Bernal, Gestión de Asistencias" />
	<link rel="stylesheet" href="/css/style.css" media="screen, projection" type="text/css" />
	<link rel="stylesheet" href="/css/pretty-checkbox.css" media="screen, projection" type="text/css" />
	<script src="/js/external/jquery.min.js" type="text/javascript"></script>
    <script src="/js/external/prefixfree.min.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(window).load(function() {
			$(".loader").fadeOut("slow");
		});
	</script>
</head>

<body class="login">
	<div class="loader"></div>
	<div class="wrap-title-login">
		<div class="title-login">
			<h1>Sistema Escolar</h1>
		</div>
	</div>
	<div class="form-login">
		<div class="logo-form-login">
		</div>
		<form name="form-login" action="" method="POST" autocapitalize="off" data-nosnippet>
			<?php
			include_once 'modules/login/logger.php';
			?>
		</form>
	</div>
</body>
<script src="/js/controls/buttons.js" type="text/javascript"></script>

</html>