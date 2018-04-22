<?php
    
    require_once '../BEAN/CursoBean.php';
    require_once '../DAO/CursoDao.php';
    
    header('Content-Type: text/html; charset=ISO-8859-1');  
    
    $op = $_POST['op'];

    switch ($op)
    {
        case "Listar":{
            
            $busqueda = $_POST['busqueda'];
            $objcursodao = new CursoDao();
            $lista = $objcursodao->ObtenerCursos($busqueda);
            echo json_encode($lista);
            
            break;}
            
        case "ListarCursoMatricula":
            {
                $busqueda = $_POST['busqueda'];
                $objcursodao = new CursoDao();
                $lista = $objcursodao->ObtenerCursosMatricula($busqueda);
                //hay un problema en el argumento JSON_UNESCAPE_UNICODE
                echo json_encode($lista);
                break;
            }    
            
        case "Create":
            {
                $objcursobean = new CursoBean();
                $objcursodao = new CursoDao();
                
                $nombrecurso = html_entity_decode($_POST['curso'], ENT_QUOTES | ENT_HTML401, "UTF-8");
                $tipocurso = $_POST['tipocurso'];
                $taller = $_POST['taller'];
                
                $objcursobean->setNombre_curso($nombrecurso);
                $objcursobean->setId_tipocurso($tipocurso);
                $objcursobean->setTaller_curso($taller);
                
                $estado = $objcursodao->InsertarCurso($objcursobean);
                
                echo ($estado===1) ? "success":"failed";
                
                break;
            }    
         
        case "Registrar":{
            
            $objcursobean = new CursoBean();
            $objcursodao = new CursoDao();
            
            $nombre = htmlentities($_POST['nombre']);
            $fechaini = $_POST['fechaini'];
            $fechafin = $_POST['fechafin'];
            $TIPOCURSO = $_POST['tipocurso'];
            $HORAS = $_POST['horas'];
            $CREDITO = $_POST['credito'];
            $NOTAMIN = $_POST['notamin'];
            $CANTIPARTICIPANTE = $_POST['cantpartici'];
            $COSTOGENERAL = $_POST['costogeneral'];
            $COSTOPUBGENERAL = $_POST['pubgeneral'];
            $COSTOCEUPSEUPG = $_POST['ceupseupg'];
            $COSTOPREGRADO = $_POST['pregrado'];
            $COSTODOCENTEADMIN = $_POST['docenteyadmin'];
            
            $objcursobean->setNombre_curso($nombre);
            $objcursobean->setFecha_inicio($fechaini);
            $objcursobean->setFecha_fin($fechafin);
            $objcursobean->setId_tipocurso($TIPOCURSO);
            $objcursobean->setHoras_curso($HORAS);
            $objcursobean->setCreditos_curso($CREDITO);
            $objcursobean->setNota_minima($NOTAMIN);
            $objcursobean->setCantidad_participante($CANTIPARTICIPANTE);
            $objcursobean->setCosto_general($COSTOGENERAL);
            $objcursobean->setCosto_publicogeneral($COSTOPUBGENERAL);
            $objcursobean->setCosto_ceups_eupg($COSTOCEUPSEUPG);
            $objcursobean->setCosto_pregrado($COSTOPREGRADO);
            $objcursobean->setCosto_docente_admin($COSTODOCENTEADMIN);
            
            $estado = $objcursodao->InsertarCursoPeriodo($objcursobean);
                      
            echo ($estado===1) ? "success":"failed";
            
            break;}
        case "ListarCursos":{
             
            $objcursodao = new CursoDao();
            $lista = $objcursodao->ObtenerCursosSinDocentes();
            echo json_encode($lista,JSON_UNESCAPED_UNICODE);
             
            break;}
        case "ListarCursosSinDocentes":{
            
            $busqueda = $_POST['busqueda'];
            $objcursodao = new CursoDao();
            $lista = $objcursodao->ObtenerCursosParaDocentes($busqueda);
            echo json_encode($lista,JSON_UNESCAPED_UNICODE);
            
        break;}
        case "ListarConFiltro":
            {
            
            $busqueda = html_entity_decode($_POST['busqueda'], ENT_QUOTES | ENT_HTML401, "UTF-8");
            $periodo = $_POST['periodo'];
            
            $objcursodao = new CursoDao();
            ///aqui revisar el detalle de cargar por periodos
            $lista = $objcursodao->ObtenerCursosPorPeriodos($busqueda,$periodo);
            echo json_encode($lista);
            
            break;
            }
        case "ListarConFiltroSinFecha":
            {
            
            $busqueda = html_entity_decode($_POST['busqueda'], ENT_QUOTES | ENT_HTML401, "UTF-8");
            $periodo = $_POST['periodo'];
            
            $objcursodao = new CursoDao();
            ///aqui revisar el detalle de cargar por periodos
            $lista = $objcursodao->ObtenerCursosPorPeriodosSinFecha($busqueda,$periodo);
            echo json_encode($lista);
            
            break;
            }
         
        case "ObtenerNombreCurso":
            {
                $objcursobean = new CursoBean();
                $objcursodao = new CursoDao();
                
                $idcurso = html_entity_decode($_POST['idcurso'], ENT_QUOTES | ENT_HTML401, "UTF-8");
                
                $objcursobean->setId_curso($idcurso);
                
                $respuesta = $objcursodao->ObtenerNombreCurso($objcursobean);
                        
                echo json_encode($respuesta);
                
                break;
            }
            
        case "Update":
            {
                $idperiodo = html_entity_decode($_POST['periodo'], ENT_QUOTES | ENT_HTML401, "UTF-8");
                $finicio = htmlentities($_POST['finicio']);
                $ftermino = htmlentities($_POST['ftermino']);
                $horas = htmlentities($_POST['horas']);
                $credito = htmlentities($_POST['creditos']);
                $notaminima = htmlentities($_POST['notamin']);
                
                $objcursobean = new CursoBean();
                $objcursodao = new CursoDao();
                
                $objcursobean->setPeriodo_curso($idperiodo);
                $objcursobean->setFecha_inicio($finicio);
                $objcursobean->setFecha_fin($ftermino);
                $objcursobean->setHoras_curso($horas);
                $objcursobean->setCreditos_curso($credito);
                $objcursobean->setNota_minima($notaminima);
                
                $estado = $objcursodao->ActualizarCursoPeriodo($objcursobean);
                
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
                
            break;
            }
            
        default :{
            echo 'SIN OPCION';
            break;}
    }
?>

