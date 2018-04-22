<?php
    date_default_timezone_set('America/Lima');
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
    <title>Exportar Correos</title>

    <?php 
        
        $LinksRoute="./";
        include './inc/links.php';
        
    ?>
    
    <script src="js/entidadesjquery/exportarcorreosjquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.js"></script>
            
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
              <h1 class="all-tittles">S.I.A.G.A <small>Exportar Correos PreInscritos , Matriculados Y Base de Datos Externas</small></h1>
            </div>
        </div>
        
        <ul class="nav nav-tabs nav-justified" role="tablist">
            <li role="presentation" class="active"><a href="#preinscritos" aria-controls="security" role="tab" data-toggle="tab"><B>PreInscritos</B></a></li>
            <li role="presentation"><a href="#matriculados" aria-controls="others" role="tab" data-toggle="tab"><B>Matriculados</B></a></li>
            <li role="presentation"><a href="#bdexternos" aria-controls="others" role="tab" data-toggle="tab"><B>BD EXTERNAS</B></a></li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="preinscritos">
                
                <div class="container-fluid">
                 
                 <div id="cuadro1" name="cuadro1" class="container-flat-form">
                <div class="title-flat-form title-flat-blue">EXPORTAR CORREOS PREINSCRITOS</div>
                <form autocomplete="off">
                    <div class="row">
                       <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                           
                            <div class="group-material">
                                <input type="text" id="campcertificado" name="campcertificado" autocomplete="off" class="material-control tooltips-general" placeholder="Ingrese el Nombre del nuevo curso" required="" maxlength="200" data-toggle="tooltip" data-placement="top" title="Nombre del curso">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>CURSO</label>
                            </div>
                           
                            <p class="text-center">
                                <button id="datoscertificado" name="datoscertificado" class="btn btn-success"><i class="zmdi zmdi-floppy"></i>&nbsp;&nbsp;<B>Generar Datos Certificado</b></button>
                            </p> 
                       </div>
                    </div>
                </form>
            </div>
            </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="matriculados">
            <div class="container-fluid">
            <div id="cuadro3" name="cuadro3" class="container-flat-form">
                <div class="title-flat-form title-flat-blue">EXPORTAR CORREOS MATRICULADOS</div>
                <form autocomplete="off">
                    <div class="row">
                       <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                           
                            <div class="group-material">
                                <input type="text" id="campcertificado" name="campcertificado" autocomplete="off" class="material-control tooltips-general" placeholder="Ingrese el Nombre del nuevo curso" required="" maxlength="200" data-toggle="tooltip" data-placement="top" title="Nombre del curso">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>CURSO</label>
                            </div>
                           
                            <p class="text-center">
                                <button id="datoscertificado" name="datoscertificado" class="btn btn-success"><i class="zmdi zmdi-floppy"></i>&nbsp;&nbsp;<B>Generar Datos Certificado</b></button>
                            </p> 
                       </div>
                    </div>
                </form>
            </div>
            
        </div>
        </div>
        
        <div role="tabpanel" class="tab-pane fade" id="bdexternos">
        <div class="container-fluid">
            <div sclass="container-flat-form">
                <div class="title-flat-form title-flat-blue">EXPORTAR CORREOS BD EXTERNAS</div>
                <form autocomplete="off">
                    <div class="row">
                       <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                           
                            <div class="group-material">
                                <input type="text" id="campcertificado" name="campcertificado" autocomplete="off" class="material-control tooltips-general" placeholder="Ingrese el Nombre del nuevo curso" required="" maxlength="200" data-toggle="tooltip" data-placement="top" title="Nombre del curso">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>CURSO</label>
                            </div>
                           
                            <p class="text-center">
                                <button id="datoscertificado" name="datoscertificado" class="btn btn-success"><i class="zmdi zmdi-floppy"></i>&nbsp;&nbsp;<B>Generar Datos Certificado</b></button>
                            </p> 
                       </div>
                    </div>
                </form>
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