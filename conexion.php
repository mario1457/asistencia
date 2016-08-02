<?php
//conexion con la base de datos asistencias.

$host="localhost";
$user="root";
$db="asistencias";

$link = mysql_connect($host, $user ); 
mysql_select_db($db, $link); 

?> 
