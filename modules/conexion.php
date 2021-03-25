<?php
$conexion = mysqli_connect("localhost", "root", "", "db_escolar");

mysqli_set_charset($conexion, 'utf8');

/* comprobar la conexión */
if (mysqli_connect_errno()) {
	printf("Falló la conexión: %s\n", mysqli_connect_error());
	exit();
}