<?php
include 'conexion.php';
?>
<STYLE>
#div1 {
     overflow:scroll;
     height:auto;
     width:auto;
}
#div1 table {
    width:auto;
  
}
</style>

<?php




//toma el numero de legajo , fecha inicio y fin, para obtener los datos de la tabla

function buscarXlegajo( $legajo , $desde, $hasta)
{
    
    $nombreExcel='informe_legajo_Nro_'."$legajo".'fecha'."$desde"."$hasta".'.xls';
	
	$excel=new ExcelWriter("$nombreExcel");	
	
	if($excel==false) { 
	   echo $excel->error;
	}
        
        
        
               // . "AND (m_marcacion BETWEEN '$desde' AND '$hasta')"
        
        
    
    $query= "SELECT  m_legajo, m_apnom, m_dni, m_marcacion, m_tipo, m_fcia "
            . "FROM marcaciones "
            . "WHERE (m_legajo= '$legajo')"
            . "AND (m_marcacion >= '$desde' and m_marcacion <= '$hasta' )"
            . "ORDER BY m_marcacion asc " ;
    $queEmp = mysql_query($query) or die(mysql_error());
    
    
    $myArr=array("NRO LEGAJO","APE Y NOM","DNI","FECHA","TIPO","FCIA");
	$excel->writeLine($myArr);
    ?>
    <table id="div1">
    <?php
        echo "<TR>";
        echo "<TD>";
        echo " Nro de legajo ";
        echo "</TD>";
        echo "<TD>";
        echo " Apellido y Nombre ";
        echo "</TD>";
        echo "<TD>";
        echo " Nro de DNI ";
        echo "</TD>";
        echo "<TD>";
        echo " Fecha de marcacion ";
        echo "</TD>";
        echo "<TD>";
        echo " Tipo de marcacion ";
        echo "</TD>";
        echo "<TD>";
        echo " Nro de farmacia ";
        echo "</TD>";
    echo "</TR>";
    
    
    while ($resEmp = mysql_fetch_assoc($queEmp)) {
        echo "<TR>";
        echo "<TD>";
        echo $resEmp['m_legajo'];
        echo "</TD>";
        echo "<TD>";
        echo $resEmp['m_apnom'];
        echo "</TD>";
        echo "<TD>";
        echo $resEmp['m_dni'];
        echo "</TD>";
        echo "<TD>";
        echo $resEmp['m_marcacion'];
        echo "</TD>";
        echo "<TD>";
        echo $resEmp['m_tipo'];
        echo "</TD>";
        echo "<TD>";
        echo $resEmp['m_fcia'];
        echo "</TD>";
    echo "</TR>";
    $myArr=array($resEmp['m_legajo'],$resEmp['m_apnom'],$resEmp['m_dni'],$resEmp['m_marcacion'],
        $resEmp['m_tipo'],$resEmp['m_fcia']);
			$excel->writeLine($myArr);
    
}

$excel->close();
    
   ?>
    </TABLE> 
    <?php
    
}







//toma el numero de dni , fecha inicio y fin, para obtener los datos de la tabla


