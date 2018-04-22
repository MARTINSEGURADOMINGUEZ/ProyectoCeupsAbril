<?php

    session_start();
    
    require_once '../BEAN/AlumnoBean.php';
    require_once '../DAO/AlumnoDao.php';
    
    
    
    $op = $_POST['op'];
    
    switch ($op)
    {
            case "Listar":{
                
                $objalumdao = new AlumnoDao();
                $lista = $objalumdao->ObtenerAlumnos();
                header("Content-Type: application/json; charset=utf-8");
                echo json_encode($lista,JSON_UNESCAPED_UNICODE);
                
            break;}
            
            case "CreatePreIns":{
                    
                $objalumbean = new AlumnoBean();
                $objalumdao = new AlumnoDao();
                
                $nombre = html_entity_decode(($_POST['nombre']), ENT_QUOTES | ENT_HTML401, "UTF-8");
                $apellido = html_entity_decode(($_POST['apellido']), ENT_QUOTES | ENT_HTML401, "UTF-8");
                
                $celular = $_POST['celular'];
                if($celular===""||$celular===null)
                    {
                        $celular = "0";
                    }
                $telefono = $_POST['telefono'];
                if($telefono===""||$telefono===null)
                    {
                        $telefono = 0;
                    }
                $emailperso = $_POST['emailpersonal'];
                $emailinsti = $_POST['emailinsti'];
                $anexo = $_POST['anexo'];
                if($anexo===""||$anexo===null)
                    {
                        $anexo = 0;
                    }
                
               // echo $nombre.' - '.$apellido.' - '.$celular.' - '.$telefono.' - '.$emailperso.' - '.$emailinsti.' - '.$anexo;
                $objalumbean->setAlu_DNI("00000000");
                $objalumbean->setAlu_NOMBRE($nombre);
                $objalumbean->setAlu_APELLIDO($apellido);
                $objalumbean->setAlu_CELULAR($celular);
                $objalumbean->setAlu_TELEFONO($telefono);
                $objalumbean->setAlu_EMAILPERSO($emailperso);
                $objalumbean->setAlu_EMAILINSTI($emailinsti);
                $objalumbean->setAlu_ANEXO($anexo);
                
                 $estado = $objalumdao->InsertarAlumnoPreInscrito($objalumbean);
                
                 echo ($estado===1) ? "success":"failed";
                 
                break;}
            
            case "Create":{
            
                $objalumbean = new AlumnoBean();
                $objalumdao = new AlumnoDao();
                
                $dni = $_POST['dni'];
                if($dni===""||$dni===NULL)
                    {$dni = null;}
                $nombre = html_entity_decode(strtoupper(($_POST['nombre'])), ENT_QUOTES | ENT_HTML401, "UTF-8");
                $apellido = html_entity_decode(strtoupper(($_POST['apellido'])), ENT_QUOTES | ENT_HTML401, "UTF-8");
                $celular = $_POST['celular'];
                if($celular===""||$celular===NULL)
                {$celular = null;}
                $telefono = $_POST['telefono'];
                if($telefono===""||$telefono===NULL)
                {$telefono = null;}
                $domicilio = htmlentities($_POST['domicilio']);
                $distrito = htmlentities($_POST['distrito']);
                $emailperso = $_POST['emailpersonal'];
                if($emailperso===""||$emailperso===NULL)
                {$emailperso = null;}
                $emailinsti = $_POST['emailinsti'];
                if($emailinsti===""||$emailinsti===NULL)
                {$emailinsti = NULL;}
                
                $empresa = $_POST['empresa'];
                if($empresa===""||$empresa===NULL)
                {$empresa = "";}
                $cargoarea = $_POST['cargoarea'];
                if($cargoarea===""||$cargoarea===NULL)
                {$cargoarea = "";}
                $telefonoempresa = $_POST['telefonoempresa'];
                if($telefonoempresa===""||$telefonoempresa===NULL)
                {$telefonoempresa = "0";}
                $direccionempresa = htmlentities($_POST['direccionempresa']);
                if($direccionempresa===""||$direccionempresa===NULL)
                {$direccionempresa = "";}
                $distritoempresa = $_POST['distritoempresa'];
                if($distritoempresa===""||$distritoempresa===NULL)
                {$distritoempresa = "";}
                
                $observacion = htmlentities($_POST['observacion']);
                if($observacion==="" || $observacion===NULL)
                    {$observacion="";}
                
                
                $objalumbean->setAlu_DNI($dni);
                $objalumbean->setAlu_NOMBRE($nombre);
                $objalumbean->setAlu_APELLIDO($apellido);
                $objalumbean->setAlu_CELULAR($celular);
                $objalumbean->setAlu_TELEFONO($telefono);
                $objalumbean->setAlu_DOMICILIO($domicilio);
                $objalumbean->setAlu_DISTRITO($distrito);
                $objalumbean->setAlu_EMAILPERSO($emailperso);
                $objalumbean->setAlu_EMAILINSTI($emailinsti);
                
                $objalumbean->setAlu_EMPRESA($empresa);
                $objalumbean->setAlu_CARGOAREA($cargoarea);
                $objalumbean->setAlu_TELEFONOEMPRESA($telefonoempresa);
                $objalumbean->setAlu_DIRECCIONEMPRESA($direccionempresa);
                $objalumbean->setAlu_DISTRITOEMPRESA($distritoempresa);
                
                $objalumbean->setAlu_OBSERVACION($observacion);
                
                
                $estado = $objalumdao->InsertarAlumno($objalumbean);
                
                echo ($estado===1) ? "success":"failed";
                
            break;}
            case "Obtener":{
                
            header('Content-Type: text/html; charset=ISO-8859-1'); 
                
            $busqueda = $_POST['busqueda'];
                
            $objalumdao = new AlumnoDao();
            $lista = $objalumdao->BuscarAlumno($busqueda);
                
            echo json_encode($lista,JSON_UNESCAPED_UNICODE);   
                
            break;}
            case "VerificarAlumno":{
                
                $dni = htmlentities($_POST['dni']);
                $objalubean = new AlumnoBean();
                $objalumdao = new AlumnoDao();
                
                $objalubean->setAlu_DNI($dni);
                
                $lista = $objalumdao->BuscarDniAlumno($objalubean);
                        
                echo json_encode($lista,JSON_UNESCAPED_UNICODE);
                
            break;}
            case "Update":
                {
                      $objalubean = new AlumnoBean();
                      $objaludao = new AlumnoDao();
                
                $id = $_POST['id'];
                $dni = $_POST['dni'];
                if($dni===""||$dni===NULL)
                    {$dni = "0";}
                $nombre = strtoupper(utf8_encode($_POST['nombre']));
                $apellido = strtoupper(utf8_encode($_POST['apellido']));
                $celular = $_POST['celular'];
                if($celular===""||$celular===NULL)
                {$celular = "0";}
                $telefono = $_POST['telefono'];
                if($telefono===""||$telefono===NULL)
                {$telefono = "0";}
                $domicilio = htmlentities($_POST['domicilio']);
                $distrito = htmlentities($_POST['distrito']);
                $emailperso = htmlentities($_POST['emailpersonal']);
                $emailinsti = htmlentities($_POST['emailinsti']);
                if($emailinsti===""||$emailinsti===NULL)
                {$emailinsti = null;}
                
                $empresa = $_POST['empresa'];
                if($empresa===""||$empresa===NULL)
                {$empresa = "";}
                $cargoarea = $_POST['cargo'];
                if($cargoarea===""||$cargoarea===NULL)
                {$cargoarea = "";}
                $telefonoempresa = $_POST['telefonoempresa'];
                if($telefonoempresa===""||$telefonoempresa===NULL)
                {$telefonoempresa = "0";}
                $direccionempresa = htmlentities($_POST['direccionempresa']);
                if($direccionempresa===""||$direccionempresa===NULL)
                {$direccionempresa = "";}
                $distritoempresa = $_POST['distritoempresa'];
                if($distritoempresa===""||$distritoempresa===NULL)
                {$distritoempresa = "";}
                
                $objalubean->setAlu_ID($id);
                $objalubean->setAlu_DNI($dni);
                $objalubean->setAlu_NOMBRE($nombre);
                $objalubean->setAlu_APELLIDO($apellido);
                $objalubean->setAlu_CELULAR($celular);
                $objalubean->setAlu_TELEFONO($telefono);
                $objalubean->setAlu_DOMICILIO($domicilio);
                $objalubean->setAlu_DISTRITO($distrito);
                $objalubean->setAlu_EMAILPERSO($emailperso);
                $objalubean->setAlu_EMAILINSTI($emailinsti);
                
                $objalubean->setAlu_EMPRESA($empresa);
                $objalubean->setAlu_CARGOAREA($cargoarea);
                $objalubean->setAlu_TELEFONOEMPRESA($telefonoempresa);
                $objalubean->setAlu_DIRECCIONEMPRESA($direccionempresa);
                $objalubean->setAlu_DISTRITOEMPRESA($distritoempresa);
                
                $estado = $objaludao->ActualizarAlumno($objalubean);
                
                echo ($estado===1) ? "success":"failed";
                
                break;
                }
                case "Delete":
                {
                    $id = $_POST['id'];
                
                    $objalumdao = new AlumnoDao();
                    $objalubean = new AlumnoBean();
                    
                    $objalubean->setAlu_ID($id);
                    
                    $estado = $objalumdao->EliminarAlumno($objalubean);
                    
                    echo ($estado===1) ? "success":"failed";
                    
                break;
                }
                case "ObtenerPorCriterio":{
                
                $busqueda = $_POST['busqueda'];

               $objalumdao = new AlumnoDao();
               $lista = $objalumdao->BuscarAlumnoCriterio($busqueda);

               echo json_encode($lista);   

               break;}
            default :
                {
                break;}
    }

?>

