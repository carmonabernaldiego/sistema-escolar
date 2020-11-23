<?php
    if ($_SESSION['permissions'] == 'admin')
    {
    }
    else
    {
        header('Location: /');
	    exit();
    }
?>