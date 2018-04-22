<?php

    require_once '../BEAN/ExportarDataBean.php';
    require_once '../UTIL/ConexionBD.php';
    require_once '../UTIL/ConexionBDAlternative.php';

    class ExportarDataDao
    {
        public function ObtenerCorreosAlumnosMatriculadosNuevo()
                {
            try {
                $cn = new ConexionBD();
                $cnx = $cn->getConexionBD();
                
                $sql = " SELECT al.dni_alumno as dni,concat(al.apellido_alumno,', ',al.nombre_alumno) as nombre, al.emailperso_alumno as emailperso, al.emailinsti_alumno as emailinsti , al.celular_alumno as celular, cur.nombre_curso as curso from alumno al INNER JOIN matricula ma on ma.id_alumno = al.id_alumno inner JOIN curso cur on cur.id_curso = ma.id_curso; ";
                
                $result = mysqli_query($cnx,$sql);
                
                $LISTA['data'] = array();
                    
                    while ($fila = mysqli_fetch_assoc($result))
                        {
                        array_push($LISTA['data'],array('dni'=>$fila['dni'],'nombre'=>$fila['nombre'],'emailperso'=>$fila['emailperso'],'emailinsti'=>$fila['emailinsti'],'celular'=>$fila['celular'],'curso'=>$fila['curso']));
                        }
            } catch (Exception $exc) {
              echo $exc->getTraceAsString();
            }
            return $LISTA;
                }
                
        public function ObtenerCorreosAlumnosMatriculadosAntiguo()
                {
            try {
                $cnAlternativo = new ConexionBDAlternative();
                $cnxAlternativo = $cnAlternativo->getConexionBDAlternativo();
                
                $sqlAlternativos = "";
                
                } catch (Exception $exc) {
                                echo $exc->getTraceAsString();
                            }
                 }
    }

?>

