

<body>
<?php
	
	include("excelwriter.inc.php"); 
	$nombreExcel=$periodo.'_Debito_Saldo.xls';
	
	$excel=new ExcelWriter("$nombreExcel");	
	
	if($excel==false) { 
	   echo $excel->error;
	}

?>




<?php 
	$consulta = "SELECT * FROM debitos WHERE PERIODO like $periodo ORDER BY SALDO DESC";
	$resultado = mysql_query($consulta);  //tiene todos los resultados de la consulta
	@$num_registros = mysql_num_rows($resultado);
?>


<?php

	$myArr=array("NRO CLIENTE","PROVINCIA","LOCALIDAD","FARMACIA","PERIODO","SALDO");
	$excel->writeLine($myArr);
	
	if($num_registros<=0){
		echo "<tr>";
		echo "<td>";		
		
		echo "</td>";				
//		echo "<td><span class='style3 style6'>Elija un periodo para ver los detalles.</span></td>";
	    echo "</tr>";
	}
	else{
   		for ($i=0; $i<$num_registros; $i++)
		{
		  $row = mysql_fetch_array($resultado);
		  
		  $CLAVE=stripslashes($row["CLAVE"]); //UNICO
		  $NRO_CLIENTE= stripslashes($row["NRO_CLIENTE"]);
		  
  		  $provincia= stripslashes($row["provincia"]);
		  $localidad= stripslashes($row["localidad"]);
  		  $nombre_fcia= stripslashes($row["nombre_fcia"]);
		  
		  $PERIODO= stripslashes($row["PERIODO"]);
		  $TARJETA_DEBITOS= stripslashes($row["TARJETA_DEBITOS"]);
		  $TARJETA_ANU= stripslashes($row["TARJETA_ANU"]);
	      $OBRA_SOCIAL_DEB= stripslashes($row["OBRA_SOCIAL_DEB"]);
	      $OBRA_SOCIAL_AJU= stripslashes($row["OBRA_SOCIAL_AJU"]);	  
	      $TARJETA_AJUSTES= stripslashes($row["TARJETA_AJUSTES"]);
	      $OBRA_SOCIAL_AJUSTE= stripslashes($row["OBRA_SOCIAL_AJUSTE"]);
	      $TARJETA_AJUSTE= stripslashes($row["TARJETA_AJUSTE"]);
	      $DEBITO_ENVIADO_FCIA= stripslashes($row["DEBITO_ENVIADO_FCIA"]);		  		  
	      $RECETA_INSERTADA= stripslashes($row["RECETA_INSERTADA"]);
      	  $NOTA_CREDITO_AUDI= stripslashes($row["NOTA_CREDITO_AUDI"]);
  	      $RECETA_FA_REC= stripslashes($row["RECETA_FA_REC"]);
	      $RECETA_FB_REC= stripslashes($row["RECETA_FB_REC"]);
	      $PAGOS= stripslashes($row["PAGOS"]);  
	      $SIN_CODIFICAR= stripslashes($row["SIN_CODIFICAR"]);
	      $SALDO= stripslashes($row["SALDO"]);		  

			echo"<tr>";
			echo"<td background='Imagenes/contenido.png'><span class='style3 style6'><left>$NRO_CLIENTE</span></td>";			
			echo"<td background=''><span class='style3 style6'><left>$provincia</span></td>";
			echo"<td background='Imagenes/contenido.png'><span class='style3 style6'><left>$localidad</a></left></span></td>";
			echo"<td background=''><span class='style3 style6'><left>$nombre_fcia</left></span></td>";
		 	echo"<td background='Imagenes/contenido.png'><span class='style3 style6'>$PERIODO</span></td>";
			echo"<td background=''><span class='style3 style6'><left>$$SALDO</left></span></td>";
			echo"</tr>";
			
			$myArr=array($NRO_CLIENTE,$provincia,$localidad,$nombre_fcia,$PERIODO,$SALDO);
			$excel->writeLine($myArr);
		}//for
    }//if
	$excel->close();
echo "<p align='right'><a href=$nombreExcel><img src='Imagenes/logo-excel.png' width='20' height='20' border='0'></a><a href=$nombreExcel>Descargar Excel </a></p>";

// 	echo"<a href=$nombreExcel><center> -Descargar Excel</center></a>";	
	 ?>	

    <tr>
      <td colspan="5"><span class="style1 style2 style3">&nbsp;</span><span class="style1 style2 style3">&nbsp;</span><span class="style1 style3 style2">&nbsp;</span><span class="style1 style3 style2">&nbsp;</span><span class="style1 style2 style3">&nbsp;</span></td>
    </tr>

</body>
</html>

