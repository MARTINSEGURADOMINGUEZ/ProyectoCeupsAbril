<?php
        
        require_once '../UTIL/ConexionBD.php';
        require_once '../BEAN/UsuarioBean.php';
        require_once '../DAO/AlumnoDao.php';
        require_once '../DAO/ProfesorDao.php';
        
        require_once '../experimental/experimetal01.php';
        
        class UsuarioDao
        {
            
          public function ValidarUsuarios(UsuarioBean $objusubean){
              
              try {
                  
                    $cn = new ConexionBD();
                    $cnx = $cn->getConexionBD();
                    
                    $sql = " select usu.usu_USERNAME,usu.usu_NOMBRE,usu.usu_PASSWORD,usu.usu_EMAIL,usu.tipousu_ID, tipusu.tipousu_NOMBRE from usuario usu "
                            . "inner join tipousuario tipusu on tipusu.tipousu_ID = usu.tipousu_ID"
                            . " WHERE usu.usu_USERNAME = ? and usu.usu_PASSWORD = ? ";
                    $stmt = $cnx->prepare($sql);
                    $stmt->bind_param('ss',$objusubean->usu_USERNAME,$objusubean->usu_PASSWORD);
                    $stmt->execute();
                    
                    $response = $stmt->get_result();
                    
                    $LISTA = array();
                    
                    if(mysqli_num_rows($response)>0)
                        {
                            while($row = mysqli_fetch_array($response,MYSQLI_ASSOC))
                                    {
                                        $nombre = $row['usu_NOMBRE'];
                                        $tipousu = $row['tipousu_ID'];
                                        $nomtipousu = $row['tipousu_NOMBRE'];
                                        $cantadmin = UsuarioDao::ObtenerAdministradores();
                                        $cantpersonal = UsuarioDao::ObtenerPersonal();
                                        
                                        $LISTA[] = array('estado'=>'success','usunombre'=>$nombre,'tipousu'=>$tipousu,'nomtipousu'=>$nomtipousu,'cantadmin'=>$cantadmin,'cantpersonal'=>$cantpersonal);
                                    }
                        }else
                            {
                                $LISTA[] = array('estado'=>'failed');
                            }
                    
                     $stmt->close();
                 
                } catch (mysqli_sql_exception $exc) {
                  echo $exc->getTraceAsString();
                }
               return $LISTA;
            }
            
         public function ComprobarUsuarioExistente(UsuarioBean $objusubean)
                 {
             try {
                    $cn = new ConexionBD();
                    $cnx = $cn->getConexionBD();
                    
                    $sql = " SELECT * from usuario WHERE usu_USERNAME = '$objusubean->usu_USERNAME'; ";
                    $result = mysqli_query($cnx,$sql);
                    
                    $lista = array();
                                
                    if(mysqli_num_rows($result)>0)
                        {
                            
                          $lista[] = array('estado'=>'success');

                        }else
                            {
                            $lista[] = array('estado'=>'failed');
                            }
    
            } catch (Exception $exc) {
                 echo mysqli_error($cnx);
             }
             return $lista;
            }
            
          public function ListarUsuarios()
                  {
           try {
                    $cn = new ConexionBD();
                    $cnx = $cn->getConexionBD();
                    
                    $sql = " SELECT usu.usu_ID as id, usu.usu_NOMBRE as nombre, usu.usu_USERNAME as usuario, usu.usu_PASSWORD as contra, usu.usu_EMAIL as email, tipousu.tipousu_ID as tipousuid, tipousu.tipousu_NOMBRE tipousunombre FROM usuario usu inner JOIN tipousuario tipousu on usu.tipousu_ID=tipousu.tipousu_ID ";
               
                    $result = mysqli_query($cnx, $sql);
                    
                    $LISTA['data'] = array();
                    
                    while ($fila = mysqli_fetch_assoc($result))
                            {
                            /*
                            $contra= base64_decode($fila['contra']);
                            * POSIBLE SOLUCION A LO QUE NECESITO*/
                             $contra = SED::Decryption($fila['contra']);
                             $LISTA[] =  array_push($LISTA['data'],array('id'=>$fila['id'],'nombre'=>$fila['nombre'],'usuario'=>$fila['usuario'],'contra'=>$contra,'email'=>$fila['email'],'tipousuid'=>$fila['tipousuid'],'tipousunombre'=>$fila['tipousunombre']));
                            
                            }
                    
          } catch (Exception $exc) {
                            echo $exc->getTraceAsString();
                        }
                        return $LISTA;
            }
            
            public function ActualizarUsuario(UsuarioBean $objusubean)
                    {
                    try {
                    $cn = new ConexionBD();
                    $cnx = $cn->getConexionBD();
                    
                    $sql = " UPDATE `usuario` SET `usu_PASSWORD` = '$objusubean->usu_PASSWORD' WHERE `usuario`.`usu_ID` = ?; "; 
                
                    $stmt = $cnx->prepare($sql);
                    $stmt->bind_param('i',$objusubean->usu_ID);
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
            
             public function ObtenerDatos()
                    {
                try {
                    
                    $LISTA = array();
                    
                    $cantadmin = UsuarioDao::ObtenerAdministradores();
                    $cantperso = UsuarioDao::ObtenerPersonal();
                    $cantalumno = UsuarioDao::ObtenerAlumnos();
                    
                    $LISTA[] = array('cantadmin'=>$cantadmin,'cantperso'=>$cantperso,'cantalumno'=>$cantalumno);
    
                        } catch (Exception $exc) {
                                            echo $exc->getTraceAsString();
                                        }
                        return $LISTA;
                    }
                    
            public function ObtenerDatosDetalle()
                    {
                try {
    
                    } catch (Exception $exc) {
                                        echo $exc->getTraceAsString();
                                    }
                    }
            
            public static function ObtenerAdministradores()
                    {
                    try {   
                            $cn = new ConexionBD();
                            $cnx = $cn->getConexionBD();
                            
                            $result = mysqli_query($cnx,"select COUNT(*) as 'total' from usuario WHERE tipousu_ID = 1;");  
                            
                            $valor = "0";
                            
                            if($result)
                                {
                                  $cadena = mysqli_fetch_assoc($result);
                                  $valor = $cadena['total'];
                                }
                            else
                                {
                                $valor = "0";
                                }
                          
                                   
                    } catch (Exception $exc) {
                                         $valor = "0";
                                    }
                                  return $valor;
                    }
            
            public static function ObtenerPersonal()
                    {
                    try {   
                            $cn = new ConexionBD();
                            $cnx = $cn->getConexionBD();
                            $result = mysqli_query($cnx,"select COUNT(*) as 'total' from usuario WHERE tipousu_ID = 2;");    
                            
                            $valor = "0";
                            
                            if($result)
                                {
                                  $cadena = mysqli_fetch_assoc($result);
                                  $valor = $cadena['total'];
                                }
                            else
                                {
                                $valor = "0";
                                }
                          
                                   
                    } catch (Exception $exc) {
                                         $valor = "0";
                                    }
                                  return $valor;
                    }
                    
            public function ObtenerDetalleAdmin()
                    {
                        try
                        {
                            $cn = new ConexionBD();
                            $cnx = $cn->getConexionBD();
                            
                            $sql = " SELECT usu_NOMBRE as nombre, usu_USERNAME as usuario, usu_EMAIL as email FROM usuario WHERE tipousu_ID = 1; ";
                            
                            $result = mysqli_query($cnx,$sql);  
                           
                            $LISTA = array();
                            
                            while ($fila = mysqli_fetch_assoc($result))
                                    {
                                        if($fila['email']==="" || $fila['email']==null)
                                            {
                                                $email = "NO REGISTRADO";
                                            }else
                                                {
                                                 $email = $fila['email'];
                                                }
                                        
                                        $LISTA[]= array('nombre'=>$fila['nombre'],'usuario'=>$fila['usuario'],'email'=>$email);
                                    }
                           
                        } catch (Exception $ex)
                        {
                            echo mysqli_error($cnx); 
                        }
                        return $LISTA;
                    }
                    
                    public function ObtenerDetallePersonal()
                    {
                        try
                        {
                            $cn = new ConexionBD();
                            $cnx = $cn->getConexionBD();
                            
                            $sql = " SELECT usu_NOMBRE as nombre, usu_USERNAME as usuario, usu_EMAIL as email FROM usuario WHERE tipousu_ID = 2; ";
                            
                            $result = mysqli_query($cnx,$sql);  
                           
                            $LISTA = array();
                            
                            while ($fila = mysqli_fetch_assoc($result))
                                    {
                                            if($fila['email']==="" || $fila['email']==null)
                                            {
                                                $email = "NO REGISTRADO";
                                            }else
                                                {
                                                 $email = $fila['email'];
                                                }
                                        $LISTA[]= array('nombre'=>$fila['nombre'],'usuario'=>$fila['usuario'],'email'=>$email);
                                    }
                           
                        } catch (Exception $ex)
                        {
                            echo mysqli_error($cnx); 
                        }
                        return $LISTA;
                    } 
                    
                    public static function ObtenerAlumnos()
                        {
                        try {
                            $mesinicio = (int)date('m');
                            $mesproximo = (int)date('m')+1;
                            
                            $cn = new ConexionBD();
                            $cnx = $cn->getConexionBD();
                            $result = mysqli_query($cnx," SELECT COUNT(*) as cantidadtotal from periodos_cursos periodo inner JOIN cursos cur on cur.id_curso = periodo.id_curso inner join matriculas matri on matri.id_per_curso = periodo.id_periodo_c inner join estudiantes estu on estu.id_estudiante = matri.id_estudiante WHERE year(periodo.f_inicio) = 2018 AND (month(periodo.f_termino)='$mesinicio' OR month(periodo.f_termino)='$mesproximo'); ");
                            
                            $valor = "0";
                            
                            if($result)
                                {
                                  $cadena = mysqli_fetch_assoc($result);
                                  $valor = $cadena['cantidadtotal'];
                                }
                            else
                                {
                                $valor = "0";
                                }
                        
                            
                    } catch (Exception $exc) {
                                                $valor = "0";
                        }
                        return $valor;
                        }
                        
                public function ObtenerDetalleCurso()
                        {
                    try {
                        
                        $mesinicio = (int)date('m');
                        $mesproximo = (int)date('m')+1;
                        
                        $cn = new ConexionBD();
                        $cnx = $cn->getConexionBD();
                        
                        $sql =  " SELECT periodo.id_periodo_c as id, cur.nom_curso as curso , COUNT(estu.id_estudiante) as cantidad from periodos_cursos periodo inner JOIN cursos cur on cur.id_curso = periodo.id_curso inner join matriculas matri on matri.id_per_curso = periodo.id_periodo_c inner join estudiantes estu on estu.id_estudiante = matri.id_estudiante WHERE year(periodo.f_inicio) = 2018 AND (month(periodo.f_termino)='$mesinicio' OR month(periodo.f_termino)='$mesproximo') GROUP BY cur.nom_curso ORDER BY periodo.id_periodo_c DESC; ";
                        
                        $result = mysqli_query($cnx,$sql);
                        
                        $LISTA = array();
                        
                        while ($fila = mysqli_fetch_array($result))
                                {
                                    $nombre = $fila['curso'];
                                    $cantidad = $fila['cantidad'];
                                    
                                    $LISTA[] = array('nombre'=>$nombre,'cantidad'=>$cantidad);
                                    
                                }
                        
                        } catch (Exception $exc) {
                                                echo $exc->getTraceAsString();
                                            }
                                            return $LISTA;
                        }
                        
                        public static function ObtenerDocentes()
                        {
                        try {
                                 $cn = new ConexionBD();
                            $cnx = $cn->getConexionBD();
                            $result = mysqli_query($cnx,"  ");
                            
                            $valor = "0";
                            
                            if($result)
                                {
                                  $cadena = mysqli_fetch_assoc($result);
                                  $valor = $cadena['total'];
                                }
                            else
                                {
                                $valor = "0";
                                }
                            
                    } catch (Exception $exc) {
                                                $valor = "0";
                        }
                        return $valor;
                        }
                        
                    
            public function IngresarUsuario(UsuarioBean $objusubean)
                    {
                try {
                            $cn = new ConexionBD();
                            $cnx = $cn->getConexionBD();
                        
                            $sql = " INSERT INTO `usuario` (`usu_USERNAME`, `usu_PASSWORD`, `usu_NOMBRE`, `usu_EMAIL`, `tipousu_ID`) VALUES (?,?,?,?,?); ";
                            $stmt = $cnx->prepare($sql);
                            $stmt->bind_param('sssss',$objusubean->usu_USERNAME,$objusubean->usu_PASSWORD,$objusubean->usu_NOMBRE,$objusubean->usu_EMAIL,$objusubean->usu_TIPOUSU);
                            $stmt->execute();
                            
                            $estado = 0;
                            
                            $response = $stmt->get_result();
                            
                            if(mysqli_stmt_affected_rows($stmt)>0)
                                {
                                        $estado = 1;
                                }else
                                    {
                                    $estado = 0;
                                    }
                            
                            
                        } catch (Exception $exc) {
                                            $estado = 0;
                }
                    return $estado;
                        }
                        
            public function ValidarCorreo($email){
                return (filter_var($email, FILTER_VALIDATE_EMAIL)) ? 1 : 0;
            }
            
            //FUNCIONES PARA ENCRYPTAR Y DESCENCRYPTAR
            
            static function encriptar($cadena){
        $key='ceupsunfv';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
        $encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $cadena, MCRYPT_MODE_CBC, md5(md5($key))));
        return $encrypted;
        }
        
        static function desencriptar($cadena){
        $key='ceupsunfv';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
        $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($cadena), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
        return $decrypted;
        }
            
        }
        
        
?>

