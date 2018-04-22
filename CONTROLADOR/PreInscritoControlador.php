<?php

session_start();

require_once '../BEAN/PreInscritoBean.php';
require_once '../DAO/PreInscritoDao.php';

//header('Content-Type: text/html; charset=ISO-8859-1'); 

$op = $_POST['op'];

switch ($op)
{
    case "Listar":
        {
            
        
         $objpreinsdao = new PreInscritoDao();
         $objpreinsbean = new PreInscritoBean();
         
         $lista = $objpreinsdao->ObtenerPreInscritos();
         echo json_encode($lista,JSON_UNESCAPED_UNICODE);
         
        break;}
    case "Create":
        {
            $curso = html_entity_decode($_POST['curso'], ENT_QUOTES | ENT_HTML401, "UTF-8");
            $condicion = $_POST['condicion'];
            $alumno = html_entity_decode($_POST['alumno'], ENT_QUOTES | ENT_HTML401, "UTF-8");
            //$dnialumno = substr($alumno,5,8);
            $fecha = $_POST['fecha'];
            if($fecha===null || $fecha ==="")
                { $fecha = null; }
            $fechacont = $_POST['fechacont'];
            $difucion = $_POST['difucion'];
                if($difucion===null || $difucion ==="")
                { $difucion = null; }
            $observacion = $_POST['observacion'];
            if($observacion===null || $observacion ==="")
                { $observacion = ""; }
         
        $objpreinsbean = new PreInscritoBean();
        $objpreinsdao = new PreInscritoDao();
        
        $objpreinsbean->setCurso($curso);
        $objpreinsbean->setTipoalumno($condicion);
        $objpreinsbean->setAlumno($alumno);
        $objpreinsbean->setFecha($fecha);
        $objpreinsbean->setFechacont($fechacont);
        $objpreinsbean->setDifucion($difucion);
        $objpreinsbean->setObservacion($observacion);
        
       $estado = $objpreinsdao->InsertarPreInscritos($objpreinsbean);
       
                      if($estado===1)
                   {
                    echo "success";
                   }else if($estado === 2)
                       {
                            echo "error";
                       }else
                           {
                            echo "failed";
                           }
       
        break;}
    case "ListarConFiltro":
        {
         
         $objpreinsdao = new PreInscritoDao();
         $objpreinsbean = new PreInscritoBean();
         
         $curso = html_entity_decode($_POST['curso'], ENT_QUOTES | ENT_HTML401,"UTF-8");
         $fecha = $_POST['periodo'];
         
         $objpreinsbean->setCurso($curso);
         $objpreinsbean->setFecha($fecha);
         
         $lista = $objpreinsdao->ObtenerPreInscritosFiltro($objpreinsbean);
         echo json_encode($lista,JSON_UNESCAPED_UNICODE);     
            break;
        }
    case "UPDATE":
        {
        
        
        
        break;}
    case "DELETE":
        {
        
        
        
        break;}
        
    default :{break;}
}

?>

