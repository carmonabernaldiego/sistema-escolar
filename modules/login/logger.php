<?php
if (!empty($_POST['txtuser']) and !empty($_POST['txtpass'])) {
    //Limpiar String
    $user = mysqli_real_escape_string($conexion, $_POST['txtuser']);
    $pass = mysqli_real_escape_string($conexion, $_POST['txtpass']);

    //Buscar Usuario
    $sql = "SELECT * FROM users WHERE BINARY user = '$user' and BINARY pass = '$pass' or BINARY email = '$user' and BINARY pass = '$pass' LIMIT 1";

    if ($result = $conexion->query($sql)) {
        if (/*$row = $result -> fetch_row()*/$row = mysqli_fetch_array($result)) {
            //Cargar Usuario
            if ($row['permissions'] == 'admin') {
                $user = $row['user'];
                $image = $row['image'];
                $permissions = $row['permissions'];

                $sql = "SELECT * FROM administratives WHERE user = '$user' LIMIT 1";

                if ($result = $conexion->query($sql)) {
                    if ($row = mysqli_fetch_array($result)) {
                        $name = $row['name'];
                        $surnames = $row['surnames'];

                        $sql = "SELECT * FROM school_periods WHERE active = 1 AND current = 1 LIMIT 1";

                        if ($result = $conexion->query($sql)) {
                            if ($row = mysqli_fetch_array($result)) {
                                $school_period = $row['school_period'];
                            }
                        }
                    } else {
                        goto error_user;
                    }

                    if (!empty($_POST['remember_session'])) {
                        $_SESSION['section-admin'] = setcookie('section-admin', 'section-admin-' . $user, time() + 365 * 24 * 60 * 60);
                    } else {
                        $_SESSION['section-admin'] = 'section-admin-' . $user;
                    }
                }
            } elseif ($row['permissions'] == 'editor') {
                $user = $row['user'];
                $image = $row['image'];
                $permissions = $row['permissions'];

                $sql = "SELECT * FROM administratives WHERE user = '$user' LIMIT 1";

                if ($result = $conexion->query($sql)) {
                    if ($row = mysqli_fetch_array($result)) {
                        $name = $row['name'];
                        $surnames = $row['surnames'];

                        $sql = "SELECT * FROM school_periods WHERE active = 1 AND current = 1 LIMIT 1";

                        if ($result = $conexion->query($sql)) {
                            if ($row = mysqli_fetch_array($result)) {
                                $school_period = $row['school_period'];
                            }
                        }
                    } else {
                        goto error_user;
                    }

                    if (!empty($_POST['remember_session'])) {
                        $_SESSION['section-editor'] = setcookie('section-editor', 'section-editor-' . $user, time() + 365 * 24 * 60 * 60);
                    } else {
                        $_SESSION['section-editor'] = 'section-editor-' . $user;
                    }
                }
            }

            //Cargar datos sesión usuario
            if (!empty($_POST['remember_session'])) {
                setcookie('remember', 'si', time() + 15 * 24 * 60 * 60);
                setcookie('user', $user, time() + 15 * 24 * 60 * 60);
                setcookie('name', $name, time() + 15 * 24 * 60 * 60);
                setcookie('surnames', $surnames, time() + 15 * 24 * 60 * 60);
                setcookie('image', $image, time() + 15 * 24 * 60 * 60);
                setcookie('permissions', $permissions, time() + 15 * 24 * 60 * 60);
                setcookie('school_period', $school_period, time() + 15 * 24 * 60 * 60);
                setcookie('authenticate', 'go-' . $user, time() + 15 * 24 * 60 * 60);

                header('Location: home');
            } else {
                $_SESSION['user'] = $user;
                $_SESSION['name'] = $name;
                $_SESSION['surnames'] = $surnames;
                $_SESSION['image'] = $image;
                $_SESSION['permissions'] = $permissions;
                $_SESSION['school_period'] = $school_period;
                $_SESSION['authenticate'] = 'go-' . $user;

                header('Location: /home');
            }
        } else {
            error_user:
            echo '
                    <label class="label" style="margin: 9px 0 0 0; color: #c93f3f; font-size: 1.2em; font-weight: bold;">usuario/contraseña - ¡incorrecto!</label>
					<input type="text" class="text" name="txtuser" placeholder="Correo electrónico o matrícula" autofocus required />
					<input type="password" class="textcontrasena" name="txtpass" placeholder="Contraseña" autocomplete="off" required />
					<label class="labelrecordar">
						<input type="checkbox" name="remember_session" value="1" /><span class="label-text">Recuérdame</span>
					</label>
					<button class="button" type="submit">Entrar</button>
                ';
        }
    }
} else {
    echo '
			<label class="label">Inicia sesión</label>
			<input type="text" class="text" name="txtuser" placeholder="Correo electrónico o matrícula" autofocus required />
			<input type="password" class="textcontrasena" name="txtpass" placeholder="Contraseña" autocomplete="off" required />
			<label class="labelrecordar">
				<input type="checkbox" name="remember_session" value="1" /><span class="label-text">Recuérdame</span>
			</label>
			<button class="button" type="submit">Entrar</button>
		';
}