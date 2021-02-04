<?php
	include_once 'security.php';

	require_once($_SESSION['raiz'].'/modules/sections/role-access-admin-editor.php');

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
    <div class="user">
        <img class="image_user" src="/images/users/<?php echo $_SESSION['image'];?>" />
        <span class="name_user">
            <?php print $_SESSION['name'].' '.$_SESSION['surnames'];?>
        </span>
        <span class="logout_user">
            <a class="icon" href="#">expand_more</a>
            <ul>
                <li>
                    <a href="/modules/logout">Cerrar Sesión</a>
                </li>
            </ul>
        </span>
    </div>
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
        <li><a class="<?php if($output[1] == 'attendance'){ echo 'active'; } ?>" href="/modules/attendance"><span
                    class="icon">assignment_turned_in</span>Asistencias</a></li>
    </ul>
</div>
<div class="menu-mobile">
    <header>
        <img class="activator" id="activator" src="https://s.svgbox.net/hero-outline.svg?ic=menu&fill=eef4ff">
        <nav>
            <ul>
                <li>
                    <a href="/home" title="Dashboard"><img
                            src="https://s.svgbox.net/materialui.svg?ic=dashboard&fill=eef4ff" title="Dashboard"></a>
                </li>
                <li>
                    <a href="/modules/school_periods" title="Perido Escolar"><img
                            src="https://s.svgbox.net/materialui.svg?ic=event_note&fill=eef4ff"
                            title="Perido Escolar"></a>
                </li>
                <li>
                    <a href="/modules/users" title="Usuarios"><img
                            src="https://s.svgbox.net/materialui.svg?ic=assignment_ind&fill=eef4ff"
                            title="Usuarios"></a>
                </li>
                <li>
                    <a href="/modules/administratives" title="Administrativos"><img
                            src="https://s.svgbox.net/materialui.svg?ic=supervisor_account&fill=eef4ff"
                            title="Administrativos"></a>
                </li>
                <li>
                    <a href="/modules/teachers" title="Docentes"><img
                            src="https://s.svgbox.net/materialui.svg?ic=person_pin&fill=eef4ff" title="Docentes"></a>
                </li>
                <li>
                    <a href="/modules/students" title="Alumnos"><img
                            src="https://s.svgbox.net/materialui.svg?ic=recent_actors&fill=eef4ff" title="Alumnos"></a>
                </li>
                <li>
                    <a href="/modules/subjects" title="Asignaturas"><img
                            src="https://s.svgbox.net/materialui.svg?ic=style&fill=eef4ff" title="Asignaturas"></a>
                </li>
                <li>
                    <a href="/modules/groups" title="Grupos"><img
                            src="https://s.svgbox.net/materialui.svg?ic=group_work&fill=eef4ff" title="Grupos"></a>
                </li>
                <li>
                    <a href="/modules/attendance" title="Asistencias"><img
                            src="https://s.svgbox.net/materialui.svg?ic=assignment_turned_in&fill=eef4ff"
                            title="Asistencias"></a>
                </li>
            </ul>
        </nav>
    </header>
    <span class="name_system">Control de Asistencias</span>
</div>
<div class="user-mobile">
    <header>
        <img class="activator-user" id="activator-user" src="/images/users/<?php echo $_SESSION['image'];?>">
        <nav>
            <ul>
                <li>
                    <a href="/modules/logout"><img src="https://s.svgbox.net/materialui.svg?ic=logout&fill=eef4ff" title="Cerrar Sesión"></a>
                </li>
            </ul>
        </nav>
    </header>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"
    integrity="sha512-IQLehpLoVS4fNzl7IfH8Iowfm5+RiMGtHykgZJl9AWMgqx0AmJ6cRWcB+GaGVtIsnC4voMfm8f2vwtY+6oPjpQ=="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/CSSRulePlugin.min.js"
    integrity="sha512-6MT8e40N5u36Um5SXKtwZmoKcCSg1XaKtexnXZPpQ4iJDHrBEHXKz37fnDovXezsaCd4oKCH5Y+vrcl7qpLPoA=="
    crossorigin="anonymous"></script>

<script>
var card = document.getElementById('activator');

var tl = gsap.timeline({
    defaults: {
        ease: "power2.inOut"
    }
})

var toggle = false;

tl.to('.activator', {
    background: '#6272a4',
    'borderRadius': '0.6em 0 0 0.6em'
});

tl.to('.menu-mobile nav', {
    'clipPath': 'ellipse(100% 100% at 50% 50%)'
}, "-=.5")

tl.to('.menu-mobile nav img', {
    opacity: 1,
    transform: 'translateX(0)',
    stagger: .05
}, "-=.5")

tl.pause();

card.addEventListener('click', () => {
    toggle = !toggle;
    if (toggle ? tl.play() : tl.reverse());
})

var cardU = document.getElementById('activator-user');

var tlU = gsap.timeline({
    defaults: {
        ease: "power2.inOut"
    }
})

var toggleU = false;

tlU.to('.user-mobile .activator-user', {
    borderRadius: '0 5em 5em 0',
    background: '#6272a4',
    transition: 'all 400ms',
    duration: 0.4
})

tlU.to('.user-mobile nav', {
    clipPath: 'ellipse(100% 100% at 100% 50%)',
    duration: 0.3
})

tlU.to('.user-mobile nav img', {
    opacity: 1,
    transform: 'translateX(0)',
    stagger: .05,
}, "-=.5")

tlU.pause();

cardU.addEventListener('click', () => {
    toggleU = !toggleU;
    if (toggleU ? tlU.play() : tlU.reverse());
})
</script>