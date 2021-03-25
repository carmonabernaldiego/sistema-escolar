<?php
if ($_SESSION['authenticate'] != 'go-' . $_SESSION['user']) {
	header('Location: /');
	exit();
}