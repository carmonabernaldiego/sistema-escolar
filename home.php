<?php
    header('Content-Type: text/html; charset=UTF-8');
    
	include_once 'modules/security.php';
	include_once 'modules/conexion.php';
	include_once 'modules/functions.php';

	$_SESSION['msgbox_info'] = '';
	$_SESSION['text_msgbox_info'] = '';

	$_SESSION['msgbox_error'] = '';
	$_SESSION['text_msgbox_error'] = '';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1" />
    <title>Sistema Escolar</title>
    <link rel="icon" type="image/png" href="images/asistencia_icon.png" />
    <link rel="stylesheet" href="css/style.css" media="screen, projection" type="text/css" />
    <link rel="stylesheet" href="css/style_icons.css" media="screen, projection" type="text/css" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
</head>

<body>
    <header class="header">
        <?php
				include_once "modules/sections/about-section.php";
			?>
    </header>
    <aside class="aside">
        <?php
				if (!empty($_SESSION['section-admin']) == 'go-'.$_SESSION['user'])
				{
					include_once 'modules/sections/section-admin.php';
				}
			?>
    </aside>
</body>

</html>