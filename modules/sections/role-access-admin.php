<?php
if ($_SESSION['permissions'] != 'admin') {
    header('Location: /');
    exit();
}