<?php

    require_once '../BEAN/MatriculaBean.php';
    require_once '../BEAN/PagoBean.php';
    require_once '../UTIL/ConexionBD.php';

class MatriculaDao {
  
    public function ObtenerMatriculados()
            {
        try {
                $mesinicio = (int)date('m');
                $mesproximo = (int)date('m')+1;
                
                $cn = new ConexionBD();
                $cnx = $cn->getConexionBD();
                
                //ESTE ES UN NUEVO SCRIPT , POR ALGUN MOTIVO NO CAPTURABA 1 REGISTRO , FUE EXTRAÑO PERO SE SOLUCIONO SE MIRO EL SCRIPT DEL CONTADOR DE ALUMNOS DEL HOME.
                $sql = " SELECT matri.id_matricula as id,estu.dni as dni,concat(estu.apellido,', ',estu.nombre) as nombre,estu.email_p as email,con.id_condicion as condicion , peri.f_inicio as fechainicio,peri.f_termino as fechafin,cur.nom_curso as curso,matri.observacion as observacion,id_documento_emitido as documento,id_situacion_final as situacion, recogio_certificado as recogio from periodos_cursos peri inner JOIN cursos cur on cur.id_curso = peri.id_curso inner join matriculas matri on matri.id_per_curso = peri.id_periodo_c inner join estudiantes estu on estu.id_estudiante = matri.id_estudiante inner join condicion con on con.id_condicion = matri.id_condicion_alu WHERE year(peri.f_inicio)=2018 AND (month(peri.f_termino)='$mesinicio' OR month(peri.f_termino)='$mesproximo') ORDER BY peri.id_periodo_c DESC; ";
                
                $result = mysqli_query($cnx,$sql);
                
                $LISTA['data'] = array();
                
                while ($fila = mysqli_fetch_assoc($result))
                            {
                        array_push($LISTA['data'],array('id'=>$fila['id'],'dni'=>str_pad($fila['dni'], 8, "0", STR_PAD_LEFT),'nombre'=>$fila['nombre'],'curso'=>$fila['curso'],'condicion'=>$fila['condicion'],'fechaini'=>$fila['fechainicio'],'fechafin'=>$fila['fechafin'],'observacion'=>$fila['observacion'],'email'=>$fila['email'],'documento'=>$fila['documento'],'situacion'=>$fila['situacion'],'recogio'=>$fila['recogio']));
                            }
    
            } catch (Exception $exc) {
                        echo $exc->getTraceAsString();
                    }
                
            return $LISTA;        
            }
            
    public function RealizarMatricula(MatriculaBean $objmatribean,PagosBean $objpagobean)
            {
        try {
                $cn = new ConexionBD();
                $cnx = $cn->getConexionBD();
                $sql = " INSERT INTO `matriculas` (`id_condicion_alu`, `id_estudiante`, `id_per_curso`, `observacion`,`nota_final`,`deuda`, `recogio_certificado`, `matricula`, `f_registro`, `listar`, `id_situacion_final`, `id_documento_emitido`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?); ";
                
                $stmt = $cnx->prepare($sql);
                $stmt->bind_param('iiisidsisiii',$objmatribean->IdTipoEstudiante,$objmatribean->IdEstudiante,$objmatribean->IdCurso,$objmatribean->Observación,$objmatribean->NotaFinal,$objmatribean->Deuda,$objmatribean->RegocioCertificado,$objmatribean->matricula,$objmatribean->FechaRegistro,$objmatribean->listar,$objmatribean->SituacionFinal,$objmatribean->IdDocumento);
                $stmt->execute();
                
                $estado = 0;
                
                $response = $stmt->get_result();
                            
                if(mysqli_stmt_affected_rows($stmt)>0)
                {
                $estado = 1;
                    MatriculaDao::RealizarPagoMatricula(mysqli_insert_id($cnx),$objpagobean);
                 }else
                {
                     $estado = 2;
                echo mysqli_error($cnx);
                }
                
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
                    }
            
          return $estado;          
        }
        
