<?php
include_once '../modules/security.php';
include_once '../modules/conexion.php';

header('Content-Type: text/html; charset=UTF-8');
header('Last-Modified:' . gmdate('D, d M Y H:i:s') . 'GMT');
header('Cache-Control: no-cache, must-revalidate, max-age=0');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

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
	<meta name="robots" content="noindex">
	<meta name="google" value="notranslate">
	<link rel="icon" type="image/png" href="/images/icon.png" />
	<title>Usuarios | Sistema Escolar</title>
	<meta name="description" content="Sistema Escolar, gestión de asistencias." />
	<link rel="stylesheet" href="/css/style.css" media="screen, projection" type="text/css" />
	<link rel="stylesheet" href="/css/styleconfiguser.css" media="screen, projection" type="text/css" />
	<link rel="stylesheet" href="/css/croppie.css" media="screen, projection" type="text/css" />
	<script src="/js/external/jquery.min.js" type="text/javascript"></script>
	<script src="/js/external/prefixfree.min.js" type="text/javascript"></script>
	<script src="/js/controls/unsetnotif.js" type="text/javascript"></script>
	<script src="/js/external/croppie.js" type="text/javascript"></script>
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
		include_once "../modules/sections/section-info-title.php";
		?>
	</header>
	<aside>
		<?php
		if (!empty($_SESSION['section-admin']) == 'go-' . $_SESSION['user']) {
			include_once '../modules/sections/section-admin.php';
		} elseif (!empty($_SESSION['section-editor']) == 'go-' . $_SESSION['user']) {
			include_once '../modules/sections/section-editor.php';
		}
		?>
	</aside>
	<section class="content">
		<?php
		include_once $view_form;
		?>
	</section>
</body>
<script src="/js/controls/buttons.js" type="text/javascript"></script>
<script src="/js/modules/user.js" type="text/javascript"></script>

</html>