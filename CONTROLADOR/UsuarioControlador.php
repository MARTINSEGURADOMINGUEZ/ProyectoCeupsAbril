<?php
         
     session_start();
     
     require_once '../BEAN/UsuarioBean.php';
     require_once '../DAO/UsuarioDao.php';
     
     require_once '../experimental/experimetal01.php';
     
     $op = $_POST['op'];
     //$pagina = "";
     
     switch ($op)
     {
         case "login":{
             
                $username = htmlentities(strtoupper($_POST['username']));
                $password = SED::Encryption($_POST['password']);
                //$tipousu = $_POST['tipousu'];
                
                $objusubean = new UsuarioBean();
                $objusudao = new UsuarioDao();
                
                $objusubean->setUsu_USERNAME($username);
                $objusubean->setUsu_PASSWORD($password);
                //$objusubean->setUsu_TIPOUSU($tipousu);
                
                $LISTA = $objusudao->ValidarUsuarios($objusubean);
                
                header('Content-Type: application/json; charset=utf-8');
                
                $code = json_encode($LISTA,JSON_UNESCAPED_UNICODE);
                
                
                $decode = json_decode($code, true);
                
                $estado = $decode[0]['estado'];
                
                if($estado === "success")
                    {
                        echo json_encode($LISTA,JSON_UNESCAPED_UNICODE);
                        
                        $_SESSION['usunombre'] = $decode[0]['usunombre'];
                        $_SESSION['tipousu'] = $decode[0]['tipousu'];
                        $_SESSION['nomtipousu'] = $decode[0]['nomtipousu'];
                        $_SESSION['cantadmin'] = $decode[0]['cantadmin'];
                        $_SESSION['cantpersonal'] = $decode[0]['cantpersonal'];
                        /*$_SESSION['cantalumnos'] = $decode[0]['cantalumnos'];
                        $_SESSION['cantdocentes'] = $decode[0]['cantdocentes'];*/
                          
                    }else
                        {
                            echo json_encode($LISTA,JSON_UNESCAPED_UNICODE);
                        }
                
             break;}
             case "Create":{
             
                $objusudao = new UsuarioDao();
                $objusubean = new UsuarioBean();
                
                $nombre = utf8_encode($_POST['nombre']);
                $apellido = utf8_encode($_POST['apellido']);
                $email = $_POST['email'];
                $username = utf8_encode($_POST['username']);
                $password = $_POST['password'];
                $nivel = $_POST['nivel'];
                
                $objusubean->setUsu_NOMBRE(htmlentities(strtoupper($apellido.', '.$nombre)));
                $valida = $objusudao->ValidarCorreo($email);
                ($valida === 1) ? $objusubean->setUsu_EMAIL($email):$objusubean->setUsu_EMAIL('novalido@hotmail.com');
                $objusubean->setUsu_USERNAME(htmlentities(strtoupper($username)));
                $objusubean->setUsu_PASSWORD(SED::Encryption(htmlentities($password)));
                $objusubean->setUsu_TIPOUSU($nivel);
                
                $estado = $objusudao->IngresarUsuario($objusubean);
                
                /// recordar que cuando utilize esta antocacion , siempre ver los retornos y como utilizarlos , imprimir , comparar , etc.....
                
                echo ($estado===1) ? "success":"failed";
                
             break;}
         case "ObtenerDataHome":
             {
                
                    $objcursodao = new UsuarioDao();
                    
                    $datos = $objcursodao->ObtenerDatos();
                    
                    echo json_encode($datos,JSON_UNESCAPED_UNICODE);
             
                 break;
             }
         case "ObtenerDataDetalladaHome":
             {
                    $opcion = htmlentities($_POST['tipo']);
                    $LISTA = array();
                    
                    $objcursodao = new UsuarioDao();
                    
                    //PROXIMAMENTE CAMBIAR EMAIL POR ULTIMA SESION ACTIVA
                    
                    switch ($opcion)
                    {
                     case "alumnos":{
                         $LISTA = $objcursodao->ObtenerDetalleCurso();
                         break;}
                     case "admin":{
                         $LISTA = $objcursodao->ObtenerDetalleAdmin();
                         break;}
                     case "personal":{
                         $LISTA = $objcursodao->ObtenerDetallePersonal();
                         break;}
                     default :{
                         break;}
                    }
                
                echo json_encode($LISTA,JSON_UNESCAPED_UNICODE);
                
             break;
             }
             
        case "Listar":
            {
                $objusudao = new UsuarioDao();
                
                $lista = $objusudao->ListarUsuarios();
                
                echo json_encode($lista,JSON_UNESCAPED_UNICODE);
                
                break;
            }
          
         case "logout":{
                
                 unset($_SESSION['tipousu']);
                 unset($_SESSION['usunombre']);
                 session_destroy();
             
             break;}
             
         case "comprobarUsuario":
             {
                
                $usuario = htmlentities($_POST['usuario']);
             
                $objusudao = new UsuarioDao();
                $objusubean = new UsuarioBean();
                
                $objusubean->setUsu_USERNAME($usuario);
                
                $estado = $objusudao->ComprobarUsuarioExistente($objusubean);
                
                echo json_encode($estado,JSON_UNESCAPED_UNICODE);
                
             break;
             }
         case "Update":
             {
                $idusuario = $_POST['idusuario'];
                $password = SED::Encryption(htmlentities($_POST['password']));
             
                $objusudao = new UsuarioDao();
                $objusubean = new UsuarioBean();
                
                $objusubean->setUsu_ID($idusuario);
                $objusubean->setUsu_PASSWORD($password);
                
                $estado = $objusudao->ActualizarUsuario($objusubean);
                
                echo ($estado===1) ? "success":"failed";
                
                 break;
             }
         
         default :{
             echo 'no pasa nada';
             break;}
     }
    
     //header('Location: '.$pagina);
?>
