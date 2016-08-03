<?php
include 'conexion.php';
include 'funciones.php';
include 'excelwriter.inc.php';
session_start();

if ( FALSE.empty($_SESSION["user"]) ){
    
    header('Location: index.html');
}
else {

    //creamos las variables de consulta

    $t_informe=$_POST['t_informe'];
    
    
    // verifica si vienen cargadas las variables de DATOS, DESDE Y HASTA.
    
    if (isset($_POST['dato']))
            {
    $dato = $_POST['dato'];
    }
    if (isset($_POST['desde']))
            {
    $desde = $_POST['desde'].' 00:00:00';
            }
            if (isset($_POST['hasta']))
            {
    $hasta = $_POST['hasta'].' 23:59:59';
            }
      
            
            
?>

<head>
  <title>INFORME</title>
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  <link rel="stylesheet" type="text/css" href="style/style.css" />
</head>



  <div id="main">
    <div id="header">
      <div id="logo">
        <h1><span class="alternate_colour">ASISTENCIA</span></h1>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- MENU -->
          
          <li class="tab_selected">  
              
              
              <a href="informe.php">INFORME</a></li>
              <li><a href="menu.php">INICIO</a></li>
              <li><a href="cerrar_sesion.php">SALIR</a></li>
          
        </ul>
      </div>
    </div>
    <div id="site_content">
     
      
      <div id="content">
        <!-- llamadas a las funciones-->
       
 <?php
      

    

    
    //consultamos depende del valor de la variable llamamos a 1 
    
      if ($t_informe==="fcia" ){
          
          buscarXfcia($dato, $desde, $hasta);
            }
     else 
        if ($t_informe==="DNI" ){
          
          buscarXdni($dato, $desde, $hasta);
        }
        else 
        if ($t_informe==="legajo" ){
          
          buscarXlegajo($dato, $desde, $hasta);
        }
        else 
        if ($t_informe==="ver_fcias" ){
          
          fciasFaltantes();
        }
        else 
        if ($t_informe==="empelados" ){
          
          ExpleadosXfcia($dato);
        }else
            {
           header('Location: menu.php');
        }
        
        
        

      ?>
     
      </div>
    </div>
   
  </div>

<?php 

}
?>