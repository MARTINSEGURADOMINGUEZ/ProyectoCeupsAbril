<?php

    session_start();
    
    require_once '../BEAN/ProfesorBean.php';
    require_once '../DAO/ProfesorDao.php';
    
    require_once '../BEAN/CursoBean.php';
    require_once '../DAO/CursoDao.php';
    
    $op = $_POST['op'];
    
    switch ($op)
    {
            case "ListarDocentes":{
                
                $busqueda = $_POST['busqueda'];
                $objdocentedao = new ProfesorDao();
                $lista = $objdocentedao->ObtenerDocentes($busqueda);
                
                echo json_encode($lista,JSON_UNESCAPED_UNICODE);
                
            break;}
            
            case "RegistrarDocente":{
            
                $objdocentebean = new ProfesorBean();
                $objdocentedao = new ProfesorDao();
                
                $dni = $_POST['dni'];
                $nombre = strtoupper(utf8_encode($_POST['nombre']));
                $apellido = strtoupper(utf8_encode($_POST['apellido']));
                $celular = $_POST['celular'];
                $telefono = $_POST['telefono'];
                $domicilio = utf8_encode($_POST['domicilio']);
                $distrito = $_POST['distrito'];
                $emailperso = $_POST['emailpersonal'];
                
                $objdocentebean->setDni_docente($dni);
                $objdocentebean->setNombre_docente($nombre);
                $objdocentebean->setApellido_docente($apellido);
                $objdocentebean->setCelular_docente($celular);
                $objdocentebean->setTelefono_docente($telefono);
                $objdocentebean->setDomicilio_docente($domicilio);
                $objdocentebean->setDistrito_docente($distrito);
                $objdocentebean->setEmail_docente($emailperso);
                
                $estado = $objdocentedao->InsertarDocente($objdocentebean);
                
                echo ($estado===1) ? "success":"failed";
                
            break;}
            case "Registrar":{
            break;}
            case "":{
                
                
            break;}
            default:
                {break;}
    }

?>
