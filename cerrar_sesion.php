<?php
session_start();
include 'conexion.php';
session_destroy();
unset($_SESSION["user"]);

header('Location: index.html');
?>
