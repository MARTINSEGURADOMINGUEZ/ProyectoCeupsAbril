<?php

require_once '../DAO/ReporteDao.php';

session_start();

$op = $_POST['op'];
    
    switch ($op)
    {
        case "Obtener":{
            
            $objreportdao = new ReporteDao();
            
            unset($_SESSION['REPORTE']);
            /*unset($_SESSION['REPORTETWO']);
            unset($_SESSION['REPORTETHREE']);*/
            
            $LISTA = $objreportdao->ObtenerPorcentajeMatriculados();
            
            header('Content-Type: application/json; charset=utf-8');
            
             $_SESSION['REPORTE'] = $LISTA;
                
            
            echo "success";
            break;}
        case "Imprimir":{
            break;}
        default :{
            echo 'Esto se puso feo chico :v';
                break;
        }
    }

?>
