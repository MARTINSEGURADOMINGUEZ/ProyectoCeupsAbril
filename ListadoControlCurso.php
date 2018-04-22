
<?php
    //ini_set("session.auto_start", 0);
    session_start();
    
    $listado = array();
    $listado = $_SESSION['LISTADOCONTROLCURSO'];
    $nombre = $_SESSION['nombrecurso'];
    $finicio = $_SESSION['inicio'];
    $ftermino = $_SESSION['fin'];
    
    $i=1;
    
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
        <link rel="stylesheet" type="text/css" href="css/ccs_print.css" media="print" />
    <style>
    table {
    border-collapse: collapse;
	font-family:Arial, Helvetica, sans-serif;
	font-size:18px;
    }
    </style>
    <?php 
        
        $LinksRoute="./";
        include './inc/links.php';
        
    ?>
    <script src="js/entidadesjquery/reportejquery.js" ></script>
    </head>
    <body>
        <table  width="750" name="table_hide" id="table_hide" >
        <tr>
        <td colspan="1">
        </td>
        </tr>
<tr>
<td >
<form id="secundario">
<fieldset> 
<div id="uno">
Listado de Curso:<br>
<img src="img/print_icon.gif"  ALT="Logo PDF" width="58" height="51" ><input type='button' onclick='window.print();' value='Imprimir' />
&nbsp;<a href="FrmAsistencia.php" > <input type='button' value='Volver' /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</div>
</fieldset>
</form>
</td>
</tr>
</table>

<table  width="750" height="100" name="tabla1" id="tabla1" >
<tr>
<td height="35" ><center><img src="img/logo_unfv.gif"  ALT="Logo UNFV" width="132" height="35" href="#"></center></td>
<td width="300" ></td>
<td><center><img src="img/logo_ceups.jpg"  ALT="Logo CEUPS" width="119" height="34" href="#"></center></td>
</tr>
<tr>
<td height="20" colspan="3" >
<center><b><span style="font-size: 9pt; font-family: 'arial black', 'avant garde';">CURSO: <?php echo $nombre; ?></span></b></center>
<center><b><span style="font-size: 8pt; font-family: 'Copperplate Gothic bold', 'avant garde';">RESOLUCION R Nº 2242 - 2018 - UNFV <BR>PERIODO: <?php echo duracion($finicio,$ftermino) ?><BR>RELACIÓN DE OBSERVACIÓNES DE MATRICULA DE LOS PARTICIPANTES </span></b></center>
</td>
</tr>
</table>
<br>
<table width="800" border="1">
<thead style="display: table-header-group">
<tr>
<td width="5%"  height="22" style="font-size: 8pt; font-family: 'arial black', 'avant garde';" >
<center><b> Nº </b></center>
</td>
<td width="13%"  style="font-size: 8pt; font-family: 'arial black', 'avant garde';">
<b><center> DNI </center></b> 
</td>
<td width="40%" style="font-size: 8pt; font-family: 'arial black', 'avant garde';">
<b><center> APELLIDOS Y NOMBRES </center></b> 
</td>
<td width="15%"  style="font-size: 8pt; font-family: 'arial black', 'avant garde';">
<b><center> CONDICIÓN </center></b> 
</td>
<td width="75%" style="font-size: 8pt; font-family: 'arial black', 'avant garde';">
<b><center> OBSERVACIONES </center></b> 
</td>
</tr>
</thead>
<tbody>
 <?php foreach ($listado as $reg){
            $DNI = $reg['dni'];
            $NOMBRE = $reg['nombre'];
            $TIPOALU = $reg['tipoalu'];
            $OBSERVACION = $reg['observacion'];
     ?>
    <tr>
        <td width="5%"  height="22" style="font-size: 8pt; font-family:'avant garde';" >
        <center><b><?php echo $i;?> </b></center>
        </td>
        <td  width="13%"  style="font-size: 8pt; font-family:'avant garde';">
        <b><center><?php echo $DNI; ?></center></b> 
        </td>
        <td width="40%" style="font-size: 8pt; font-family:'avant garde';">
        <b>&nbsp;&nbsp;<?php echo $NOMBRE ;?></b> 
        </td>
        <td width="15%"  style="font-size: 8pt; font-family:'avant garde';">
        <b><center><?php echo $TIPOALU ?></center></b> 
        </td>
        <td width="75%" style="font-size: 8pt; font-family:'avant garde';">
        <b>&nbsp;&nbsp;<?php echo $OBSERVACION ?></b> 
        </td>
    </tr>
 <?php $i++; } ?>
</tbody>
</table>
<br><br><br>
<!--table width="750" style="border-collapse: collapse;" >
<tr>
<td width="3%"  height="30" >
<center><b>&nbsp; </b></center>
</td>
<td width="40%" style="font-size: 7pt; font-family: 'arial black', 'avant garde';">
<b><center><hr><!--?php echo $row4["jefe_oficina_ceups"]; ?><br><!--?php echo $row4["cargo_jefe_oficina_ceups"]; ?><br>&nbsp;<br>&nbsp;<br>&nbsp;</center></b> 
</td>
<td width="8%">
<b><center>&nbsp;</center></b> 
</td>
<td width="8%">
<b><center>&nbsp;</center></b> 
</td>
<td width="8%">
<b><center>&nbsp;</center></b> 
</td>
<td width="33%" colspan="2" style="font-size: 7pt; font-family: 'arial black', 'avant garde';">
<b><center><hr>
<!--?php echo $row4["director_ceups"]; ?><br>
<!--?php echo $row4["cargo_director_ceups"]; ?><br>&nbsp;<br>&nbsp;<br>&nbsp;</center></b> 
</td>
</tr>
</table-->
</body>
</html>
