<?php
	session_start();

	include_once 'modules/conexion.php';
	include_once 'modules/cookie.php';
	include_once 'modules/functions.php';

	if (!empty($_SESSION['authenticate']) == 'go-'.!empty($_SESSION['usuario']))
	{
		header('Location: home');
		exit();
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1" />
	<title>Sistema Escolar</title>
	<link rel="icon" type="image/png" href="images/favicon.ico" />
	<link rel="stylesheet" href="css/style.css" media="screen, projection" type="text/css" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
</head>
<body class="login">
	<div class="wrap-title-login">
		<div class="title-login">
			<h1>Sistema Escolar</h1>
		</div>
	</div>
	<div class="wrap-form-login">
		<div class="logo-form-login">
		</div>
		<form name="frm-login" action="#" method="POST">
			<?php
				if (!empty($_POST['txtuser']) and !empty($_POST['txtpass']))
				{
					//Limpiar String
					$user = mysqli_real_escape_string($conexion, $_POST['txtuser']);
					$pass = mysqli_real_escape_string($conexion, $_POST['txtpass']);

					//Buscar Usuario
					$sql = "SELECT * FROM users WHERE user = '$user' and pass = '$pass' LIMIT 1";

					if ($result = $conexion -> query($sql))
					{
						if (/*$row = $result -> fetch_row()*/$row = mysqli_fetch_array($result))
						{
							//Cargar Usuario
							if ($row['permissions'] == 'admin')
							{
								$user = $row['user'];
								$image = $row['image'];
								$permissions = $row['permissions'];

								$sql = "SELECT * FROM administratives WHERE user = '$user' LIMIT 1";
								
								if ($result = $conexion -> query($sql))
								{
									if($row = mysqli_fetch_array($result))
									{
										$name = $row['name'];
										$surnames = $row['surnames'];
										
										$sql = "SELECT * FROM school_periods WHERE active = 1 AND current = 1 LIMIT 1";

										if ($result = $conexion -> query($sql))
										{
											if($row = mysqli_fetch_array($result))
											{
												$school_period = $row['school_period'];
											}
										}
									}

									if (!empty($_POST['remember_session']))
									{
										$_SESSION['section-admin'] = setcookie('section-admin', 'section-admin-'.$user, time() + 365 * 24 * 60 * 60);
									}
									else
									{
										$_SESSION['section-admin'] = 'section-admin-'.$user;
									}
								}
							}

							//Cargar datos sesión usuario
							if (!empty($_POST['remember_session']))
							{
								setcookie('remember', 'si', time() + 15 * 24 * 60 * 60);
								setcookie('user', $user, time() + 15 * 24 * 60 * 60);
								setcookie('name', $name, time() + 15 * 24 * 60 * 60);
								setcookie('surnames', $surnames, time() + 15 * 24 * 60 * 60);
								setcookie('image', $image, time() + 15 * 24 * 60 * 60);
								setcookie('permissions', $permissions, time() + 15 * 24 * 60 * 60);
								setcookie('school_period', $school_period, time() + 15 * 24 * 60 * 60);
								setcookie('authenticate', 'go-'.$user, time() + 15 * 24 * 60 * 60);

								header('Location: home');
							}
							else
							{
								$_SESSION['user'] = $user;
								$_SESSION['name'] = $name;
								$_SESSION['surnames'] = $surnames;
								$_SESSION['image'] = $image;
								$_SESSION['permissions'] = $permissions;
								$_SESSION['school_period'] = $school_period;
								$_SESSION['authenticate'] = 'go-'.$user;

								header('Location: home');
							}
						}
						else
						{
							echo '
									<label class="label" style="margin: 9px 0 0 0; color: #c93f3f; font-size: 1.2em; font-weight: bold;">usuario/contraseña - ¡incorrecto!</label>
									<input type="text" class="text" name="txtuser" placeholder="Correo electrónico o matrícula" autofocus required />
									<input type="password" class="textcontrasena" name="txtpass" placeholder="Contraseña" autocomplete="off" required />
									<input id="checkboxrecordar" type="checkbox" name="remember_session" value="1">
									<label class="labelrecordar" for="checkboxrecordar">Mantener sesión iniciada</label>
									<button class="button" type="submit">Iniciar sesión</button>
								';
						}
					}
				}
				else
				{
					echo '
						<label class="label">Iniciar sesión</label>
						<input type="text" class="text" name="txtuser" placeholder="Correo electrónico o matrícula" autofocus required />
						<input type="password" class="textcontrasena" name="txtpass" placeholder="Contraseña" autocomplete="off" required />
						<input id="checkboxrecordar" type="checkbox" name="remember_session" value="1">
						<label class="labelrecordar" for="checkboxrecordar">Mantener sesión iniciada</label>
						<button class="button" type="submit">Iniciar sesión</button>
					';
				}
			?>
		</form>
	</div>
</body>
</html>