<?php
include 'conexion.php';
include 'funciones.php';


//session_start();
//mysql_connect("localhost","root","") or die("No se puede conectar");
//mysql_select_db("poblacion") or die ("No se ha podido seleccionar la Base de Datos");
//Recuperacion de las variables convertidas en sesiones
$edo=$_SESSION['edo2']=@$_REQUEST['edo']; 
$str = $edo;
$edo =explode('|', $str, 2);

$muni=$_SESSION['muni2']=@$_REQUEST['muni'];
$str = $muni;
$muni =explode('|', $str, 2);
$col=$_SESSION['col2']=@$_REQUEST['col'];
$str = $col;
$col =explode('|', $str, 2);

 ?>

<form name="form1" >

<?php 
//QUERY COMBO 1
$query="SELECT  nro_cliente, f_nombre, f_ciudad, f_provincia FROM farmacias WHERE 1"; 
$res=mysql_query($query);
?>
<p>Farmacia:
<select name="edo" onchange="this.form.submit()" >
<?php if($edo[0]!=''){	?> 
<option value="<?php echo $edo[0]."|".$edo[1]."|".$edo[2]."|".$edo[3]."|".$edo[4]; ?>"><?php echo $edo[0]; ?></option>
<?php } else { ?>
<option > Elige</option><?php }?>
<?php while($row=mysql_fetch_array($res))
{?>
<option value="<?php echo $row['nro_cliente']."|".$row['f_nombre']?>">

<?php echo htmlentities($row['f_nombre']."/".$row['f_ciudad']);?></option>
<?php 
} 
?>
</select>
</p>

<p>
<?php 
//QUERY COMBO 2
$query2="SELECT DISTINCT m_legajo,m_dni,m_apnom FROM marcaciones WHERE m_fcia=$edo[0]"; 
$res2=mysql_query($query2);
?>
Especifica Municipio
<select name="muni" onchange="this.form.submit()">
<?php if($muni[0]!=''){	?> 
<option value="<?php echo $muni[0]."|".$muni[1]; ?>"><?php echo $muni[1]; ?></option><?php }

else { ?>
<option > Elige</option><?php }?>
<?php while($row2=mysql_fetch_array($res2))
{
?>
<option value="<?php echo $row2['m_legajo']."|".$row2['m_apnom']?>">

<?php echo htmlentities($row2['m_dni']);?></option>
<?php 
} 
?>
</select>
</p>


<p>
<!--<input type="submit" name="enviar" value="Enviar" />--><br /><br />
</p>
</form>

<p>Id Estado: <?php echo $edo[0];?><br />
Id Municipio: <?php echo $muni[0];?><br />
?>
<br />
<br />


Estado: <?php echo $edo[1];?><br />
Municipio: <?php echo $muni[1];?><br />
?>
<br />
<br />


Estado: <?php echo $edo[2];?><br />
Municipio: <?php echo $muni[2];?><br />
?>
<br />
<br />


Estado: <?php echo $edo[3];?><br />
Municipio: <?php echo $muni[3];?><br />
?>
<br />
<br />


Estado: <?php echo $edo[4];?><br />
Municipio: <?php echo $muni[4];?><br />
?>

<br />
<br />


Estado: <?php echo $edo[5];?><br />
Municipio: <?php echo $muni[5];?><br />
?>

</p>

<p>&nbsp;</p>
<p>&nbsp;</p>