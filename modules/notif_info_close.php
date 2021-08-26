<?php
session_start();

if (!empty($_POST['close_msgbox_info'])) {
	if ($_POST['close_msgbox_info'] == 1) {
		$_SESSION['msgbox_info'] = '';
		$_SESSION['text_msgbox_info'] = '';
	}
}

if (!empty($_POST['close_msgbox_error'])) {
	if ($_POST['close_msgbox_error'] == 1) {
		$_SESSION['msgbox_error'] = '';
		$_SESSION['text_msgbox_error'] = '';
	}
}