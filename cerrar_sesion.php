<?php
include 'conexion.php';
session_destroy();
unset($GLOBALS['user']);

header('Location: index.html');
?>
