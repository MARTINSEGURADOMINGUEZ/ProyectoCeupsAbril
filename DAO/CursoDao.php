<?php

    require_once '../UTIL/ConexionBD.php';
    require_once '../BEAN/CursoBean.php';
    
    class CursoDao {

     public function InsertarCursoPeriodo(CursoBean $objcurbean)
             {
                try {
                         $cn = new ConexionBD();
                    $cnx = $cn->getConexionBD();
                    $sql = " INSERT INTO `periodos_cursos` (`id_curso`, `f_inicio`, `f_termino`,`cantidad_participantes`,`costo_general`, `cost_pg`, `cost_univ_nac`, `cost_univ_part`, `cost_eupg`, `cost_ceups`, `cost_doc_adm`, `horas`, `creditos`, `notaminima`) VALUES ('$objcurbean->nombre_curso','$objcurbean->fecha_inicio','$objcurbean->fecha_fin','$objcurbean->cantidad_participante','$objcurbean->costo_general','$objcurbean->costo_publicogeneral','$objcurbean->costo_pregrado','$objcurbean->costo_pregrado','$objcurbean->costo_ceups_eupg','$objcurbean->costo_ceups_eupg','$objcurbean->costo_docente_admin','$objcurbean->horas_curso','$objcurbean->creditos_curso','$objcurbean->nota_minima'); ";
                    
                    $result = mysqli_query($cnx, $sql);
                    
                            
                    if(mysqli_affected_rows($cnx)>0)
                        {
                                $estado = 1;
                                
                        }else
                            {
                                echo mysqli_error($cnx);
                            $estado = 0;
                            }
                    
                } catch (Exception $exc) {
                             echo $exc->getTraceAsString();
                         }
            
                return $estado;         
                }
                
        public function ActualizarCursoPeriodo(CursoBean $objcursobean)
                {
            try {
                    $cn = new ConexionBD();
                    $cnx = $cn->getConexionBD();
                    
                    $sql = " UPDATE `periodos_cursos` SET `f_inicio` = ?, `f_termino` = ?, `horas` = ?, `creditos` = ?, `notaminima` = ? WHERE `periodos_cursos`.`id_periodo_c` = ?; ";
                    
                    $stmt = $cnx->prepare($sql);
                    $stmt->bind_param('ssiiii',$objcursobean->fecha_inicio,$objcursobean->fecha_fin,$objcursobean->horas_curso,$objcursobean->creditos_curso,$objcursobean->nota_minima,$objcursobean->periodo_curso);
                    $stmt->execute();

                    $estado = 0;

                    $response = $stmt->get_result();
                    
                    if(mysqli_stmt_affected_rows($stmt)>0)
                        {
                            $estado = 1;
                        }else
                            {
                                $estado = 2;
                            echo mysqli_error($cnx);
                            }
                    } catch (Exception $exc) {
                                      echo mysqli_error($cnx);
                                  }
                    return $estado; 
                }
        
        public function ObtenerNombreCurso(CursoBean $objcursobean)
                {
            try {
                    $cn = new ConexionBD();
                    $cnx = $cn->getConexionBD();
                    
                    $sql = " SELECT cur.nom_curso as nombre from periodos_cursos periodo inner join cursos cur on cur.id_curso = periodo.id_curso WHERE periodo.id_periodo_c = '$objcursobean->id_curso'; ";
                    
                    $resultado = mysqli_query($cnx,$sql);
                    
                    $respuesta = mysqli_fetch_assoc($resultado) ;
                    
                    $LISTA = array();
                    
                    $nombre = CursoDao::quitar_tildes($respuesta['nombre']);
                    
                    $LISTA[] = array('nombre'=>$nombre);
                    
                    } catch (Exception $exc) {
                        echo mysqli_error($cnx);
                    }
                return $LISTA;
            }
                
        public function ObtenerFechasCurso($periodo)
                {
            try {
                    $cn = new ConexionBD();
                    $cnx = $cn->getConexionBD();
                    $sql = " SELECT periodo.id_periodo_c as id, periodo.f_inicio as finicio, periodo.f_termino as ftermino FROM periodos_cursos periodo WHERE periodo.id_periodo_c = '$periodo'; "; 
                    $result = mysqli_query($cnx,$sql);
                    
                     $LISTA = array();
                     
                     while ($fila = mysqli_fetch_assoc($result))
                             {
                                $LISTA[] = array('id'=>$fila['id'],'finicio'=>$fila['finicio'],'ftermino'=>$fila['ftermino']); 
                             }
                
                } catch (Exception $exc) {
                                echo $exc->getTraceAsString();
                            }
                    return $LISTA;
                }

                public function InsertarCurso(CursoBean $objcurbean)
                {
            try {
                    $cn = new ConexionBD();
                    $cnx = $cn->getConexionBD();
                    $sql = " INSERT INTO `periodos_cursos` (`id_periodo_c`, `id_curso`, `id_grupo_profesor`, `f_inicio`, `f_termino`, `numero`, `cost_pg`, `cost_univ_nac`, `cost_univ_part`, `cost_eupg`, `cost_ceups`, `cost_doc_adm`, `horas`, `creditos`, `notaminima`) VALUES (NULL, '178', NULL, '2018-04-03', '2018-04-04', '1', '5', '5', '5', '5', '5', '5', '5', '5', '5'); ";
                    $stmt = $cnx->prepare($sql);
                    $stmt->bind_param('isi',$objcurbean->id_tipocurso,$objcurbean->nombre_curso,$objcurbean->taller_curso);
                    $stmt->execute();
                    
                    $response = $stmt->get_result();
                    
                    $estado = 0;
                            
                    if(mysqli_stmt_affected_rows($stmt)>0)
                        {
                            $estado = 1;
                        }else
                            {
                            $estado = 0;
                            }
                    
                    
                } catch (Exception $exc) {
                                echo $exc->getTraceAsString();
                            }
                    return $estado;
                }
                
                public function ObtenerCursoPorId($Idcurso)
                        {
                    try {
                        
                        $cn = new ConexionBD();
                        $cnx = $cn->getConexionBD();
                        $sql = " select cur.nom_curso as nombre,periodo.id_categoria_curso as idcatecurso,periodo.f_inicio as finicio,periodo.f_termino as ftermino from periodos_cursos periodo inner JOIN cursos cur on cur.id_curso = periodo.id_curso WHERE periodo.id_periodo_c = '$Idcurso'; "; 
                        $result = mysqli_query($cnx,$sql);
                        
                        $LISTA = array();
                        
                       $cadena = mysqli_fetch_assoc($result);
                        
                        $LISTA[] = array('nombre'=>$cadena['nombre'],'idcatecurso'=>$cadena['idcatecurso'],'finicio'=>$cadena['finicio'],'ftermino'=>$cadena['ftermino']);
                                
                        } catch (Exception $exc) {
                                                echo mysqli_error($cnx);
                                            }
                        return $LISTA;                   
                        }


        public static function IngresarNombreGrupoProfesorCurso($id,$nombre)
                {
            try {   
                    $cn = new ConexionBD();
                    $cnx = $cn->getConexionBD();
                    $sql = " INSERT INTO `grupo_profesorcurso` (`id_grupo`,`nombre_grupo`) VALUES (?,?); ";
                    $stmt = $cnx->prepare($sql);
                    $stmt->bind_param('is',$id,$nombre);
                    $stmt->execute();
                    
                    $response = $stmt->get_result();
                    
                     $estado = 0;
                            
                    if(mysqli_stmt_affected_rows($stmt)>0)
                        {
                                $estado = 1;
                        }else
                            {
                            $estado = 0;
                            }
    
                    } catch (Exception $exc) {
                                    echo $exc->getTraceAsString();
                                }
                
                        return $estado;        
                    }        
            
            public  function ObtenerCursos($busqueda)
                    {
                try {
                    $cn = new ConexionBD();
                    $cnx = $cn->getConexionBD();
                    $sql = " Select id_curso as id, nom_curso as nombre from cursos WHERE nom_curso LIKE '%$busqueda%'; "; 
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
            
            public function ObtenerCursosSinDocentes()
                    {
                try {
                        $cn = new ConexionBD();
                    $cnx = $cn->getConexionBD();
                    $sql = " SELECT id_periodo_c as id,cur.id_curso as idcurso,periodo.f_inicio as finicio,periodo.f_termino as ftermino, cur.nom_curso as curso,periodo.horas as horas , periodo.creditos as credito,periodo.notaminima as notamin from periodos_cursos periodo inner join cursos cur on cur.id_curso = periodo.id_curso WHERE year(periodo.f_inicio) = 2018 GROUP BY cur.nom_curso ORDER BY periodo.id_periodo_c DESC; "; 
                    $result = mysqli_query($cnx,$sql);
                    
                    $LISTA['data'] = array();
                     
                    while ($fila = mysqli_fetch_assoc($result))
                             {
                       array_push($LISTA['data'],array('id'=>$fila['id'],'idcurso'=>$fila['idcurso'],'curso'=> CursoDao::quitar_tildes($fila['curso']),'fechaini'=>$fila['finicio'],'fechafin'=>$fila['ftermino'],'horas'=>$fila['horas'],'credito'=>$fila['credito'],'notamin'=>$fila['notamin'])); 
                             }
                             
                    } catch (Exception $exc) {
                                        echo $exc->getTraceAsString();
                                    }
                     return $LISTA;               
                    }
                    
              public function ObtenerCursosPorPeriodos($busqueda,$periodo)
                      {
                  try {
                      $cn = new ConexionBD();
                      $cnx = $cn->getConexionBD();
                      $sql = " SELECT id_periodo_c AS id, CONCAT(cur.nom_curso,' ', periodo.f_inicio,' | ',periodo.f_termino) as nombre,cur.nom_curso as nombrelimpio  FROM periodos_cursos periodo inner JOIN cursos cur on cur.id_curso = periodo.id_curso WHERE cur.nom_curso LIKE '%$busqueda%' AND year(periodo.f_inicio)='$periodo' ORDER BY periodo.f_termino DESC; ";
                      $result = mysqli_query($cnx,$sql);
                        
                        $LISTA = array();
                        
                         while ($fila = mysqli_fetch_assoc($result))
                             {
                      $LISTA[] = array('id'=>$fila['id'],'nombre'=>$fila['nombre'],'nombrelimpio'=>$fila['nombrelimpio']); 
                             }
                        } catch (Exception $exc) {
                                              echo $exc->getTraceAsString();
                                          }
                         return $LISTA;
                      }
                      
                      public function ObtenerCursosMatricula($busqueda)
                      {
                  try {
                      $cn = new ConexionBD();
                      $cnx = $cn->getConexionBD();
                      $sql = " SELECT periodo.id_periodo_c AS id, CONCAT(cur.nom_curso,' ', periodo.f_inicio,' | ',periodo.f_termino) as nombre,cur.nom_curso as nombrelimpio, periodo.cantidad_participantes as cantipartici, periodo.costo_general as costogeneral,periodo.id_categoria_curso as idcatecurso FROM periodos_cursos periodo inner JOIN cursos cur on cur.id_curso = periodo.id_curso WHERE cur.nom_curso LIKE '%$busqueda%' AND year(periodo.f_inicio)= 2018 ORDER BY periodo.f_termino DESC; ";
                      $result = mysqli_query($cnx,$sql);
                        
                        $LISTA = array();
                        
                         while ($fila = mysqli_fetch_assoc($result))
                             {
                      $LISTA[] = array('id'=>$fila['id'],'nombre'=>$fila['nombre'],'nombrelimpio'=>$fila['nombrelimpio'],'cantipartici'=>$fila['cantipartici'],'costogeneral'=>$fila['costogeneral'],'idcatecurso'=>$fila['idcatecurso']); 
                             }
                        } catch (Exception $exc) {
                                              echo $exc->getTraceAsString();
                                          }
                         return $LISTA;
                      }
                      
            public function ObtenerCursosPorPeriodosSinFecha($busqueda,$periodo)
                      {
                  try {
                      $cn = new ConexionBD();
                      $cnx = $cn->getConexionBD();
                      $sql = "SELECT id_periodo_c AS id, concat(cur.nom_curso,' ', periodo.f_inicio,' | ',periodo.f_termino) as nombre FROM periodos_cursos periodo inner JOIN cursos cur on cur.id_curso = periodo.id_curso WHERE cur.nom_curso LIKE '%$busqueda%' AND year(periodo.f_inicio)='$periodo'; ";
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
                    
            public function ObtenerCursosParaDocentes($busqueda)
                    {
                try {
                    
                        $cn = new ConexionBD();
                        $cnx = $cn->getConexionBD();
                        
                        $sql = " SELECT nombre_curso as nombre from curso WHERE nombre_curso LIKE '%$busqueda%'; "; 
                        $result = mysqli_query($cnx,$sql);
                        
                        $LISTA = array();
                        
                         while ($fila = mysqli_fetch_assoc($result))
                             {
                      $LISTA[] = array('nombre'=>$fila['nombre']); 
                             }
                        
                } catch (Exception $exc) {
                                    echo $exc->getTraceAsString();
                                }
                    return $LISTA;
                    }
            
            public function ObtenerGrupoID(CursoBean $objcurbean){
                try { $cn = new ConexionBD();
                    $cnx = $cn->getConexionBD();
                    $sql = " select id_curso as Id from curso where nombre_curso LIKE '%$objcurbean->nombre_curso%'; ";
                    $result = mysqli_query($cnx,$sql);
                    $ret = mysqli_fetch_array($result);
                    $Id = $ret['Id'];
                    
                    } catch (Exception $exc) {
                                    echo $exc->getTraceAsString();
                                    $Id= 0;
                                }
                    return $Id;          
                    }
            public function ObtenerInfoCursos()
                    {
                try {
                        $cn = new ConexionBD();
                    $cnx = $cn->getConexionBD();
                    $sql = " select cur.nombre_curso as NOMBRE,cur.fecha_inicio as FECHAINI, cur.fecha_fin as FECHAFIN, COUNT(ma.id_matricula) as TOTALMATRI from curso cur inner JOIN matricula ma on ma.id_curso = cur.id_curso GROUP BY cur.nombre_curso; "; 
                    $result = mysqli_query($cnx,$sql);
                    
                    $LISTA['data'] = array();
                     
                     while ($fila = mysqli_fetch_assoc($result))
                             {
                         array_push($LISTA['data'],array('NOMBRE'=>$fila['NOMBRE'],'FECHAINI'=>$fila['FECHAINI'],'FECHAFIN'=>$fila['FECHAFIN'],'TOTALMATRI'=>$fila['TOTALMATRI'])); 
                             }    
                        } catch (Exception $exc) {
                                            echo $exc->getTraceAsString();
                                        }
                    return $LISTA;               
                    }
                    
        static function quitar_tildes($cadena) {
        //$cade = utf8_decode($cadena);
        $no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹");
        $permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");
        $texto = str_replace($no_permitidas, $permitidas ,$cadena);
        return $texto;
        }
        
    }

?>