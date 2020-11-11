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
		$output[1] = 'homes';
	}
?>
<div class="nav-admin-home">
	<span class="name_system">Control de Asistencias</span>
	<img class="image_user" src="/images/users/<?php echo $_SESSION['image'];?>" />
	<span class="name_user"><?php print $_SESSION['name'].' '.$_SESSION['surnames'];?></span>
	<ul>
		<li><a class="<?php if($output[1] == 'home'){ echo 'active'; } ?>" href="/home"><span class="icon">dashboard</span>Dashboard</a></li>
		<li><a class="<?php if($output[1] == 'school_periods'){ echo 'active'; } ?>" href="/modules/school_periods"><span class="icon">a</span>Periodo Escolar</a></li>
		<li><a class="<?php if($output[1] == 'users'){ echo 'active'; } ?>" href="/modules/users"><span class="icon">a</span>Usuarios</a></li>
		<li><a class="<?php if($output[1] == 'administratives'){ echo 'active'; } ?>" href="/modules/administratives"><span class="icon">a</span>Administrativos</a></li>
		<li><a class="<?php if($output[1] == 'teachers'){ echo 'active'; } ?>" href="/modules/teachers"><span class="icon">a</span>Docentes</a></li>
		<li><a class="<?php if($output[1] == 'students'){ echo 'active'; } ?>" href="/modules/students"><span class="icon">a</span>Alumnos</a></li>
		<li><a class="<?php if($output[1] == 'subjects'){ echo 'active'; } ?>" href="/modules/subjects"><span class="icon">a</span>Materias</a></li>
		<li><a class="<?php if($output[1] == 'groups'){ echo 'active'; } ?>" href="/modules/groups"><span class="icon">a</span>Grupos</a></li>
		<li><a  class="<?php if($output[1] == 'assists'){ echo 'active'; } ?>" href="/modules/assists"><span class="icon">a</span>Asistencias</a></li>
	</ul>
</div>