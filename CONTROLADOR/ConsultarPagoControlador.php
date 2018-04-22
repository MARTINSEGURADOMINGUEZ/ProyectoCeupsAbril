<?php
    
    session_start();
    require_once '../BEAN/ConsultarPagoBean.php';
    require_once '../DAO/ConsultarPagoDao.php';
    require_once '../DAO/CursoDao.php';

    $op = $_POST['op'];
    
    switch ($op)
    {
        case "ListarPagosCurso":
            {
                $cursoperiodo = html_entity_decode($_POST['cursoperiodo'], ENT_QUOTES | ENT_HTML401, "UTF-8");
                
                unset($_SESSION['idperiodocurso']);
                unset($_SESSION['fechainicio']);
                unset($_SESSION['fechatermino']);
                
                $objconsulpagobean = new ConsultarPagoBean();
                $objconsulpagodao = new ConsultarPagoDao();
                
                $objcursodao = new CursoDao();
                
                $objconsulpagobean->setNombreCurso($cursoperiodo);
                
                $lista = $objconsulpagodao->ObtenerPagosPorCurso($objconsulpagobean);
                
                $datos = $objcursodao->ObtenerFechasCurso($cursoperiodo);
                        
                $code = json_encode($datos,JSON_UNESCAPED_UNICODE);
                
                $decode = json_decode($code,true);
                    
                $finicio = $decode[0]['finicio'];
                $ftermino = $decode[0]['ftermino'];
                
                $_SESSION['idperiodocurso']=$cursoperiodo;
                $_SESSION['fechainicio'] = $finicio;
                $_SESSION['fechatermino'] = $ftermino;
                
                echo json_encode($lista,JSON_UNESCAPED_UNICODE);
                
                break;
            }
        case "Reporte":{
            
                $cursoId = 4;
                
                $objconsulpagobean = new ConsultarPagoBean();
                $objconsulpagodao = new ConsultarPagoDao();
                
                $objconsulpagobean->setNombreCurso($cursoId);
                
                $reporteformato = $objconsulpagodao->GenerarReportePagos($objconsulpagobean);
                
                echo $reporteformato;
            
                break;
        }
        case "":{
                break;
        }
        default :
            {
            break;}
    }
    

?>
