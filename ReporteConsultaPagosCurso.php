<?php

require_once './UTIL/ConexionBD.php';
session_start();

$idperiodocurso = $_SESSION['idperiodocurso'];
$fechainicio = $_SESSION['fechainicio'];;
$fechatermino = $_SESSION['fechatermino'];;
    
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

$sql="select matriculas.id_matricula as id_matricula,  estudiantes.apellido as est_ape, estudiantes.nombre as est_nom, cursos.nom_curso as cur_nom,  periodos_cursos.f_inicio as f_inicio, periodos_cursos.f_termino as f_termino ,condicion.descripcion as condicion  from cursos inner join periodos_cursos on cursos.id_curso=periodos_cursos.id_curso inner join matriculas on matriculas.id_per_curso=periodos_cursos.id_periodo_c inner join estudiantes on estudiantes.id_estudiante=matriculas.id_estudiante inner join condicion on matriculas.id_condicion_alu=condicion.id_condicion
WHERE periodos_cursos.id_periodo_c= '$idperiodocurso' order by estudiantes.apellido asc";

$sql2=" select * from cursos inner join periodos_cursos ON periodos_cursos.id_curso=cursos.id_curso WHERE periodos_cursos.id_periodo_c = '$idperiodocurso'; ";

$sql3="select   cursos.nom_curso as cur_nom,  periodos_cursos.f_inicio as f_inicio, periodos_cursos.f_termino as f_termino ,matriculas.observacion as observacion,  SUM(pagos.monto) as monto_total,  SUM(matriculas.deuda) as deuda_total , COUNT(*) as num_pagos from cursos inner join periodos_cursos on cursos.id_curso=periodos_cursos.id_curso inner join matriculas on matriculas.id_per_curso=periodos_cursos.id_periodo_c inner join estudiantes on estudiantes.id_estudiante=matriculas.id_estudiante inner join pagos on pagos.id_matricula=matriculas.id_matricula
WHERE periodos_cursos.id_periodo_c= '$idperiodocurso'; ";

$sql4="select * from datos_generales";


			
			$cn = new ConexionBD();
                        $enlace = $cn->getConexionBD();
			mysqli_set_charset ($enlace , 'utf8' );
			$rs=mysqli_query($enlace,$sql);
			$rs2=mysqli_query($enlace,$sql2);
			$rs3=mysqli_query($enlace,$sql3);
			$rs4=mysqli_query($enlace,$sql4);
			$row2 = mysqli_fetch_array($rs2);
			$row3 = mysqli_fetch_array($rs3);
			$row4 = mysqli_fetch_array($rs4);
			$i=1;
			$e=1;

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
&nbsp;<a href="FrmConsultaCurso.php" > <input type='button' value='Volver' /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
<td "><center><img src="img/logo_ceups.jpg"  ALT="Logo CEUPS" width="119" height="34" href="#"></center></td>
</tr>
<tr>
<td height="20" colspan="3" >
<center><b><span style="font-size: 9pt; font-family: 'arial black', 'avant garde';">CURSO: <?php echo $row2["nom_curso"]; ?></span></b></center>
<center><b><span style="font-size: 8pt; font-family: 'Copperplate Gothic bold', 'avant garde';">RESOLUCIÓN R Nº 2242 - 2018 - UNFV <BR>PERIODO: <?php echo duracion($fechainicio,$fechatermino) ?><BR>RELACIÓN DE PAGO FINAL DE LOS PARTICIPANTES </span></b></center>

</td>
</tr>

</table>
<br>
<table width="750" border="1">
<thead style="display: table-header-group">
<tr>
<td width="3%"  height="22" style="font-size: 8pt; font-family: 'arial black', 'avant garde';" >
<center><b>Nº </b></center>
</td>
<td width="50%" style="font-size: 8pt; font-family: 'arial black', 'avant garde';">
<b><center>APELLIDOS Y NOMBRES</center></b> 
</td>

