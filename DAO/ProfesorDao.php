<?php

require_once '../UTIL/ConexionBD.php';
require_once '../BEAN/ProfesorBean.php';

class ProfesorDao {
    
    
    public function ObtenerDocentes($Busqueda)
        {
            try {
                    $cn = new ConexionBD();
                    $cnx = $cn->getConexionBD();
                    
                    $sql = " select id_profesor as id, concat('NOMBRE: ',apellido,', ',nombre,' ;DNI:',dni) as nombre, concat(apellido,', ',nombre) as nombrelimpio from profesores WHERE ";
                    
                    if(ctype_digit($Busqueda))
                        {
                          $sql = $sql." dni LIKE '%$Busqueda%'; ";  
                        }else
                            {
                            $sql = $sql." nombre LIKE '%$Busqueda%' or apellido LIKE '%$Busqueda%'; ";
                            }
                    
                    $result = mysqli_query($cnx,$sql);
                    $LISTA = array();
                    while ($fila = mysqli_fetch_assoc($result))
                            {
                        $LISTA[] = array('id'=>$fila['id'],'nombre'=>$fila['nombre'],'nombrelimpio'=>$fila['nombrelimpio']);
                            }
            } catch (Exception $exc) {
            }
            return $LISTA;
            }
    
    public function InsertarDocente(ProfesorBean $objdocebean)
                {
                try {
                    
                    $cn = new ConexionBD();
                    $cnx = $cn->getConexionBD();
                   
                    $sql = " INSERT INTO `profesores` (`dni`, `nombre`, `apellido`, `celular`, `telefono`, `email_p`, `distrito`, `direccion`) VALUES (?,?,?,?,?,?,?,?); ";
                    $stmt = $cnx->prepare($sql);
                    $stmt->bind_param('ssssssss',$objdocebean->dni_docente,$objdocebean->nombre_docente,$objdocebean->apellido_docente,$objdocebean->celular_docente,$objdocebean->telefono_docente,$objdocebean->email_docente,$objdocebean->distrito_docente,$objdocebean->domicilio_docente);
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
   
}

?>
