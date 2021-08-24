<?php
date_default_timezone_set('America/Mexico_City');
mysqli_set_charset($conexion, 'utf8');

$conexion = mysqli_connect("localhost", "root", "", "db_escolar");

/* comprobar la conexión */
if (mysqli_connect_errno()) {
	printf("Falló la conexión: %s\n", mysqli_connect_error());
	exit();
}