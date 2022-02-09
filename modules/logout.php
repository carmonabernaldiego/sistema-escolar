<?php
session_start();
session_destroy();

setcookie('user', '', time() - 42000, '/');
setcookie('name', '', time() - 42000, '/');
setcookie('surnames', '', time() - 42000, '/');
setcookie('image', '', time() - 42000, '/');
setcookie('permissions', '', time() - 42000, '/');
setcookie('school_period', '', time() - 42000, '/');
setcookie('authenticate', '', time() - 42000, '/');
setcookie('section-admin', '', time() - 42000, '/');
setcookie('remember', '', time() - 42000, '/');

header('Location: /');
exit();