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
    <title>Notas y Certificados</title>

    <?php 
        
        $LinksRoute="./";
        include './inc/links.php';
        
    ?>
    
    <script src="js/entidadesjquery/notascertificados.js"></script>
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
              <h1 class="all-tittles">S.I.G.A. NEW <small>Administración de Notas y Certificados</small></h1>
            </div>
        </div>
        <ul class="nav nav-tabs nav-justified" role="tablist">
            <li role="presentation" class="active"><a href="#notas" aria-controls="security" role="tab" data-toggle="tab"><B>Calificaciones</B></a></li>
            <li role="presentation"><a href="#certificados" aria-controls="others" role="tab" data-toggle="tab"><B>Certificados</B></a></li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="notas">
                <div class="container-fluid">
                    
                    <div id="cuadro1" name="cuadro1" class="container-flat-form">
                    <div class="title-flat-form title-flat-blue"> REGISTRO DE CALIFICACIONES </div>
                    
                  <form autocomplete="off">
                    <div class="row">
                       <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                           
                           <div class="group-material">
                                <input type="text" id="campnotas" name="campnotas" autocomplete="off" class="material-control tooltips-general" placeholder="Busque el nombre del curso" required="" maxlength="200" data-toggle="tooltip" data-placement="top" title="Nombre del curso a buscar">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>CURSO</label>
                            </div>
                           <p class="text-center">
                               <button id="listacontrol" name="listacontrol" class="btn btn-success"><i class="zmdi zmdi-floppy"></i>&nbsp;&nbsp;<B>Generar Listado de Control</B></button>
                            </p> 
                           
                       </div>
                    </div>
                </form>
                           
                    </div>
                </div>
                
            </div>
            <div role="tabpanel" class="tab-pane fade" id="certificados">
        <div class="container-fluid">
            <div id="cuadro2" name="cuadro2" class="container-flat-form">
                <div class="title-flat-form title-flat-blue">ELABORACION DE DATOS PARA CERTIFICADOS</div>
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
            <div id="cuadro3" name="cuadro3" class="container-flat-form">
                <div class="title-flat-form title-flat-blue" id='nombrecurso' name='nombrecurso'></div>
                <form autocomplete="off">
                    <div class="row">
                       <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                        <p class="text-center">
                                <button id="plantilla" name="plantilla"class="btn btn-success"><i class="zmdi zmdi-floppy"></i>&nbsp;&nbsp;<B>Exportar Plantilla Certificado</b></button>
                            </p> 
                       </div>
                    </div>
                </form>
                <form autocomplete="off">
                    <div class="row">
                <div class="table-responsive col-xs-12 col-sm-12">		
				<table id="dt_certificado" name="dt_certificado" class="table table-bordered table-hover" cellspacing="0" width="100%">
					<thead>
						<tr>								
							<th>DNI</th>
                                                        <th>NOMBRES</th>
							<th>CONDICION</th>
							<th>OBSERVACION</th>											
						</tr>
					</thead>					
				</table>
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
