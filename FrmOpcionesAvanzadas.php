
<?php

session_start();
    
    if(isset($_SESSION['tipousu']))
    {
        
    }else
        {
            header('Location: index.php');
        }
        
    $nombre = $_SESSION['usunombre'];
    $tipousu = $_SESSION['tipousu'];
    $nontipusu = $_SESSION['nomtipousu'];
        
?>

<html lang="es">
<head>
    <title>Configuraciones avanzadas</title>
    <?php 
        
        $LinksRoute="./";
        include './inc/links.php';
        
    ?>
</head>
<body>
    
    <?php
        include './inc/NavLateral.php';
    ?>
    
    <div class="content-page-container full-reset custom-scroll-containers">
        
        <?php
            include './inc/NavInfo.php';
        ?>
        
        <div class="container">
            <div class="page-header">
              <h1 class="all-tittles">S.I.A.G.A. <small>configuraciones avanzadas</small></h1>
            </div>
        </div>
        <ul class="nav nav-tabs nav-justified" role="tablist">
            <li role="presentation" class="active"><a href="#security" aria-controls="security" role="tab" data-toggle="tab"><B>Seguridad</B></a></li>
            <li role="presentation"><a href="#others" aria-controls="others" role="tab" data-toggle="tab"><B>Nuevas Herramientas</B></a></li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="security">
                <div class="container-fluid"  style="margin: 50px 0;">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-3">
                            <p class="text-center text-danger"><i class="zmdi zmdi-shield-security zmdi-hc-5x"></i></p>
                        </div>
                        <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
                            Puedes realizar copias de seguridad de la base de datos en cualquier momento, también puedes restaurar el sistema a un punto de restauración que hayas creado previamente.
                        </div>
                    </div>
                </div>  
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="report-content">
                                <p class="text-center"><i class="zmdi zmdi-cloud-download zmdi-hc-4x"></i></p>
                                <h3 class="text-center all-tittles"><a href="php/Backup.php">Realizar Copia de Seguridad</a></h3>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="report-content">
                                <p class="text-center"><i class="zmdi zmdi-male-female zmdi-hc-4x"></i></p>
                                <h3 class="text-center all-tittles"><a href="FrmUsuario.php">Matenimiento Usuarios</a></h3>
                            </div>
                        </div>
                        <!--div class="col-xs-12 col-md-6">
                            <div class="report-content">
                                <p class="text-center"><i class="zmdi zmdi-cloud-upload zmdi-hc-4x"></i></p>
                                <h3 class="text-center all-tittles">restaurar el sistema</h3>
                            </div>
                        </div-->
                        <!--div class="col-xs-12 col-md-6">
                            <div class="report-content">
                                <p class="text-center"><i class="zmdi zmdi-cloud-off zmdi-hc-4x"></i></p>
                                <h3 class="text-center all-tittles">borrar copias de seguridad</h3>
                            </div>
                        </div-->
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="others">
                <div class="container-fluid"  style="margin: 50px 0;">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-3">
                            <p class="text-center text-danger"><i class="zmdi zmdi-fire zmdi-hc-5x"></i></p>
                        </div>
                        <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
                            En esta sección se anexaran nuevas funciones del sistema que ayuden a procesos de Marketing
                            ,Ventas y/o Reportes.
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="report-content">
                                <p class="text-center"><i class="zmdi zmdi-book zmdi-hc-4x"></i></p>
                                <h3 class="text-center all-tittles"><a href="FrmExportarCorreos.php">Exportar Correos</a></h3>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="report-content">
                                <p class="text-center"><i class="zmdi zmdi-book zmdi-hc-4x"></i></p>
                                <h3 class="text-center all-tittles"><a href="#">Importar/Crear Grupos de Correos</a></h3>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="report-content">
                                <p class="text-center"><i class="zmdi zmdi-time-restore-setting zmdi-hc-4x"></i></p>
                                <h3 class="text-center all-tittles"><a href="#">Mensajeria SMS Publicitaria</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>      
        
        <?php
                include './inc/footer.php';
        ?>
    </div>
</body>
</html>