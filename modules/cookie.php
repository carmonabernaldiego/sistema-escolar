<?php
if (!empty($_COOKIE['remember']) & !empty($_COOKIE['authenticate'])) {
	$remember = $_COOKIE['remember'];
} else {
	$remember = '';
}

if ($remember == 'si') {
	$_SESSION['user'] = $_COOKIE['user'];
	$_SESSION['name'] = $_COOKIE['name'];
	$_SESSION['surnames'] = $_COOKIE['surnames'];
	$_SESSION['image'] = $_COOKIE['image'];
	$_SESSION['permissions'] = $_COOKIE['permissions'];
	$_SESSION['school_period'] = $_COOKIE['school_period'];
	$_SESSION['authenticate'] = $_COOKIE['authenticate'];

	if (!empty($_COOKIE['section-admin'])) {
		$_SESSION['section-admin'] = $_COOKIE['section-admin'];
	}
}