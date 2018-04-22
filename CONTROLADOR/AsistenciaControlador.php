<?php

    session_start();
    
    require_once '../DAO/AsistenciaDao.php';
    require_once '../BEAN/AsistenciaBean.php';
    require_once '../DAO/CursoDao.php';
    
    $op = $_POST['op'];
    
    switch ($op)
    {
        case "Imprimir":{
            
            $curso = htmlentities($_POST['curso']);
            $sesion = htmlentities($_POST['sesion']);
            $fecha = $_POST['fecha'];
            
            unset($_SESSION['LISTADOPARTICIPANTES']);
            unset($_SESSION['nombrecurso']);
            unset($_SESSION['sesion']);
            unset($_SESSION['fecha']);
            
            $objasisbean = new AsistenciaBean();
            $objasisdao = new AsistenciaDao();
            $objcursodao = new CursoDao();
            
            $objasisbean->setNombre_Curso($curso);
            
            $LISTA = $objasisdao->ListarParticipantes($objasisbean);
            
            $nombrecurso = $objcursodao->ObtenerCursoPorId($curso);
            
            //////////// LINEAS ADICIONALES ////////////////////////
            header('Content-Type: application/json; charset=utf-8');
            
            $code = json_encode($nombrecurso,JSON_UNESCAPED_UNICODE);
                
            $decode = json_decode($code,true);
            /////////////////////////////////////////////////////////
            
            $_SESSION['LISTADOPARTICIPANTES'] = $LISTA;
            $_SESSION['nombrecurso'] = $decode[0]['nombre'];
            $_SESSION['idcatecurso'] = $decode[0]['idcatecurso'];
            $_SESSION['finicio']= $decode[0]['finicio'];
            $_SESSION['ftermino']= $decode[0]['ftermino'];
            $_SESSION['sesion'] = $sesion;
            $_SESSION['fecha'] = $fecha;
            
            echo 'success';
            
            break;}
            
            case "ListaControl":{
            
            $curso = htmlentities($_POST['curso']);
            
            $objasisbean = new AsistenciaBean();
            $objasisdao = new AsistenciaDao();
            $objcursodao = new CursoDao();
            
            $objasisbean->setNombre_Curso($curso);
            
            $LISTA = $objasisdao->ListarControlParticipantes($objasisbean);
            
            $code = json_encode($LISTA,JSON_UNESCAPED_UNICODE);
            $decode = json_decode($code,true);
            
            //////////// LINEAS ADICIONALES ////////////////////////
            header('Content-Type: application/json; charset=utf-8');
            
            //echo json_encode($LISTA,JSON_UNESCAPED_UNICODE);
            
            $nombrecurso = $objcursodao->ObtenerCursoPorId($curso);
            $cursocode = json_encode($nombrecurso,JSON_UNESCAPED_UNICODE);
            $cursodecode = json_decode($cursocode,true);
            
            
            
            $_SESSION['LISTADOCONTROLCURSO'] = $LISTA;
            $_SESSION['nombrecurso'] = $cursodecode[0]['nombre'];
            $_SESSION['inicio']=$decode[0]['inicio'];
            $_SESSION['fin']=$decode[0]['fin'];
            
            echo 'success';
            
            break;}
            
        case "ObtenerCertificado":{
            
        $curso = $_POST['curso'];
            
            $objasisbean = new AsistenciaBean();
            $objasisdao = new AsistenciaDao();
            
            $objasisbean->setNombre_Curso($curso);
            
            $LISTA = $objasisdao->ListarParticipantesCertificado($objasisbean);
            
            //////////// LINEAS ADICIONALES ////////////////////////
            header('Content-Type: application/json; charset=utf-8');
            
            echo json_encode($LISTA,JSON_UNESCAPED_UNICODE);
            
            break;}
            
        default :{
            echo 'ESTO SE PUSO FEO CHICO';
            break;}
            
    }
?>
