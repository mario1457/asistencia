<?php
include 'conexion.php';

$usuario =filter_input (INPUT_POST,"usuario");
$clave =filter_input (INPUT_POST, "pass");



echo $usuario;
echo '<br>';
echo $clave;
echo '<br>';


$query= "SELECT  u_nombre, u_clave FROM usuarios WHERE u_nombre='$usuario' "
        . "AND u_clave='$clave' " ;

    $queEmp = mysql_query($query) or die(mysql_error());
    
    while ($resEmp = mysql_fetch_assoc($queEmp)) {
        
             $_user=$resEmp['u_nombre'];
        
        
    }

   
    if ( FALSE.empty($_user) ){
        header('Location: menu.php');
    }
    else {
         header('Location: index.html');
    }


?>