<?php
    
    require_once '../BEAN/MatriculaBean.php';
    require_once '../BEAN/PagoBean.php';
    require_once '../DAO/MatriculaDao.php';
    require_once '../DAO/PreInscritoDao.php';

    $op = $_POST['op'];
    
    switch ($op)
    {
        case "Listar":
            {
                $objmatribean = new MatriculaBean();
                $objmatridao = new MatriculaDao();
                
                $lista = $objmatridao->ObtenerMatriculados();
                
                echo json_encode($lista,JSON_UNESCAPED_UNICODE);
            
            break;}
        case "CostoMatricula":
            {
                $objmatribean = new MatriculaBean();
                $objmatridao = new MatriculaDao();
                
                $curso = $_POST['curso'];
                $tipoalu = $_POST['tipoalumno'];
                
                
                $objmatribean->setNombreCurso(htmlentities(substr($curso,0,3)));
                $objmatribean->setIdTipoEstudiante($tipoalu);
                
                $lista = $objmatridao->ObtenerCostoCurso($objmatribean);
                
                echo json_encode($lista,JSON_UNESCAPED_UNICODE);
                
                break;
            }
        case "Matricular":
            {
                $objmatribean = new MatriculaBean();
                $objpagobean = new PagosBean();
                $objmatridao = new MatriculaDao();
                $objpreinsmatridao = new PreInscritoDao();
                
                $cursoperiodo = html_entity_decode($_POST['curso'], ENT_QUOTES | ENT_HTML401, "UTF-8");
                $alumno = html_entity_decode($_POST['alumno'], ENT_QUOTES | ENT_HTML401, "UTF-8");
                $tipoalu = $_POST['tipoalumno'];
                $tipodocumento = '2';
                $observacion = htmlentities($_POST['observacion']);
                if($observacion===""||$observacion==null)
                    { $observacion = "";}
                $deuda = $_POST['deuda'];
                
                $tipopago = $_POST['tipopago'];
                $numeropago = htmlentities($_POST['numeropago']);
                $fechapago = $_POST['fechapago'];
                if($fechapago==="" || $fechapago===null)
                    {
                       $fechapago = date('Y-m-d');
                    }
                $montopago = $_POST['montopago'];
                
                $objmatribean->setIdCurso($cursoperiodo);
                $objmatribean->setIdEstudiante($alumno);
                $objmatribean->setIdTipoEstudiante($tipoalu);
                $objmatribean->setIdDocumento($tipodocumento);
                $objmatribean->setObservación($observacion);
                $objmatribean->setDeuda($deuda);
                $objmatribean->setRegocioCertificado('NO');
                $objmatribean->setFechaRegistro(date("Y-m-d"));
                $objmatribean->setDescCorporativo('0');
                $objmatribean->setNotaFinal('0');
                $objmatribean->setSituacionFinal('2');
                
                $objpagobean->setIdTipoPago($tipopago);
                if($tipopago==="1")
                    {
                     $objpagobean->setNumeroLiquidacion($numeropago);
                     $objpagobean->setNumeroDocumento(null);
                    }else if($tipopago==="6")
                        {
                            $objpagobean->setNumeroLiquidacion("110-01-0416304");
                            $objpagobean->setNumeroDocumento(null);
                        }else
                        {
                            $objpagobean->setNumeroLiquidacion(null);
                            $objpagobean->setNumeroDocumento($numeropago);
                        }
                
                $objpagobean->setFechaPago($fechapago);
                $objpagobean->setMontoPago($montopago);
                
                $objmatribean->setMatricula("1");
                $objmatribean->setListar("1");
                
               $estado = $objmatridao->RealizarMatricula($objmatribean,$objpagobean);
               
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
        case "Update":
            {
            
                $objmatribean = new MatriculaBean();
                $objmatridao = new MatriculaDao();
                
                $Id = $_POST['id'];
                $Condicion = $_POST['condicion'];
                $Observacion = $_POST['observacion'];
                $SituacionFinal = $_POST['situacion'];
                $IdDocumento = $_POST['documento'];
                $Recogio = $_POST['recogio'];
                
                $objmatribean->setIdMatricula($Id);
                $objmatribean->setIdTipoEstudiante($Condicion);
                $objmatribean->setObservación($Observacion);
                $objmatribean->setSituacionFinal($SituacionFinal);
                $objmatribean->setIdDocumento($IdDocumento);
                $objmatribean->setRegocioCertificado($Recogio);
                
                $estado = $objmatridao->MofificarMatriculaAlumno($objmatribean);
            
                echo ($estado===1) ? "success":"failed";
                
            break;}
        case "ListarParaMatricula":
            {
            
            $busqueda = $_POST['busqueda'];
            $objcursodao = new MatriculaDao();
            $lista = $objcursodao->ObtenerCursosParaMatricula($busqueda);
            echo json_encode($lista);
            
            break;}
        default :
            {
               
                break;
            }
    }

?>

