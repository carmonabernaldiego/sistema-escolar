<?php
	$conexion = mysqli_connect("127.0.0.1:3306", "u921810722_root", "1289james7823", "u921810722_db_school");

	/* comprobar la conexión */
	if (mysqli_connect_errno())
	{
		printf("Falló la conexión: %s\n", mysqli_connect_error());
		exit();
	}
?>