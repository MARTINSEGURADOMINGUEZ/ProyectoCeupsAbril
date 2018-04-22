<?php

    require_once '../experimental/smsGateway.php';
    // https://www.youtube.com/watch?v=0G6ktJjKe7w&t=277s
        
    $objsmsgateway = new SmsGateway('martin.segura_d@hotmail.com','martin123');
            
    $mensaje = "esto es un mensaje de prueba , se ah postergado el curso hasta nuevo aviso. atte: ceups";
    
    //recordar siempre cambiar el device ID;
    $resultado = $objsmsgateway->sendMessageToNumber('986635188', $mensaje, '83552');
    
    echo json_encode($resultado);

?>


