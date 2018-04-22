<?php
session_start();

$listado = array();
$listado = $_SESSION['LISTADOPARTICIPANTES'];
$nombre = $_SESSION['nombrecurso'];
$sesion = $_SESSION['sesion'];
$idcatecurso = $_SESSION['idcatecurso'];
$finicio = $_SESSION['finicio'];
$ftermino = $_SESSION['ftermino'];

$i = 1;
$j;

date_default_timezone_set('America/Lima');

$arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
   'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
 
   $arrayDias = array( 'Domingo', 'Lunes', 'Martes',
       'Miercoles', 'Jueves', 'Viernes', 'Sabado');
	  
$hoy="".date('d')." de ".$arrayMeses[date('m')-1]." de ".date('Y');

function duracion($f_inicio, $f_termino){
$arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
   'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');


$dia1=substr($f_inicio,8,2);
$mes1=substr($f_inicio,5,2);

$dia2=substr($f_termino,8,2);
$mes2=substr($f_termino,5,2);
$ano2=substr($f_termino,0,4);


return  "DEL ".$dia1." DE ".strtoupper($arrayMeses[$mes1-1])." AL ".$dia2." DE ".strtoupper($arrayMeses[$mes2-1])." DE ".$ano2."";

}

function fecha2($fecha){
		$dia=substr($fecha,8,2);
		$mes=substr($fecha,5,2);
		$ano=substr($fecha,0,4);
return $dia.'/'.$mes.'/'.$ano;
}

?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8">
<title>Vista previa</title>
<script> 
function abrir() { 
open('pagina.html','','top=300,left=300,width=300,height=300') ; 
} 
</script> 
</head>
<style>
table {
    border-collapse: collapse;
	font-family:Arial, Helvetica, sans-serif;
	font-size:18px;
}

</style>
<link rel="stylesheet" type="text/css" href="../css/css_print.css" media="print" />
<link rel="stylesheet" href="css2.css">
<body >
<div id="div.page" name="div.page" >
<table  width="750" name="table_hide" id="table_hide" >
<!--tr>
<td colspan="1">



</td>

</tr-->
<tr>
<td >
<form id="secundario">
<fieldset> 
<div id="uno">
Listado de Curso:<br>
<img src="img/print_icon.gif"  ALT="Logo PDF" width="58" height="51" ><input type='button' onclick='window.print();' value='Imprimir' />
&nbsp;<a href="FrmAsistencia.php" > <input type='button' value='Volver' /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<!--

<a href="test.php?Ape=<?php  //echo strtoupper($_POST['Apellidos']);?>&Nom=<?php //echo strtoupper($_POST['Nombre']);?>&Dir=<?php //echo strtoupper($_POST['Direccion']);?>&Dis=<?php //echo strtoupper($_POST['Distrito']);?>&Tel=<?php //echo $_POST['Telefono'];?>&Cel=<?php //echo $_POST['Celular'];?>&Recibo=<?php //echo $_POST['Liquidacion'];?>&Fecha_pago=<?php //echo $_POST['Fecha'];?>&Monto=<?php //echo $_POST['Monto'];?>&F_examen=<?php //echo $_POST['Fecha1'];?>&Hoy=<?php //echo $hoy;?>&Dni=<?php //echo $_POST['Dni'];?>"><img src="pdf.gif"  ALT="Logo PDF" ><i>Descargar en formato PDF</i></a>
-->
</div>
</fieldset>
</form>
</td>

</tr>
</table>

<table  width="750" height="150" name="tabla1" id="tabla1" >


<tr>
<td height="51" ><center><img src="img/logo_unfv.gif"  ALT="Logo UNFV" width="155" height="50" href="#"></center></td>
<td width="300" ></td>
<td><center><img src="img/logo_ceups.jpg"  ALT="Logo CEUPS" width="154" height="50" href="#"></center></td>
</tr>
<tr>
<td height="30" colspan="3" >
<center><b><span style="font-size: 15pt; font-family: 'arial black', 'avant garde';"><?php echo $nombre; ?></span></b></center>
<center><b><span style="font-size: 11pt; font-family: 'Copperplate Gothic bold', 'avant garde';"><?php echo duracion($finicio,$ftermino) ?> <BR>RESOLUCIÓN R Nº 2242 - 2018 - UNFV</span></b></center>

</td>
</tr>

</table>
<table width="750" style="border-collapse: collapse;" >
<tr>
<td width="5%"  height="30" >
<center><b>&nbsp; </b></center>
</td>
<td width="55%">
<b><center>&nbsp;</center></b> 
</td>
<td width="20%">
<b><center>&nbsp;</center></b> 
</td>
<td width="20%" style="border:  solid black">
<b><center><span style="font-size: 11pt; font-family: 'Copperplate Gothic bold', 'avant garde';"><?php echo $sesion;?></span></center></b> 
</td>

</tr>
<tr>
<td width="5%"  height="30" >
<center><b>&nbsp; </b></center>
</td>
<td width="55%">
<b><center>&nbsp;</center></b> 
</td>
<td width="20%">
<b><center>&nbsp;</center></b> 
</td>
<td width="20%" style="border:  solid black">
<b><center><?php echo date('d-m-Y');?></center></b> 
</td>

</tr>

</table>
<table width="750" border="1">
<thead style="display: table-header-group">
<tr>
<td width="5%"  height="40" >
<center><b>N </b></center>
</td>
<td width="45%">
<b><center>APELLIDOS Y NOMBRES</center></b> 
</td>
<td width="30%">
<b><center>FIRMA</center></b> 
</td>
<td width="20%" >
<b><center>DNI</center></b> 
</td>
</tr>
</thead>
<tbody>
 <?php foreach ($listado as $reg){ 
            $DNI = $reg['dni'];
            $NOMBRE = $reg['nombre'];
            
     ?>
    
    <tr>
<td width="5%"  height="40" >
<center><?php echo $i;?></center>
</td>
<td width="45%" style='font-size:12px;'>
<?php echo $NOMBRE; ?>
</td>
<td width="30%">
<b><center></center></b> 
</td>
<td width="20%" >
<b><center><?php echo $DNI; ?></center></b> 
</td>
</tr>
    

<?php $i++;} $limite = $i+2; ?>

<?php if($idcatecurso==="1"){ 
        for ($j = $i; $j <= $limite; $j++){ ?>
            
         <tr>
            <td width="5%"  height="40" >
            <center><?php echo $j;?></center>
            </td>
            <td width="45%" style='font-size:12px;'>
            
            </td>
            <td width="30%">
            <b><center></center></b> 
            </td>
            <td width="20%" >
            <b><center></center></b> 
            </td>
        </tr>   
       <?php }} else { echo '<br>';} ?>
    

</tbody>

</table>
</div>
</body>
</html>

