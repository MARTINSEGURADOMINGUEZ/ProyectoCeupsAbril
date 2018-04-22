<?php

    require_once '../UTIL/ConexionBD.php';
    require_once '../BEAN/AsistenciaBean.php';
    
    class AsistenciaDao
    {
         public function ListarParticipantes(AsistenciaBean $objasisbean)
                 {
             try {
                        $cn = new ConexionBD();
                        $cnx = $cn->getConexionBD();
                        
                        $sql = " SELECT matri.id_matricula as id, estu.apellido as apellido,estu.nombre  as nombre, estu.dni as dni from matriculas matri inner join estudiantes estu  on estu.id_estudiante = matri.id_estudiante inner JOIN periodos_cursos periodo on periodo.id_periodo_c = matri.id_per_curso WHERE periodo.id_periodo_c = '$objasisbean->Nombre_Curso' ORDER BY estu.apellido ASC; ";
                        
                        $result = mysqli_query($cnx,$sql);
                    
                        $LISTA = array();
                        
                        while ($fila = mysqli_fetch_array($result))
                             {
                                $nombre = $fila['nombre'];
                                 
                                
                                if($fila['dni']==="" || $fila['dni']=== null)
                                    {
                                       $dni=""; 
                                    }else
                                        {
                                            $dni = str_pad($fila['dni'], 8, "0", STR_PAD_LEFT);
                                        }
                                
                                $LISTA[] = array('nombre'=>$fila['apellido'].', '.$fila['nombre'],'dni'=>$dni,'nombrelimpio'=>$fila['nombrelimpio']); 
                             }
                        
                } catch (Exception $exc) {
                                 echo mysqli_error($cnx);
                             }
                return $LISTA; 
                }
                
        public function ListarControlParticipantes(AsistenciaBean $objasisbean)
                {
            try {
                        $cn = new ConexionBD();
                        $cnx = $cn->getConexionBD();
                        
                        $sql = " SELECT matri.id_matricula as idmatri,estu.dni as dni ,concat(estu.apellido,', ',estu.nombre) as nombre,condi.descripcion as tipoalu,matri.observacion as observacion ,periodo.f_inicio as finicio,periodo.f_termino as ftermino FROM matriculas matri inner join periodos_cursos periodo on periodo.id_periodo_c = matri.id_per_curso inner join condicion condi ON condi.id_condicion = matri.id_condicion_alu inner join estudiantes estu on estu.id_estudiante=matri.id_estudiante WHERE periodo.id_periodo_c = '$objasisbean->Nombre_Curso' ORDER BY estu.apellido ASC; ";
                        
                        $result = mysqli_query($cnx,$sql);
                        
                        mysqli_set_charset("UTF8");
                        mysqli_query('SET NAME "UTF8"');
                    
                        $LISTA = array();
                        
                        while ($fila = mysqli_fetch_array($result))
                             {
                                $dni = $fila['dni'];
                                $nombre = $fila['nombre'];
                                $observacion = $fila['observacion'];
                                $tipoalu = $fila['tipoalu'];
                                $fechaini = $fila['finicio'];
                                $fechafin = $fila['ftermino'];
                                
                                $LISTA[] = array('dni'=>$dni,'nombre'=>'  '.$nombre,'observacion'=>'  '.$observacion,'tipoalu'=>$tipoalu,'inicio'=>$fechaini,'fin'=>$fechafin); 
                             }
                    
                } catch (Exception $exc) {
                                $LISTA[] = array('dni'=>'error','nombre'=>'error','observacion'=>'error','tipoalu'=>'error');
                            }
                return $LISTA;
                }
                
        public function ListarParticipantesCertificado(AsistenciaBean $objasisbean)
                {
            try {
                        $cn = new ConexionBD();
                        $cnx = $cn->getConexionBD();
                        
                        $sql = " select al.dni_alumno as dni,concat(al.apellido_alumno,', ',al.nombre_alumno) as nombre,ma.observacion as observacion, tipoalu.nombre_tipoalu as tipoalu, cu.fecha_inicio as inicio, cu.fecha_fin as fin FROM matricula ma inner join alumno al on al.id_alumno = ma.id_alumno inner join curso cu on cu.id_curso = ma.id_curso inner join tipoalumno tipoalu on tipoalu.id_tipoalu = ma.id_tipoalumno WHERE cu.nombre_curso LIKE '%$objasisbean->Nombre_Curso%' ORDER BY al.apellido_alumno ASC ";
                        
                        $result = mysqli_query($cnx,$sql);
                        
                        mysqli_query($cnx,"SET NAMES 'utf8'");
                                            
                        $LISTA['data'] = array();
                        
                        while ($fila = mysqli_fetch_array($result))
                             {
                                $dni = $fila['dni'];
                                $nombre = $fila['nombre'];
                                $observacion = $fila['observacion'];
                                $tipoalu = $fila['tipoalu'];
                                
                                array_push($LISTA['data'],array('dni'=>$dni,'nombre'=>$nombre,'observacion'=>$observacion,'tipoalu'=>$tipoalu)); 
                             }
                    
                } catch (Exception $exc) {
                                $LISTA[] = array('dni'=>'error','nombre'=>'error','observacion'=>'error','tipoalu'=>'error');
                            }
                return $LISTA;
                }
                
                
    }

?>
