<?php
    
    require_once '../UTIL/ConexionBD.php';
    require_once '../BEAN/AlumnoBean.php';

    class AlumnoDao
    {
        
        public function BuscarAlumno($busqueda)
                {
            try {
                    $cn = new ConexionBD();
                    $cnx = $cn->getConexionBD();
                    
                    $LISTA = array();
                    
                    $sql = " SELECT id_estudiante as id, dni as dni ,concat(', NOMBRE: ',apellido,', ',nombre) as nombre, email_p as email FROM `estudiantes` WHERE ";
                    
                    if(ctype_digit($busqueda))
                        {
                          $sql = $sql." dni LIKE '%$busqueda%'; ";  
                        }else
                            {
                            $sql = $sql." nombre LIKE '%$busqueda%' OR apellido LIKE '%$busqueda%'; ";
                            }
                    
                    mysqli_set_charset ($cnx ,'utf8');
                    //mysqli_query("SET NAMES 'utf8'");
                    $result = mysqli_query($cnx,$sql);
                     
                     while ($fila = mysqli_fetch_assoc($result))
                             {
                                $dni = str_pad($fila['dni'], 8, "0", STR_PAD_LEFT);
                                if($fila['email']===null || $fila['email']==="")
                                    {
                                       $email = "NO REGISTRADO";
                                    }else
                                        {
                                            $email = $fila['email'];
                                        }
                                
                                $LISTA[] = array('id'=>$fila['id'],'nombre'=>'DNI: '.$dni.$fila['nombre'],'email'=>$email); 
                             }
                } catch (Exception $exc) {
                                echo $exc->getTraceAsString();
                            }
                            return $LISTA;
                        }
                        
        static function Sustituto_Cadena($rb){ 
        ## Sustituyo caracteres en la cadena final
        $rb = str_replace("Ã¡", "&aacute;", $rb);
        $rb = str_replace("Ã©", "&eacute;", $rb);
        $rb = str_replace("Â®", "&reg;", $rb);
        $rb = str_replace("Ã­", "&iacute;", $rb);
        $rb = str_replace("ï¿½", "&iacute;", $rb);
        $rb = str_replace("Ã³", "&oacute;", $rb);
        $rb = str_replace("Ãº", "&uacute;", $rb);
        $rb = str_replace("n~", "&ntilde;", $rb);
        $rb = str_replace("Âº", "&ordm;", $rb);
        $rb = str_replace("Âª", "&ordf;", $rb);
        $rb = str_replace("ÃƒÂ¡", "&aacute;", $rb);
        $rb = str_replace("Ã±", "&ntilde;", $rb);
        $rb = str_replace("Ã‘", "&Ntilde;", $rb);
        $rb = str_replace("ÃƒÂ±", "&ntilde;", $rb);
        $rb = str_replace("n~", "&ntilde;", $rb);
        $rb = str_replace("Ãš", "&Uacute;", $rb);
        return $rb;
        } 
        
        public function ObtenerAlumnos()
        {
            try {
                
                    $cn = new ConexionBD();
                    $cnx = $cn->getConexionBD();
                    $sql = " select id_estudiante as id,dni as dni,nombre as nombre, apellido as apellido , concat(apellido,', ',nombre) as nombres,celular as celular, telefono as telefono , distrito as distrito , direccion as domicilio , email_p as emailperso, email_i as emailinsti, nom_emp as empresa, cargo_emp as cargo, tel_emp as telefonoempresa, dir_emp as direccionempresa, dis_emp as distritoempresa from estudiantes where `suscrito` = '1'  ORDER BY id_estudiante DESC ";
                    $result = mysqli_query($cnx,$sql);
                    
                    $LISTA['data'] = array();
                    
                    while ($fila = mysqli_fetch_assoc($result))
                            {
                        array_push($LISTA['data'],array('id'=>$fila['id'],'dni'=>str_pad($fila['dni'], 8, "0", STR_PAD_LEFT),'nombre'=>$fila['nombre'],'apellido'=>$fila['apellido'],'nombres'=> AlumnoDao::Sustituto_Cadena($fila['nombres']),'celular'=>$fila['celular'],'telefono'=>$fila['telefono'],'distrito'=>$fila['distrito'],'domicilio'=>$fila['domicilio'],'emailperso'=>$fila['emailperso'],'emailinsti'=>$fila['emailinsti'],'empresa'=>$fila['empresa'],'cargo'=>$fila['cargo'],'telefonoempresa'=>$fila['telefonoempresa'],'direccionempresa'=>$fila['direccionempresa'],'distritoempresa'=>$fila['distritoempresa']));
                            }
                    
                
            } catch (Exception $exc) {
                
            }
                
            return $LISTA;
            }
            
        public function InsertarAlumno(AlumnoBean $objalbean)
                {
                try {
                    
                    $cn = new ConexionBD();
                    $cnx = $cn->getConexionBD();
                   
                    $sql = " INSERT INTO `estudiantes` (`dni`, `nombre`, `apellido`,`celular`, `telefono`,`email_p`,`email_i`,`observacion`,`distrito`, `direccion`, `nom_emp`, `cargo_emp`, `tel_emp`,`dis_emp`, `dir_emp`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?); ";
                    $stmt = $cnx->prepare($sql);
                    $stmt->bind_param('sssssssssssssss',$objalbean->alu_DNI,$objalbean->alu_NOMBRE,$objalbean->alu_APELLIDO,$objalbean->alu_CELULAR,$objalbean->alu_TELEFONO,$objalbean->alu_EMAILPERSO,$objalbean->alu_EMAILINSTI,$objalbean->alu_OBSERVACION,$objalbean->alu_DISTRITO,$objalbean->alu_DOMICILIO,$objalbean->alu_EMPRESA,$objalbean->alu_CARGOAREA,$objalbean->alu_TELEFONOEMPRESA,$objalbean->alu_DISTRITOEMPRESA,$objalbean->alu_DIRECCIONEMPRESA);
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
                                    $estado = 0;
                                }
                
                        return $estado;        
                    }
                    
        public function InsertarAlumnoPreInscrito(AlumnoBean $objalbean)
                {
            try {
                    $cn = new ConexionBD();
                    $cnx = $cn->getConexionBD();
                   
                    $sql = " INSERT INTO `estudiantes` (`dni`,`nombre`,`apellido`,`celular`, `telefono`,`email_p`,`email_i`,`anexo`) VALUES (?,?,?,?,?,?,?); ";
                    $stmt = $cnx->prepare($sql);
                    $stmt->bind_param('ssssssss',$objalbean->alu_NOMBRE,$objalbean->alu_APELLIDO,$objalbean->alu_CELULAR,$objalbean->alu_TELEFONO,$objalbean->alu_EMAILPERSO,$objalbean->alu_EMAILINSTI,$objalbean->alu_ANEXO);
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
                                    echo $exc->getTraceAsString();
                                }
                
                                return $estado;           
                    }
                    
                    public function BuscarDniAlumno(AlumnoBean $objalubean)
                            {
                        try {
                                $cn = new ConexionBD();
                                $cnx = $cn->getConexionBD();
                                
                                $sql = " select id_estudiante as id, concat(apellido,', ',nombre) as nombre from estudiantes WHERE dni = $objalubean->alu_DNI ;";
                                
                                $result = mysqli_query($cnx,$sql);
                                
                                $lista = array();
                                
                                if(mysqli_num_rows($result)>0)
                                    {
                                      $row = mysqli_fetch_assoc($result);
                                      $id = $row['id'];
                                      $nombre = $row['nombre'];
                                      
                                      $lista[] = array('estado'=>'success','id'=>$id,'nombre'=>$nombre);
                                      
                                    }else
                                        {
                                        $lista[] = array('estado'=>'failed');
                                        }
                                
                        } catch (Exception $exc) {
                           
                        }
                        return $lista;
                        }
                        
          public function ActualizarAlumno(AlumnoBean $objalubean)
                  {
              try {
                    $cn = new ConexionBD();
                    $cnx = $cn->getConexionBD();
                    
                    $sql = " UPDATE `estudiantes` SET `dni` = ?, `nombre` = ?, `apellido` = ?, `celular` = ?, `telefono` = ?, `email_p` = ?, `email_i` = ?, `distrito` = ?, `direccion` = ?, `nom_emp` = ?, `cargo_emp` = ?, `tel_emp` = ?, `dis_emp` = ?, `dir_emp` = ? WHERE `estudiantes`.`id_estudiante` = ?; ";
                    
                    $stmt = $cnx->prepare($sql);
                    $stmt->bind_param('ssssssssssssssi',$objalubean->alu_DNI,$objalubean->alu_NOMBRE,$objalubean->alu_APELLIDO,$objalubean->alu_CELULAR,$objalubean->alu_TELEFONO,$objalubean->alu_EMAILPERSO,$objalubean->alu_EMAILINSTI,$objalubean->alu_DISTRITO,$objalubean->alu_DOMICILIO,$objalubean->alu_EMPRESA,$objalubean->alu_CARGOAREA,$objalubean->alu_TELEFONOEMPRESA,$objalubean->alu_DISTRITOEMPRESA,$objalubean->alu_DIRECCIONEMPRESA,$objalubean->alu_ID);
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
                                      echo mysqli_error($cnx);
                                  }
                    return $estado;             
                    }
                    
          static public function ValidarCorreo($email){
                return (filter_var($email, FILTER_VALIDATE_EMAIL)) ? TRUE : FALSE;
            }
            
            
            
            //funcion solo para dar de baja
            public function EliminarAlumno(AlumnoBean $objalubean){
                try {
                    $cn = new ConexionBD();
                    $cnx = $cn->getConexionBD();
                    
                    $sql = " UPDATE `estudiantes` SET `estudiantes`.`suscrito` = '0' WHERE `estudiantes`.`id_estudiante` = ?; ";
                    
                    $stmt = $cnx->prepare($sql);
                    $stmt->bind_param('i',$objalubean->alu_ID);
                    $stmt->execute();
                    
                    $estado = 0;

                    $response = $stmt->get_result();
                    
                    if(mysqli_stmt_affected_rows($stmt)>0)
                        {
                            $estado = 1;
                        }
                            
                    } catch (Exception $exc) {
                                        $estado = 0;
                                    }
                return $estado;
            }
            
        public function BuscarAlumnoCriterio($busqueda)
                {
            try {
                    $cn = new ConexionBD();
                    $cnx = $cn->getConexionBD();
                    $sql = " SELECT estu.id_estudiante as id ,concat(estu.apellido,' ',estu.nombre) as nombre  from estudiantes estu WHERE "; 
                    
                        if(ctype_digit($busqueda))
                        {
                          $sql = $sql." estu.dni LIKE '%$busqueda%'; ";  
                        }else
                            {
                            $sql = $sql." estu.apellido LIKE '%$busqueda%' OR estu.nombre LIKE '%$busqueda%'; ";
                            }
                    
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
