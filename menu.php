<?php
include 'conexion.php';
include 'funciones.php';
include 'excelwriter.inc.php';
?>
<head>
  <title>ASITENCIA</title>
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
              
              <a href="menu.php">INICIO</a></li>
          <li> <a href="informe.php">INFORME</a></li>
              <li><a href="cerrar_sesion.php">SALIR</a></li>
          
        </ul>
      </div>
    </div>
    <div id="site_content">
     
      
      <div id="content">
        <!-- llamadas a las funciones-->
       
 
</td>
<form method="post" action="informe.php">
    
     
    
    <table id="table">
        
        <tr>
            <td>
            Ingrese numero de             
                <select name="t_informe">
                <option value="legajo">legajo</option>
                <option value="fcia">fcia</option>
                <option value="DNI">DNI</option>
                </select> 
            :
            </td>
            <td>
            <input type="text" name="dato"><br>
            </td>
        </tr>
        <tr>
            <td>
            Fecha Inicio (AAAA-MM-DD)
            </td>
            <td>
            <input type="text" name="desde"><br>
            </td>
        </tr>
        <tr>
            <td>
            Ficha Fin (AAAA-MM-DD)
            </td>
            <td>
            <input type="text" name="hasta"><br>
            </td>
        </tr>
        <tr>
            
            <td>
                <input type="submit" name="submit" value="Consultar"><br>
            </td>
        </tr>
    </table>
 
 </form>   

<!-- Formulario para ver las fcias pendientes.-->

<form method="post" action="informe.php" >
    
     <table id="table">
        
        <tr>
            <td>
                Ver informes de fcias: 
            </td>
            <td>
            <input type="submit" name="submit" value="Consultar"><br>
            </td>
             <input type="hidden" name="t_informe" value="ver_fcias">
        </tr>
     </table>
</form>
    

<!-- Formulario para ver los empleados cargados por fcia -->

<form method="post" action="informe.php" >
    <h2>Consultar empleados cargados por farmacia</h2>
     <table id="table">
        
        <tr>
            <td>
                Numero de Fcia: 
            </td>
            <td>
               <input type="text" name="dato"><br>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
            <input type="submit" name="submit" value="Consultar"><br>
            </td>
             <input type="hidden" name="t_informe" value="empelados">
        </tr>
     </table>
</form>

     
      </div>
    </div>
   
  </div>
