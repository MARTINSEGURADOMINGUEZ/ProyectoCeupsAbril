<?php

require_once '../UTIL/ConexionBD.php';
require_once '../BEAN/PagoBean.php';
require_once '../DAO/MatriculaDao.php';


class PagoDao {
    
    public function ObtenerPagosXalumno(PagosBean $objpagobean)
            {
        try {
               $cn = new ConexionBD();
               $cnx = $cn->getConexionBD();
               
               $sql = " SELECT matri.id_matricula as idmatricula,periodo.id_periodo_c as idperiodo,estu.id_estudiante as idestudiante,concat(estu.apellido,', ',estu.nombre) as nombreestudiante,estu.dni as dni,cur.nom_curso as nombrecurso,matri.deuda as deuda, periodo.f_inicio as finicio, periodo.f_termino as ftermino
                        from matriculas matri inner join estudiantes estu on estu.id_estudiante=matri.id_estudiante INNER join periodos_cursos periodo on matri.id_per_curso= periodo.id_periodo_c inner join cursos cur on periodo.id_curso = cur.id_curso 
                        WHERE estu.id_estudiante = '$objpagobean->AlumnoDni' AND matri.deuda>0 ";
               
               $result = mysqli_query($cnx,$sql);
               
               $LISTA = array();
               
               while ($fila = mysqli_fetch_assoc($result))
                       {
                            $LISTA[] = array('idmatricula'=>$fila['idmatricula'],'idperiodo'=>$fila['idperiodo'],'idestudiante'=>$fila['idestudiante'],'dni'=>$fila['dni'],'nombreestudiante'=>$fila['nombreestudiante'],'nombrecurso'=>$fila['nombrecurso'],'finicio'=>$fila['finicio'],'ftermino'=>$fila['ftermino'],'deuda'=>$fila['deuda']);
                       }
               
            } catch (Exception $exc) {
                        echo $exc->getTraceAsString();
                    }
                return $LISTA;
            }
    
     public function VerificarNumeroPago(PagosBean $objpagobean)
             {
         try {
                                $cn = new ConexionBD();
                                $cnx = $cn->getConexionBD();
                                
                                $sql = " SELECT pag.id_pago as id,cur.nom_curso as nombrecurso,pag.f_pago as fecha FROM pagos pag inner join matriculas matri on matri.id_matricula= pag.id_matricula inner join periodos_cursos periodo on periodo.id_periodo_c=matri.id_per_curso inner join cursos cur on cur.id_curso = periodo.id_curso WHERE num_liquidacion = '$objpagobean->NumeroLiquidacion' OR num_doc = '$objpagobean->NumeroLiquidacion'; ";
                                
                                $result = mysqli_query($cnx,$sql);
                                
                                $lista = array();
                                
                                if(mysqli_num_rows($result)>0)
                                    {
                                      $row = mysqli_fetch_assoc($result);
                                      $id = $row['id'];
                                      $nombre = $row['nombrecurso'];
                                      $fecha = $row['fecha'];
                                      
                                      $lista[] = array('estado'=>'success','id'=>$id,'nombre'=>$nombre,'fecha'=>$fecha);
                                      
                                    }else
                                        {
                                        $lista[] = array('estado'=>'failed');
                                        }
                                
                        } catch (Exception $exc) {
                           
                        }
                        return $lista;
                  }
                  
      public function ModificarMatriculaDeuda(PagosBean $objpagobean)
              {
          try {
              
                $cn = new ConexionBD();
                $cnx = $cn->getConexionBD();
                $sql = " UPDATE `matriculas` SET `deuda` = '$objpagobean->CalculoNuevaDeuda' WHERE `matriculas`.`id_matricula` = ?; ";
                
                $stmt = $cnx->prepare($sql);
                $stmt->bind_param('i',$objpagobean->IdMatricula);
                $stmt->execute();
              
                $estado = 0;
                
                $response = $stmt->get_result();
                            
                if(mysqli_stmt_affected_rows($stmt)>0)
                {
                $estado = 1;
                    MatriculaDao::RealizarPagoMatricula($objpagobean->IdMatricula,$objpagobean);
                 }else
                {
                     $estado = 2;
                echo mysqli_error($cnx);
                }
    
} catch (Exception $exc) {
              echo mysqli_errno($cnx);
          }
                    
  return $estado;        
}

