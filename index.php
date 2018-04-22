<?php

    session_start();
    
    if(isset($_SESSION['tipousu']))
        {
        header('Location: home.php');
        }else
            {
                
            }
   
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Inicio de sesión</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Shortcut Icon" type="image/x-icon" href="assets/icons/book.ico" />
    <script src="js/sweet-alert.min.js"></script>
    <link rel="stylesheet" href="css/sweet-alert.css">
    <link rel="stylesheet" href="css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')</script>
    <script  src="js/jquery-1.11.2.min.js" ></script>
    <script  src="js/modernizr.js"></script>
    <script  src="js/bootstrap.min.js"></script>
    <script  src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script  src="js/main.js"></script>
    <script  src="js/javascript.js"></script>
    <style>
        .posicionado{
	margin:50px auto;
	
        }
    </style>
</head>

<body >
    
        <div class="container">
            
            <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="1"><img class="posicionado" src="img/logo_unfv.gif" align="left" alt=""  width="215" height="79"/></td>
                    </tr>
                    </table>
                </td>
                <td>
                    <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td width="1"><div id="slogan">
                        <div style="position:absolute; top:60px; left:500px; margin-left:-120px; width:550px; height:30px; font-size:30px; color:#000; font-family:'Courier New', Courier, monospace;">
                    <marquee direction="left" width="100%" scrollamount="7" >
                        <font color="#000000"><span class="all-tittles">Sistema Integrado Académico de Gestión  Administrativa <-> S.I.A.G.A. </span></font>
                    </marquee>
                        </div>
                     </div></td>
                                    </tr>
                                </table>
                            </td> 
                        </tr>
                    </table>
                </td>
                <td>
                <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="1"><img class="posicionado" src="img/logo_ceups.jpg" align="right" alt="" align="top: 25px;" width="215" height="79"/></td>
                    </tr>
                    </table>
                </td>
                </tr>
            </table>
            <div class="col-sm-10" style="width: 600px; margin-left: 250px; margin-top: 10px;">
                <div class="jumbotron">
                    <div class="form-group" style="margin-top: -50px;">
                        <h2 style="margin-left: 150px;">
                            <B>INICIAR SESIÓN</B>
                        </h2>
                    </div>
                    <hr>
                    <form class="form-signin">
                        <div class="form-group input-group">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-user"></span>
                            </span>
                            <input type="text" class="input-lg form-control" name="username" id="username" placeholder="Ingrese su usuario" required autofocus>
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-lock"></span>
                            </span>
                            <input type="password" class="input-lg form-control" name="password" id="password" placeholder="Ingrese su Contraseña" required="">
                        </div>
                        <!--div class="form-group">
                            <label>
                                <input type="checkbox">
                                Recuerdame
                            </label>
                        </div-->
                        <div class="form-group">
                            <button class="btn btn-lg btn-primary btn-block" style="width: 450px;" id="login" name="login"><B>INGRESAR</B></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <div class="container-fluid">
        <?php 
        include './inc/footer.php';
        ?>
    </div>
    
</body>
</html>