function buscarXdni( $dni , $desde, $hasta)
{
    $nombreExcel='informe_dni_Nro_'."$dni".'fecha'."$desde"."$hasta".'.xls';
	
	$excel=new ExcelWriter("$nombreExcel");	
	
	if($excel==false) { 
	   echo $excel->error;
	}
    
    $query= "SELECT  m_legajo, m_apnom, m_dni, m_marcacion, m_tipo, m_fcia "
            . "FROM marcaciones "
            . "WHERE (m_dni= '$dni')"
            . "AND (m_marcacion >= '$desde' and m_marcacion <= '$hasta' )"
            . "ORDER BY m_marcacion ASC" ;
    $queEmp = mysql_query($query) or die(mysql_error());
    
    
    $myArr=array("NRO LEGAJO","APE Y NOM","DNI","FECHA","TIPO","FCIA");
	$excel->writeLine($myArr);
    
    echo "<TABLE>";
    echo "<TR>";
        echo "<TD>";
        echo " Nro de legajo ";
        echo "</TD>";
        echo "<TD>";
        echo " Apellido y Nombre ";
        echo "</TD>";
        echo "<TD>";
        echo " Nro de DNI ";
        echo "</TD>";
        echo "<TD>";
        echo " Fecha de marcacion ";
        echo "</TD>";
        echo "<TD>";
        echo " Tipo de marcacion ";
        echo "</TD>";
        echo "<TD>";
        echo " Nro de farmacia ";
        echo "</TD>";
    echo "</TR>";
    
    
    while ($resEmp = mysql_fetch_assoc($queEmp)) {
  
    echo "<TR>";
        echo "<TD>";
        echo $resEmp['m_legajo'];
        echo "</TD>";
        echo "<TD>";
        echo $resEmp['m_apnom'];
        echo "</TD>";
        echo "<TD>";
        echo $resEmp['m_dni'];
        echo "</TD>";
        echo "<TD>";
        echo $resEmp['m_marcacion'];
        echo "</TD>";
        echo "<TD>";
        echo $resEmp['m_tipo'];
        echo "</TD>";
        echo "<TD>";
        echo $resEmp['m_fcia'];
        echo "</TD>";
    echo "</TR>";
    $myArr=array($resEmp['m_legajo'],$resEmp['m_apnom'],$resEmp['m_dni'],$resEmp['m_marcacion'],
        $resEmp['m_tipo'],$resEmp['m_fcia']);
			$excel->writeLine($myArr);
    
 }
$excel->close();
    
   echo "</TABLE>"; 
    
}


//toma el numero de fcia , fecha inicio y fin, para obtener los datos de la tabla

function buscarXfcia( $fcia , $desde, $hasta)
{
        
    //$nombreExcel='informe_fcia_Nro_'."$fcia".'fecha'."$desde"."$hasta".'.xls';
	
	//$excel=new ExcelWriter("$nombreExcel");	
	
	//if($excel==false) { 
	  // echo $excel->error;
	//}
    
    $query= "SELECT  m_legajo, m_apnom, m_dni, m_marcacion, m_tipo, m_fcia "
            . "FROM marcaciones "
            . "WHERE m_fcia = '$fcia'"
            . "AND (m_marcacion BETWEEN '$desde' AND '$hasta')"
            . "ORDER BY m_apnom ,m_marcacion    ASC" ;
    $queEmp = mysql_query($query) or die(mysql_error());
    
    
    //$myArr=array("NRO LEGAJO","APE Y NOM","DNI","FECHA","TIPO","FCIA");
	//$excel->writeLine($myArr);
    
    echo "<TABLE>";
    echo "<TR>";
        echo "<TD>";
        echo " Nro de legajo ";
        echo "</TD>";
        echo "<TD>";
        echo " Apellido y Nombre ";
        echo "</TD>";
        echo "<TD>";
        echo " Nro de DNI ";
        echo "</TD>";
        echo "<TD>";
        echo " Fecha de marcacion ";
        echo "</TD>";
        echo "<TD>";
        echo " Tipo de marcacion ";
        echo "</TD>";
        echo "<TD>";
        echo " Nro de farmacia ";
        echo "</TD>";
    echo "</TR>";
    
    
    while ($resEmp = mysql_fetch_assoc($queEmp)) {
        
    echo "<TR>";
        echo "<TD>";
        echo $resEmp['m_legajo'];
        echo "</TD>";
        echo "<TD>";
        echo $resEmp['m_apnom'];
        echo "</TD>";
        echo "<TD>";
        echo $resEmp['m_dni'];
        echo "</TD>";
        echo "<TD>";
        echo $resEmp['m_marcacion'];
        echo "</TD>";
        echo "<TD>";
        echo $resEmp['m_tipo'];
        echo "</TD>";
        echo "<TD>";
        echo $resEmp['m_fcia'];
        echo "</TD>";
    echo "</TR>";
    //$myArr=array($resEmp['m_legajo'],$resEmp['m_apnom'],$resEmp['m_dni'],$resEmp['m_marcacion'],
      //  $resEmp['m_tipo'],$resEmp['m_fcia']);
	//		$excel->writeLine($myArr);
    
}
//$excel->close();
    
   echo "</TABLE>"; 
    
}


