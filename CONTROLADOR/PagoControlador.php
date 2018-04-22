<?php

    require_once '../BEAN/PagoBean.php';
    require_once '../DAO/PagoDao.php';
    require_once '../DAO/PreInscritoDao.php';

   $op = $_POST['op'];
   
   switch ($op)
   {
       case "ConsultarCursoPago":
           {
                $objpagobean = new PagosBean();
                $objpagodao = new PagoDao();
                
                $objaludao = new PreInscritoDao();
                
                $alumno = htmlentities($_POST['alumno']);
                
                $objpagobean->setAlumnoDni($alumno);
                
                $LISTA = $objpagodao->ObtenerPagosXalumno($objpagobean);
                
                echo json_encode($LISTA,JSON_UNESCAPED_UNICODE);
                    
           break;}
       case "ConsultarNumeroPago":
           {
           
                $objpagobean = new PagosBean();
                $objpagodao = new PagoDao();
                
                $numeropago = htmlentities($_POST['numeropago']);
                
                $objpagobean->setNumeroLiquidacion($numeropago);
              
                $lista = $objpagodao->VerificarNumeroPago($objpagobean);
                
                echo json_encode($lista,JSON_UNESCAPED_UNICODE);
                
           
           break;}
       case "RealizarPagoDeuda":
           {
                $objpagobean = new PagosBean();
                $objpagodao = new PagoDao();
           
                
                $idmatricula = htmlentities($_POST['idmatricula']);
                $calculonuevadeuda = htmlentities($_POST['calculonuevadeuda']);
                
                $tipopago = htmlentities($_POST['tipopago']);
                $numeropago = htmlentities($_POST['numeropago']);
                $montopago = htmlentities($_POST['montopago']);
                $fechapago = htmlentities($_POST['fechapago']);
                
                $objpagobean->setIdMatricula($idmatricula);
                $objpagobean->setCalculoNuevaDeuda($calculonuevadeuda);
                
                $objpagobean->setIdPago($tipopago);
                $objpagobean->setMontoPago($montopago);
                $objpagobean->setFechaPago($fechapago);
                $objpagobean->setIdTipoPago($tipopago);
                if($tipopago==="1")
                    {
                     $objpagobean->setNumeroLiquidacion($numeropago);
                     $objpagobean->setNumeroDocumento(null);
                    }else
                        {
                            $objpagobean->setNumeroLiquidacion(null);
                            $objpagobean->setNumeroDocumento($numeropago);
                        }
                
                $respuesta = $objpagodao->ModificarMatriculaDeuda($objpagobean);
                
                 if($respuesta===1)
                   {
                    echo "success";
                   }else if($respuesta === 2)
                       {
                            echo "error";
                       }else
                           {
                            echo "failed";
                           }
           
           break;}
       case "ListarPagos":{
           
                $objpagodao = new PagoDao();
                
                $lista = $objpagodao->ObtenerPagos();
                
                echo json_encode($lista,JSON_UNESCAPED_UNICODE);
           
           break;}
        
       case "ListarPagosConFiltro":
           {
                $curso = html_entity_decode($_POST['curso'], ENT_QUOTES | ENT_HTML401, "UTF-8");
                $periodo = htmlentities($_POST['periodo']);
                
                $objpagobean = new PagosBean();
                $objpagodao = new PagoDao();
                
                $objpagobean->setPeriodoCurso($curso);
                $objpagobean->setPeriodo($periodo);
                
                $lista = $objpagodao->ObtenerPagosPorCurso($objpagobean);
                
                echo json_encode($lista,JSON_UNESCAPED_UNICODE);
             break;
           }
       case "ActualizarPago":{
           
                $objpagobean = new PagosBean();
                $objpagodao = new PagoDao();
                
                $idpago = htmlentities($_POST['idpago']);
                $tipopago = htmlentities($_POST['tipopago']);
                $numeropago = htmlentities($_POST['documento']);
                $fechapago = htmlentities($_POST['fechapago']);
                $montopago = htmlentities($_POST['montopago']);
                
                $objpagobean->setIdPago($idpago);
                $objpagobean->setIdTipoPago($tipopago);
               if($tipopago==="1")
                {
                 $objpagobean->setNumeroLiquidacion($numeropago);
                 $objpagobean->setNumeroDocumento(null);
                }else
                {
                    $objpagobean->setNumeroLiquidacion(null);
                    $objpagobean->setNumeroDocumento($numeropago);
                }
                $objpagobean->setFechaPago($fechapago);
                $objpagobean->setMontoPago($montopago);
                
                $estado = $objpagodao->ActualizarPago($objpagobean);
                
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
       default :
           {
           break;}
   }

?>
