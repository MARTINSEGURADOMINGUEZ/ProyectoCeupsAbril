<?php

require_once '../BEAN/PreInscritoBean.php';
require_once '../UTIL/ConexionBD.php';

class PreInscritoDao {
    
    public function ObtenerPreInscritos()
            {
        try {
            $cn = new ConexionBD();
                    $cnx = $cn->getConexionBD();
                $sql = " SELECT preins.id_pre_per_cur as id, preins.f_contacto as fecha, concat(estu.apellido,', ',estu.nombre) as nombre,cur.nom_curso as curso,cur.id_curso as idcurso,estu.email_p as emailp, estu.celular as celular ,condi.descripcion as tipoinscri,preins.observacion as observacion,difu.id_difusion as difu from pre_per_cur preins inner JOIN estudiantes estu ON preins.id_preinscrito=estu.id_estudiante INNER JOIN cursos cur on cur.id_curso=preins.id_curso inner JOIN condicion condi on condi.id_condicion =  preins.id_condicion inner JOIN difusion difu on difu.id_difusion= preins.id_difusion WHERE YEAR(f_contacto) = 2018 ORDER BY f_contacto DESC; ";
                    $result = mysqli_query($cnx,$sql);
                    
                    $LISTA['data'] = array();
                    
                    while ($fila = mysqli_fetch_assoc($result))
                            {
                        array_push($LISTA['data'],array('id'=>$fila['id'],'fecha'=>$fila['fecha'],'celular'=>$fila['celular'],'nombre'=>$fila['nombre'],'curso'=>$fila['curso'],'idcurso'=>$fila['idcurso'],'email' =>$fila['emailp'],'observacion'=>$fila['observacion'],'difu'=>$fila['difu']));
                            }
         } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $LISTA;
        }
    
    public function ObtenerPreInscritosFiltro(PreInscritoBean $objpreinsbean)
            {
        try {
                $cn = new ConexionBD();
                    $cnx = $cn->getConexionBD();
                    $sql = " SELECT preins.id_pre_per_cur as id, preins.f_contacto as fecha, concat(estu.apellido,', ',estu.nombre) as nombre,cur.nom_curso as curso,cur.id_curso as idcurso,estu.email_p as emailp, estu.celular as celular ,condi.descripcion as tipoinscri,preins.observacion as observacion,difu.id_difusion as difu from pre_per_cur preins inner JOIN estudiantes estu ON preins.id_preinscrito=estu.id_estudiante INNER JOIN cursos cur on cur.id_curso=preins.id_curso inner JOIN condicion condi on condi.id_condicion =  preins.id_condicion inner JOIN difusion difu on difu.id_difusion= preins.id_difusion WHERE cur.id_curso = ? AND YEAR(f_contacto) = ? ORDER BY f_contacto DESC; ";
                    
                    $stmt = $cnx->prepare($sql);
                    $stmt->bind_param('si',$objpreinsbean->curso,$objpreinsbean->fecha);
                    $stmt->execute();
                    
                    $response = $stmt->get_result();
                    
                    $LISTA['data'] = array();
                    
                    while ($fila = mysqli_fetch_assoc($response))
                            {
                        array_push($LISTA['data'],array('id'=>$fila['id'],'fecha'=>$fila['fecha'],'celular'=>$fila['celular'],'nombre'=>$fila['nombre'],'tipoinscri'=>$fila['tipoinscri'],'email' =>$fila['emailp'],'observacion'=>$fila['observacion'],'difu'=>$fila['difu']));
                            }
         } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $LISTA;
            }
      
    public function InsertarPreInscritos(PreInscritoBean $objpreinsbean)
            {
            try {
                $cn = new ConexionBD();
                $cnx = $cn->getConexionBD();
                $sql = " INSERT INTO `pre_per_cur` (`id_preinscrito`, `id_curso`, `id_condicion`, `id_difusion`, `fuera_de_fecha`, `f_contacto`, `observacion`) VALUES (?,?,?,?,?,?,?); ";
                $stmt = $cnx->prepare($sql);
                $stmt->bind_param('iiiiiss',$objpreinsbean->alumno,$objpreinsbean->curso,$objpreinsbean->tipoalumno,$objpreinsbean->difucion,$objpreinsbean->fechacont,$objpreinsbean->fecha,$objpreinsbean->observacion);
                $stmt->execute();
                
                $estado = 0;
                            
                $response = $stmt->get_result();
                            
                if(mysqli_stmt_affected_rows($stmt)>0)
                {
                $estado = 1;
                                }else
                                    {
                                    $estado = 2;
                                    echo mysqli_error($cnx).'/n';
                                    }
                
                } catch (Exception $exc){
                    $estado = 0;
                    echo mysqli_errno($cnx);
                }
            return $estado;   
            }
    
    public function ObtenerCursoID($curso){
                try { $cn = new ConexionBD();
                    $cnx = $cn->getConexionBD();
                    $sql = " SELECT id_curso as Id from cursos WHERE nom_curso = '$curso'; ";
                    $result = mysqli_query($cnx,$sql);
                    $ret = mysqli_fetch_array($result);
                    $Id = $ret['Id'];
                    
                    } catch (Exception $exc) {
                                    echo $exc->getTraceAsString();
                                    $Id= 0;
                                }
                    return $Id;          
                    }
    public function ObtenerAlumnoID($Alumno)
            {
        try { $cn = new ConexionBD();
                    $cnx = $cn->getConexionBD();
                    //$sql = " SELECT id_estudiante as Id FROM `estudiantes` WHERE concat(apellido,' ',nombre) LIKE '%$Alumno%'; ";
                    $sql = " SELECT id_estudiante as Id FROM `estudiantes` WHERE dni LIKE '%$Alumno%'; ";
                    $result = mysqli_query($cnx,$sql);
                    $ret = mysqli_fetch_array($result);
                    $Id = $ret['Id'];
                    
                    } catch (Exception $exc) {
                                    echo $exc->getTraceAsString();
                                    $Id= 0;
                                }
                    return $Id;   
            }
    }

?>
