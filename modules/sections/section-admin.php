<?php
	include_once 'security.php';

	if ($_SESSION['permissions'] != 'admin')
	{
		header('Location: /');
		exit();
	}

	$url_actual = $_SERVER["REQUEST_URI"];

	if(strpos($url_actual, 'modules'))
	{
		$input = $url_actual;
		preg_match('~modules/(.*?)/~', $input, $output);
		$output[1];
	}
	else
	{
		$output[1] = 'home';
	}
?>
<div class="nav-home">
    <span class="name_system">Control de Asistencias</span>
    <img class="image_user" src="/images/users/<?php echo $_SESSION['image'];?>" />
    <span class="name_user">
        <?php print $_SESSION['name'].' '.$_SESSION['surnames'];?>
        <ul>
            <li>
                <a class="icon" href="#">expand_more</a>
                <ul>
                    <li>
                        <a href="/modules/logout">Cerrar Sesión</a>
                    </li>
                </ul>
            </li>
        </ul>
    </span>
    <ul>
        <li><a class="<?php if($output[1] == 'home'){ echo 'active'; } ?>" href="/home"><span
                    class="icon">dashboard</span>Dashboard</a></li>
        <li><a class="<?php if($output[1] == 'school_periods'){ echo 'active'; } ?>"
                href="/modules/school_periods"><span class="icon">event_note</span>Periodo Escolar</a></li>
        <li><a class="<?php if($output[1] == 'users'){ echo 'active'; } ?>" href="/modules/users"><span
                    class="icon">assignment_ind</span>Usuarios</a></li>
        <li><a class="<?php if($output[1] == 'administratives'){ echo 'active'; } ?>"
                href="/modules/administratives"><span class="icon">supervisor_account</span>Administrativos</a></li>
        <li><a class="<?php if($output[1] == 'teachers'){ echo 'active'; } ?>" href="/modules/teachers"><span
                    class="icon">person_pin</span>Docentes</a></li>
        <li><a class="<?php if($output[1] == 'students'){ echo 'active'; } ?>" href="/modules/students"><span
                    class="icon">recent_actors</span>Alumnos</a></li>
        <li><a class="<?php if($output[1] == 'subjects'){ echo 'active'; } ?>" href="/modules/subjects"><span
                    class="icon">style</span>Asignaturas</a></li>
        <li><a class="<?php if($output[1] == 'groups'){ echo 'active'; } ?>" href="/modules/groups"><span
                    class="icon">group_work</span>Grupos</a></li>
        <li><a class="<?php if($output[1] == 'assists'){ echo 'active'; } ?>" href="/modules/assists"><span
                    class="icon">assignment_turned_in</span>Asistencias</a></li>
    </ul>
</div>