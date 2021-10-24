<?php
date_default_timezone_set('America/Mexico_City');

$conexion = mysqli_connect("127.0.0.1:3306", "u921810722_root", "1289james7823", "u921810722_db_school");

if (mysqli_connect_errno()) {
	printf("Falló la conexión: %s\n", mysqli_connect_error());
	exit();
}

mysqli_set_charset($conexion, 'utf8');