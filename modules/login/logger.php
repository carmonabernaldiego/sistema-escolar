<?php
if (!empty($_POST['txtuser']) and !empty($_POST['txtpass'])) {
    //Eliminar espacios en blanco
    $_POST['txtuser'] = trim($_POST['txtuser']);
    //Limpiar String
    $user = mysqli_real_escape_string($conexion, $_POST['txtuser']);
    $pass = mysqli_real_escape_string($conexion, $_POST['txtpass']);

    //Buscar Usuario
    $sql = "SELECT user, permissions, image FROM users WHERE BINARY user = '$user' and BINARY pass = '$pass' or BINARY email = '$user' and BINARY pass = '$pass' LIMIT 1";

    if ($result = $conexion->query($sql)) {
        if ($row = mysqli_fetch_array($result)) {
            //Cargar Usuario
            if ($row['permissions'] == 'admin') {
                $user = $row['user'];
                $permissions = $row['permissions'];
                $image = $row['image'];

                $sql = "SELECT name, surnames FROM administratives WHERE user = '$user' LIMIT 1";

                if ($result = $conexion->query($sql)) {
                    if ($row = mysqli_fetch_array($result)) {
                        $name = $row['name'];
                        $surnames = $row['surnames'];

                        $sql = "SELECT school_period FROM school_periods WHERE active = 1 AND current = 1 LIMIT 1";

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
                $permissions = $row['permissions'];
                $image = $row['image'];

                $sql = "SELECT name, surnames FROM administratives WHERE user = '$user' LIMIT 1";

                if ($result = $conexion->query($sql)) {
                    if ($row = mysqli_fetch_array($result)) {
                        $name = $row['name'];
                        $surnames = $row['surnames'];

                        $sql = "SELECT school_period FROM school_periods WHERE active = 1 AND current = 1 LIMIT 1";

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

            //Cargar datos sesión usuario COOKIE
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
                    <label class="label error">usuario y/o contraseña incorrectos</label>
					<input type="text" class="text" name="txtuser" placeholder="Correo electrónico o matrícula" autofocus required />
					<input type="password" class="textcontrasena" name="txtpass" placeholder="Contraseña" autocomplete="off" required />
					<div class="forgot-pass">
                        <a class="un" href="#">¿Olvidaste la contraseña?</a>
                    </div>
                    <div class="pretty p-svg p-curve p-smooth">
                        <input type="checkbox" name="remember_session" placeholder="Recordar" value="1" />
                        <div class="state p-primary">
                            <svg class="svg svg-icon" viewBox="0 0 20 20">
                                <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                            </svg>
                            <label class="remember">Recuérdame</label>
                        </div>
                    </div>
					<button class="button" type="submit">Entrar</button>
                ';
        }
    }
} else {
    echo '
			<label class="label">Inicia sesión</label>
			<input type="text" class="text" name="txtuser" placeholder="Correo electrónico o matrícula" autofocus required />
			<input type="password" class="textcontrasena" name="txtpass" placeholder="Contraseña" autocomplete="off" required />
            <div class="forgot-pass">
                <a class="un" href="#">¿Olvidaste la contraseña?</a>
            </div>           
            <div class="pretty p-svg p-curve p-smooth">
                <input type="checkbox" name="remember_session" placeholder="Recordar" value="1" />
                <div class="state p-primary">
                    <svg class="svg svg-icon" viewBox="0 0 20 20">
                        <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                    </svg>
                    <label class="remember">Recuérdame</label>
                </div>
            </div>
			<button class="button" type="submit">Entrar</button>
		';
}