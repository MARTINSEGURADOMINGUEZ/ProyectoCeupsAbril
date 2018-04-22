<?php
    
        require_once '../UTIL/ConexionBD.php';

    class ReporteDao
            {
            
                public function ObtenerPorcentajeMatriculados()
                        {
                    try {
                            $cn = new ConexionBD();
                            $cnx = $cn->getConexionBD();
                            $sql = " select cur.nombre_curso as nombre,COUNT(matricula.id_matricula) as cantporcurso,(SELECT ROUND(COUNT(matricula.id_alumno)*100/count(ma.id_alumno)) from matricula ma) as porcentaje from matricula matricula inner join curso cur on cur.id_curso = matricula.id_curso GROUP BY cur.nombre_curso; ";
                        
                        mysqli_set_charset("UTF8");
                        mysqli_query('SET NAME "UTF8"');
                        
                        $result =  mysqli_query($sql,$cnx);
                        
                        $LISTA = array();
                        
                        while ($row = mysqli_fetch_array($result))
                           {
                                
                                $nombre = $row['nombre'];
                                $total = $row['cantporcurso'];
                                $porcentaje = $row['porcentaje'];
                                
                                $LISTA[] = array('nombre'=>$nombre,'total'=>$total,'porcentaje'=>$porcentaje);
                                
                           }
                        
                    } catch (Exception $exc){
                        echo $exc->getTraceAsString();
                    }
            
                    return $LISTA;
                    }
                
            }

?>