    public function ObtenerPagos()
            {
        try {
            $cn = new ConexionBD();
                    $cnx = $cn->getConexionBD();
                    //$sql = " SELECT preins.id_pre_per_cur as id, preins.f_contacto as fecha, concat(estu.apellido,', ',estu.nombre) as nombre,estu.email_p as emailp, estu.celular as celular ,cur.nom_curso as curso,preins.observacion as observacion from pre_per_cur preins inner JOIN estudiantes estu ON preins.id_preinscrito=estu.id_estudiante INNER JOIN cursos cur on cur.id_curso=preins.id_curso WHERE YEAR(f_contacto) = 2018 ORDER BY f_contacto DESC; ";
                    $sql = " SELECT pag.id_pago as idpago, estu.dni as dni,concat(estu.apellido,', ',estu.nombre) as nombre,pag.id_tipo_pago as tipopago,pag.num_liquidacion as recibo, pag.num_doc as documento, pag.f_pago as fechapago,pag.monto as monto, cur.nom_curso as curso,periodo.f_inicio as finicio, periodo.f_termino as ftermino , pag.id_tipo_pago as tipopago from pagos pag inner join matriculas matri on matri.id_matricula = pag.id_matricula inner join estudiantes estu on estu.id_estudiante = matri.id_estudiante inner join periodos_cursos periodo  on periodo.id_periodo_c = matri.id_per_curso inner join cursos cur on cur.id_curso = periodo.id_curso WHERE year(pag.f_pago) = 2018 ORDER BY pag.id_pago DESC; ";
                    $result = mysqli_query($cnx,$sql);
                    
                    $LISTA['data'] = array();
                    
                    while ($fila = mysqli_fetch_assoc($result))
                            {
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
                        
                        array_push($LISTA['data'],array('idpago'=>$fila['idpago'],'dni'=>str_pad($fila['dni'], 8, "0", STR_PAD_LEFT),'nombre'=>$fila['nombre'],'fpago'=>$fila['fechapago'],'documento'=>$recibo,'monto'=>$fila['monto'],'curso'=>$fila['curso'],'finicio'=>$fila['finicio'],'ftermino'=>$fila['ftermino'],'tipopago'=>$fila['tipopago']));
                            }
         } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $LISTA;
    }
    
    public function ObtenerPagosPorCurso(PagosBean $objpagobean)
            {
        
            try {
            $cn = new ConexionBD();
            $cnx = $cn->getConexionBD();
            $sql = " SELECT pag.id_pago as idpago, estu.dni as dni,concat(estu.apellido,', ',estu.nombre) as nombre,pag.id_tipo_pago as tipopago,pag.num_liquidacion as recibo, pag.num_doc as documento, pag.f_pago as fechapago,pag.monto as monto, cur.nom_curso as curso,periodo.f_inicio as finicio, periodo.f_termino as ftermino , pag.id_tipo_pago as tipopago from pagos pag inner join matriculas matri on matri.id_matricula = pag.id_matricula inner join estudiantes estu on estu.id_estudiante = matri.id_estudiante inner join periodos_cursos periodo  on periodo.id_periodo_c = matri.id_per_curso inner join cursos cur on cur.id_curso = periodo.id_curso WHERE year(pag.f_pago) = '$objpagobean->Periodo' AND periodo.id_periodo_c = '$objpagobean->PeriodoCurso' ORDER BY pag.id_pago DESC ";
            $result = mysqli_query($cnx,$sql);

            $LISTA['data'] = array();

            while ($fila = mysqli_fetch_assoc($result))
                    {
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

                    array_push($LISTA['data'],array('idpago'=>$fila['idpago'],'dni'=>str_pad($fila['dni'], 8, "0", STR_PAD_LEFT),'nombre'=>$fila['nombre'],'fpago'=>$fila['fechapago'],'documento'=>$recibo,'monto'=>$fila['monto'],'curso'=>$fila['curso'],'finicio'=>$fila['finicio'],'ftermino'=>$fila['ftermino'],'tipopago'=>$fila['tipopago']));
                    }
         } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $LISTA;
        }
        
    public function ActualizarPago(PagosBean $objpagobean)
            {
        try {
            
                $cn = new ConexionBD();
                $cnx = $cn->getConexionBD();
                
                $sql = " UPDATE `pagos` SET `id_tipo_pago` = ?, `num_liquidacion` = ?, `num_doc` = ?, `f_pago` = ?, `monto` = ? WHERE `pagos`.`id_pago` = ?; ";
                
                $stmt = $cnx->prepare($sql);
                $stmt->bind_param('isssdi',$objpagobean->IdTipoPago,$objpagobean->NumeroLiquidacion,$objpagobean->NumeroDocumento,$objpagobean->FechaPago,$objpagobean->MontoPago,$objpagobean->IdPago);
                $stmt->execute();
                
                $estado = 0;

                    $response = $stmt->get_result();
                    
                    if(mysqli_stmt_affected_rows($stmt)>0)
                        {
                            $estado = 1;
                        }else
                            {
                            echo mysqli_error($cnx);
                            }
    
                } catch (Exception $exc) {
                            echo mysqli_errno($cnx);
                        }
                return $estado;
            }
        
}
    
?>