<td width="13%"  style="font-size: 8pt; font-family: 'arial black', 'avant garde';">
<b><center>FECHA</center></b> 
</td>
<td width="13%"  style="font-size: 8pt; font-family: 'arial black', 'avant garde';">
<b><center>Nº Recibo</center></b> 
</td>
<td width="13%" style="font-size: 8pt; font-family: 'arial black', 'avant garde';">
<b><center>PAGO</center></b> 
</td>
<td width="8%" style="font-size: 8pt; font-family: 'arial black', 'avant garde';">
<b><center>&nbsp;</center></b> 
</td>

</tr>
</thead>
<?php

while ($row = mysqli_fetch_array($rs)){
				 
				 
					$a=1;
					$sql6="SELECT * FROM pagos INNER join matriculas on matriculas.id_matricula=pagos.id_matricula INNER JOIN tipo_pago on pagos.id_tipo_pago=tipo_pago.id_tipo where pagos.id_matricula = '".$row['id_matricula']."' order by pagos.f_pago asc";
					
					$rs6=mysqli_query($enlace,$sql6);
					$filas=mysqli_num_rows($rs6);
					switch ($row['condicion']) {
    case "PUBLICO GENERAL":
        $condicion="PG";
	break;
    case "ALUMNO-PREGRADO":
        $condicion="PREGRADO";
        break;
    case "ALUMNO-PREGRADO-PUBLICA OTROS":
        $condicion="A-PU";
        break;
	case "ALUMNO-PREGRADO-UNFV":
        $condicion="A-PU";
        break;
    case "ALUMNO-PREGRADO-PRIVADA":
        $condicion="A-PR";
        break;
	 case "ADMINISTRATIVO":
        $condicion="ADM";
        break;
	case "ALUMNO-POSTGRADO":
        $condicion="A-EUPG";
        break;
	case "DOCENTE":
        $condicion="DOC";
        break;
	case "CORPORATIVO":
        $condicion="CORP";
        break;
	case "ALUMNO CEUPS":
        $condicion="A-CEUPS";
        break;
	case "BECADO":
        $condicion="BECA-OSCE";
        break;
        case "INHOUSE":
        $condicion="INHOUSE"; 
        break;
		
}

while ($row6 = mysqli_fetch_array($rs6)){
	
	if($row6["num_liquidacion"]==""){
				$boleta=$row6["tipo"]."<br>".$row6["num_doc"];}
				else{
					$boleta=$row6["num_liquidacion"];
				}
					
					echo '<tr style="font-size: 7pt; font-family: "arial black", "avant garde";" >';
					
					
					if($a==1){
						echo "<td  rowspan='".$filas."' align='center' >".$e."</td><td rowspan='".$filas."'>&nbsp;".$row["est_ape"].", ".$row["est_nom"]."</td>  <td align='center' >".fecha2($row6["f_pago"])."</td><td align='center'>".$boleta."</td><td align='center'>".$row6["monto"]."</td><td align='center' rowspan='".$filas."'>".$condicion."</td></tr>";
						} 
						
						else {
							
							echo "<td align='center' >".fecha2($row6["f_pago"])."</td><td align='center'>".$boleta."</td><td align='center'>".$row6["monto"]."</td></tr>";
							
							}
					
					$a++;
					}
					$e++;

			}			
			echo '<tr style="font-size: 8pt; font-family: "arial black", "avant garde";">
			<td colspan="4" align="center" ><b>TOTAL GENERAL</b>
			</td><td colspan="1" align="center"><b> S/. '.round($row3['monto_total']).'</b></td><td>&nbsp;</td>
			</tr>';
			//echo "</tbody></table>";


?>
</table>
<br><br><br>
<table width="750" style="border-collapse: collapse;" >

<tr>
<td width="3%"  height="30" >
<center><b>&nbsp; </b></center>
</td>
<td width="40%" style="font-size: 7pt; font-family: 'arial black', 'avant garde';">
<b><center><hr><?php echo $row4["jefe_oficina_ceups"]; ?><br><?php echo $row4["cargo_jefe_oficina_ceups"]; ?><br>&nbsp;<br>&nbsp;<br>&nbsp;</center></b> 
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
<?php echo $row4["director_ceups"]; ?><br>
<?php echo $row4["cargo_director_ceups"]; ?><br>&nbsp;<br>&nbsp;<br>&nbsp;</center></b> 
</td>
</tr>
</table>
</body>
</html>

