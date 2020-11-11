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
		$output[1] = '';
	}
?>
<div class="nav-admin-home">
	<img class="image_user" src="/images/users/<?php echo $_SESSION['image'];?>" />
	<span class="name_user"><?php print $_SESSION['name'].' '.$_SESSION['surnames'];?></span>
	<ul class="first">
		<li><a class="<?php if($output[1] == 'school_periods'){ echo 'active'; } ?>" href="/modules/school_periods">Periodo Escolar</a></li>
	</ul>
	<ul class="second">
		<li><a class="<?php if($output[1] == 'users'){ echo 'active'; } ?>" href="/modules/users">Usuarios</a></li>
		<li><a class="<?php if($output[1] == 'administratives'){ echo 'active'; } ?>" href="/modules/administratives">Administrativos</a></li>
		<li><a class="<?php if($output[1] == 'teachers'){ echo 'active'; } ?>" href="/modules/teachers">Docentes</a></li>
		<li><a class="<?php if($output[1] == 'students'){ echo 'active'; } ?>" href="/modules/students">Alumnos</a></li>
	</ul>
	<ul class="last">
		<li><a class="<?php if($output[1] == 'subjects'){ echo 'active'; } ?>" href="/modules/subjects">Materias</a></li>
		<li><a class="<?php if($output[1] == 'groups'){ echo 'active'; } ?>" href="/modules/groups">Grupos</a></li>
	</ul>
	<ul class="last">
		<li><a  class="<?php if($output[1] == 'assists'){ echo 'active'; } ?>" href="/modules/assists">Asistencias</a></li>
	</ul>
</div>