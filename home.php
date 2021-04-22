<?php
header('Content-Type: text/html; charset=UTF-8');

include_once 'modules/security.php';
include_once 'modules/conexion.php';


$_SESSION['raiz'] = dirname(__FILE__);

$_SESSION['msgbox_info'] = '';
$_SESSION['text_msgbox_info'] = '';

$_SESSION['msgbox_error'] = '';
$_SESSION['text_msgbox_error'] = '';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1" />
    <title>Sistema Escolar</title>
    <link rel="icon" type="image/png" href="/images/icon.png" />
    <link rel="stylesheet" href="css/style.css" media="screen, projection" type="text/css" />
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
        include_once "modules/sections/about-section.php";
        ?>
    </header>
    <aside class="aside">
        <?php
        if (!empty($_SESSION['section-admin']) == 'go-' . $_SESSION['user']) {
            include_once 'modules/sections/section-admin.php';
        } elseif (!empty($_SESSION['section-editor']) == 'go-' . $_SESSION['user']) {
            include_once 'modules/sections/section-editor.php';
        }
        ?>
    </aside>
</body>

</html>