    public static function RealizarPagoMatricula($IdMatricula, PagosBean $objpagobean)
            {
        try {
                $cn = new ConexionBD();
                $cnx = $cn->getConexionBD();
                
                $sql = " INSERT INTO `pagos` (`id_matricula`, `id_tipo_pago`, `num_liquidacion`, `num_doc`, `f_pago`, `monto`) VALUES (?,?,?,?,?,?); ";
                
                $stmt = $cnx->prepare($sql);
                $stmt->bind_param('iisssd',$IdMatricula,$objpagobean->IdTipoPago,$objpagobean->NumeroLiquidacion,$objpagobean->NumeroDocumento,$objpagobean->FechaPago,$objpagobean->MontoPago);
                $stmt->execute();
                
                $response = $stmt->get_result();
                    
                     $estado = 0;
                            
                    if(mysqli_stmt_affected_rows($stmt)>0)
                        {
                                $estado = 1;
                        }else
                            {
                           echo mysqli_error($cnx);
                            }
                
                } catch (Exception $exc) {
                            echo $exc->getTraceAsString();
                        }
            
                 return $estado;       
                }
            
    public function ObtenerCostoCurso(MatriculaBean $objmatribean)
            {   
        try {
                $cn = new ConexionBD();
                $cnx = $cn->getConexionBD();
                
                $sql = " SELECT peri.cost_pg as general, peri.cost_eupg as ceupseupg,peri.cost_univ_nac as  pregrado, peri.cost_doc_adm as docenteadmin FROM periodos_cursos peri WHERE id_periodo_c = $objmatribean->NombreCurso; ";
                
                $result = mysqli_query($cnx,$sql);
                    
                     $LISTA = array();
                     
                     while ($fila = mysqli_fetch_assoc($result))
                             {
                                $LISTA[] = array('general'=>$fila['general'],'ceupseupg'=>$fila['ceupseupg'],'pregrado'=>$fila['pregrado'],'docenteadmin'=>$fila['docenteadmin']); 
                             }
                
            } catch (Exception $exc) {
                        echo $exc->getTraceAsString();
                    }
                return $LISTA;
            }
            
        public function MofificarMatriculaAlumno(MatriculaBean $objmatribean)
                {
            try {
                    $cn = new ConexionBD();
                    $cnx = $cn->getConexionBD();
                    
                    $sql = " UPDATE `matriculas` SET `id_condicion_alu` = '$objmatribean->IdTipoEstudiante', `observacion` = '$objmatribean->Observación', `recogio_certificado` = '$objmatribean->RegocioCertificado', `id_situacion_final` = $objmatribean->SituacionFinal, `id_documento_emitido` = '$objmatribean->IdDocumento' WHERE `matriculas`.`id_matricula` = ?; "; 
                
                    $stmt = $cnx->prepare($sql);
                    $stmt->bind_param('i',$objmatribean->IdMatricula);
                    $stmt->execute();

                    $estado = 0;

                    $response = $stmt->get_result();
                    
                    if(mysqli_stmt_affected_rows($stmt)>0)
                        {
                            $estado = 1;
                        }else
                            {
                                $estado = 0;
                                echo mysqli_error($cnx);
                            }
                    
            } catch (Exception $exc) {
                                echo mysqli_errno($cnx);
                            }
                          return $estado;
                        }
                        
            public  function ObtenerCursosParaMatricula($busqueda)
                    {
                try {
                    
                     $mesinicio = (int)date('m');
                     $mesproximo = (int)date('m')+1;
                
                    $cn = new ConexionBD();
                    $cnx = $cn->getConexionBD();
                    $sql = " SELECT periodo.id_periodo_c as id, concat(periodo.id_periodo_c,' ',cur.nom_curso) as nombre from periodos_cursos periodo inner JOIN cursos cur on cur.id_curso = periodo.id_curso WHERE cur.nom_curso LIKE '%$busqueda%' AND YEAR(periodo.f_inicio)=2018 AND (month(periodo.f_inicio)='$mesinicio' OR month(periodo.f_termino)='$mesproximo'); "; 
                    $result = mysqli_query($cnx,$sql);
                    
                     $LISTA = array();
                     
                     while ($fila = mysqli_fetch_assoc($result))
                             {
                                $LISTA[] = array('id'=>$fila['id'],'nombre'=>$fila['nombre']); 
                             }
                             
                    } catch (Exception $exc) {
                                        echo $exc->getTraceAsString();
                                    }
                     return $LISTA;               
                    }
    
}

?>