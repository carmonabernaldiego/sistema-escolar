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
        <li><a class="<?php if($output[1] == 'teachers'){ echo 'active'; } ?>" href="/modules/teachers"><span
                    class="icon">person_pin</span>Docentes</a></li>
        <li><a class="<?php if($output[1] == 'students'){ echo 'active'; } ?>" href="/modules/students"><span
                    class="icon">recent_actors</span>Alumnos</a></li>
        <li><a class="<?php if($output[1] == 'subjects'){ echo 'active'; } ?>" href="/modules/subjects"><span
                    class="icon">style</span>Asignaturas</a></li>
        <li><a class="<?php if($output[1] == 'groups'){ echo 'active'; } ?>" href="/modules/groups"><span
                    class="icon">group_work</span>Grupos</a></li>
    </ul>
</div>
<div class="menu-mobile">
    <header>
        <img class="activator" id="activator" src="/images/menu_mobile/hero-outline.svg">
        <nav>
            <ul>
                <li>
                    <a href="/home" title="Dashboard"><img src="/images/menu_mobile/dashboard.svg"
                            title="Dashboard"></a>
                </li>
                <li>
                    <a href="/modules/teachers" title="Docentes"><img src="/images/menu_mobile/person_pin.svg"
                            title="Docentes"></a>
                </li>
                <li>
                    <a href="/modules/students" title="Alumnos"><img src="/images/menu_mobile/recent_actors.svg"
                            title="Alumnos"></a>
                </li>
                <li>
                    <a href="/modules/subjects" title="Asignaturas"><img src="/images/menu_mobile/style.svg"
                            title="Asignaturas"></a>
                </li>
                <li>
                    <a href="/modules/groups" title="Grupos"><img src="/images/menu_mobile/group_work.svg"
                            title="Grupos"></a>
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
                    <a href="/modules/logout"><img src="/images/menu_mobile/logout.svg" title="Cerrar Sesión"></a>
                </li>
            </ul>
        </nav>
    </header>
</div>

<script src="/js/gsap.min.js"
    integrity="sha512-IQLehpLoVS4fNzl7IfH8Iowfm5+RiMGtHykgZJl9AWMgqx0AmJ6cRWcB+GaGVtIsnC4voMfm8f2vwtY+6oPjpQ=="
    crossorigin="anonymous"></script>
<script src="/js/CSSRulePlugin.min.js"
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