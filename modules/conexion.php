<?php
date_default_timezone_set('America/Mexico_City');

$conexion = mysqli_connect("localhost", "root", "", "db_school");

if (mysqli_connect_errno()) {
	printf("Falló la conexión: %s\n", mysqli_connect_error());
	exit();
}

mysqli_set_charset($conexion, 'utf8');