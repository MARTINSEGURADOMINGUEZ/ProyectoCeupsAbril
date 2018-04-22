<?php

    require_once '../BEAN/ConsultarPagoBean.php';
    require_once '../UTIL/ConexionBD.php';
    require_once '../UTIL/ConexionBDAlternative.php';

class ConsultarPagoDao {
    

        public function ObtenerPagosPorCurso(ConsultarPagoBean $objconsulpagobean)
                {   
            try {
                    $cn = new ConexionBD();
                    $cnx = $cn->getConexionBD();
                    
                    $sql = " SELECT estu.dni as dni, concat(estu.apellido,', ',estu.nombre) as nombre,GROUP_CONCAT(pag.f_pago SEPARATOR '\n') as fecha, GROUP_CONCAT(pag.num_liquidacion SEPARATOR '\n') as recibo,GROUP_CONCAT(pag.num_doc SEPARATOR '\n') as documento, GROUP_CONCAT(pag.monto SEPARATOR '\n') as monto,matri.deuda as deuda,tipoestu.descripcion as tipoalumno,SUM(pag.monto) as sumamonto from matriculas matri inner JOIN pagos pag on pag.id_matricula = matri.id_matricula inner JOIN estudiantes estu on estu.id_estudiante = matri.id_estudiante inner JOIN condicion as tipoestu on tipoestu.id_condicion = matri.id_condicion_alu WHERE matri.id_per_curso = '$objconsulpagobean->NombreCurso' GROUP BY estu.id_estudiante ORDER BY estu.apellido ASC; ";
                    
                    mysqli_query($cnx,"SET NAMES 'utf8'");
                    
                    $result = mysqli_query($cnx,$sql);
                                            
                    $LISTA = array();

                    while ($fila = mysqli_fetch_array($result))
                         {
                            $nombre = $fila['nombre'];
                            $fecha = $fila['fecha'];
                            /*$recibo = $fila['recibo'];
                            $documento = $fila['documento'];*/
                            if($fila['recibo']==="" || $fila['recibo']===null)
                                {
                                    if($fila['documento']==="" || $fila['documento']===null)
                                        {
                                            $recibo = "CCI-TRANSFERENCIA \n";
                                        }else
                                            {
                                            $recibo = $fila['documento'];
                                            }
                                }else
                                    {
                                    $recibo = $fila['recibo'];
                                    }
                            $monto = $fila['monto'];
                            $deuda = $fila['deuda'];
                            $tipoalu = $fila['tipoalumno'];
                            $sumamonto = $fila['sumamonto'];

                          $LISTA[] = array('dni'=>str_pad($fila['dni'], 8, "0", STR_PAD_LEFT),'nombre'=>$nombre,'fecha'=>$fecha,'recibo'=>$recibo,'monto'=>$monto,'deuda'=>$deuda,'tipoalumno'=>$tipoalu,'sumamonto'=>$sumamonto); 
                         }
                    
                } catch (Exception $exc) {
                                echo $exc->getTraceAsString();
                            }
                    return $LISTA;
                }
                
      
static function  duracion($f_inicio, $f_termino){
$arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
   'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');


$dia1=substr($f_inicio,8,2);
$mes1=substr($f_inicio,5,2);

$dia2=substr($f_termino,8,2);
$mes2=substr($f_termino,5,2);
$ano2=substr($f_termino,0,4);


return  "DEL ".$dia1." DE ".strtoupper($arrayMeses[$mes1-1])." AL ".$dia2." DE ".strtoupper($arrayMeses[$mes2-1])." DE ".$ano2."";

}

static function fecha2($fecha){
		$dia=substr($fecha,8,2);
		$mes=substr($fecha,5,2);
		$ano=substr($fecha,0,4);
return $dia.'/'.$mes.'/'.$ano;
}
    
}

?>