//toma el numero de fcia , fecha inicio y fin, para obtener los datos de la tabla


function fciasFaltantes()
{
    $cant=0;
    //Genera el excel 
   // $nombreExcel='informe_faltante.xls';
	//$excel=new ExcelWriter("$nombreExcel");	
	//if($excel==false) { 
	  //echo $excel->error;
	//}
    
        //Consulta a la base de datos trae el maximo 
        
    $query= "SELECT `m_fcia`,date_format(max(`m_marcacion`), '%m-%Y') as fecha "
            . "FROM `marcaciones` "
            . "group by `m_fcia` "
            . "order by `m_fcia` ASC" ;
    $queEmp = mysql_query($query) or die(mysql_error());
    
       // $myArr=array("FECHA","FCIA");
     	//$excel->writeLine($myArr);
    
     
    

    echo "<TABLE>";
    echo "<TR>";
    echo "<TD>";
        echo "Nro";
        echo "</TD>";
        echo "<TD>";
        echo "ULTIMO REGISTRO";
        echo "</TD>";
        echo "<TD>";
        echo " FCIA ";
        echo "</TD>";
        
    echo "</TR>";
    
    
    while ($resEmp = mysql_fetch_assoc($queEmp)) {
        
      $cant=$cant+1;

        
    echo "<TR>";
    echo "<TD>";
        echo $cant;
        echo "</TD>";
        echo "<TD>";
        echo $resEmp['fecha'];
        echo "</TD>";
        echo "<TD>";
        echo $resEmp['m_fcia'];
        echo "</TD>";
    echo "</TR>";
               
    // $myArr=array($resEmp['fecha'],$resEmp['m_fcia']);
     //			$excel->writeLine($myArr);
    }
     
    // $excel->close();
    
   echo "</TABLE>"; 
}
    
    

 //solicita una fcia y trae todos los empleados de esa fcia

   function ExpleadosXfcia($fcia)
{
       $cant=0;
    //Genera el excel 
    //$nombreExcel='informe_empleados_..xls';
	//$excel=new ExcelWriter("$nombreExcel");	
	//if($excel==false) { 
	 // echo $excel->error;
	//}
    
        //Consulta a la base de datos trae el maximo 
        
    $query= "SELECT DISTINCT m_legajo,m_dni,m_apnom FROM marcaciones WHERE m_fcia='$fcia'" ;
    $queEmp = mysql_query($query) or die(mysql_error());
    
        //$myArr=array("FECHA","FCIA");
     	//$excel->writeLine($myArr);
    
     
    

    echo "<TABLE>";
    echo "<TR>";
    echo "<TD>";
        echo "Nro";
        echo "</TD>";
        echo "<TD>";
        echo "N° Legajo";
        echo "</TD>";
        echo "<TD>";
        echo "N° DNI";
        echo "</TD>";
        echo "<TD>";
        echo " Apellido y nombre  ";
        echo "</TD>";
        
    echo "</TR>";
    
    
    while ($resEmp = mysql_fetch_assoc($queEmp)) {
        $cant=$cant+1;
      

        
    echo "<TR>";
    echo "<TD>";
        echo $cant;
        echo "</TD>";
        echo "<TD>";
        echo $resEmp['m_legajo'];
        echo "</TD>";
        echo "<TD>";
        echo $resEmp['m_dni'];
        echo "</TD>";
        echo "<TD>";
        echo $resEmp['m_apnom'];
        echo "</TD>";
    echo "</TR>";
               
     //$myArr=array($resEmp['fecha'],$resEmp['m_fcia']);
     	//		$excel->writeLine($myArr);
    }
     
    // $excel->close();
    
   echo "</TABLE>"; 
}