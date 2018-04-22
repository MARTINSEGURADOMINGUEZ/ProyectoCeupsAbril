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
    <title>Estudiantes</title>

    <?php 
        
        $LinksRoute="./";
        include './inc/links.php';
        
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.js"></script>
    <script src="js/entidadesjquery/profesorjquery.js"></script>
              
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
              <h1 class="all-tittles">S.I.G.A. NEW <small>Administración de Docentes</small></h1>
            </div>
        </div>
        
        <ul class="nav nav-tabs nav-justified" role="tablist">
            <li role="presentation" class="active"><a href="#registro" aria-controls="security" role="tab" data-toggle="tab"><B>REGISTRO DOCENTE CURSO</B></a></li>
            <li role="presentation"><a href="#mantenimiento" aria-controls="others" role="tab" data-toggle="tab"><B>MANTENIMIENTO DOCENTE CURSO</B></a></li>
        </ul>
        
        <div class="tab-content">
         <!-- HAGAMOS UN MODELO SIMILAR AL DE REGISTRO DE CURSOS -->   
        <div role="tabpanel" class="tab-pane fade in active" id="registro">
        <div class="container-fluid">
            <div id="cuadro1" name="cuadro1" class="container-flat-form">
                
                <div class="title-flat-form title-flat-blue"><B>REGISTRAR DOCENTE EN CURSO</B></div>
                
                <form id="formDocente" name="formDocente" autocomplete="off">
                    <input type="hidden" id="iddocente" name="iddocente">
                    <input type="hidden" id="idcurso" name="idcurso">
                    <div class="row">
                       <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                           <div class="input-group">
                                <span class="input-group-addon"><B>DOCENTE:</B></span>
                                <input type="text" id="docente" name="docente" class="form-control input-lg" placeholder="Busque al Docente por Apellido o DNI" required="" maxlength="200" title="Nombre del docente">
                                <span class="input-group-btn">
                                <button class="btn btn-success btn-lg" type="button" id="buscarDocente" name="buscarDocente" data-toggle="modal" data-target="#modalRegistrarDocente">Ingresar Docente</button>
                                </span>
                            </div>
                           <br>
                           <div class="input-group">
                                <span class="input-group-addon"><B>CURSO:</B></span>
                                <input type="text" id="curso" name="curso" autocomplete="off" class="form-control input-lg" placeholder="Busque el curso por su nombre" required="" maxlength="200" title="Nombre del Curso">
                            </div>
                           <br>
                            <div class="input-group">
                                <span class="input-group-addon"><B>FECHA DE INICIO:</B></span>
                                <input type="date" class="form-control input-lg" name="fechainicio" id="fechainicio" placeholder="Ingrese fecha de inicio">
                                <span class="input-group-addon"><B>FECHA DE TERMINO:</B></span>
                                <input type="date" class="form-control input-lg" name="fechatermino" id="fechatermino" placeholder="Ingrese fecha de termino">
                           </div>
                           <br>
                           
                           <div class="form-group">
                               <label>OBSERVACIÓN</label>
                               <textarea id="observacion" name="observacion" class="form-control input-lg" rows="5" style="text-transform:uppercase;" cols="40"></textarea>
                           </div>
                           
                            <p class="text-center">
                                <button id="clear" name="clear" class="btn btn-info btn-lg" style="margin-right: 20px;"><i class="zmdi zmdi-roller"></i> &nbsp;&nbsp; Limpiar</button>
                                <button id="registrar" name="registrar" class="btn btn-primary btn-lg"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Registrar</button>
                            </p> 
                       </div>
                    </div>
                </form>
                
            </div>
        </div>
        </div>
        
         <div role="tabpanel" class="tab-pane fade" id="mantenimiento">
            <div class="container-flat-form">
                <div class="title-flat-form title-flat-blue"><B>MANTENIMIENTO DE DOCENTES EN CURSO</B></div>
                <form autocomplete="off">
                    <div class="row">
                       <div class="col-sm-12 col-md-12 col-lg-12">
                           <div class="col-sm-offset-2 col-sm-8">
				<h3 class="text-center"> <small class="mensaje"></small></h3>
			</div>
			<div class="table-responsive col-xs-12 col-sm-12">		
				<table id="dt_profesor" name="dt_profesor" class="table table-bordered table-hover" cellspacing="0" width="100%">
					<thead>
						<tr>								
							<th>NOMBRES</th>
                                                        <th>CURSO</th>
							<th>FECHA INICIO</th>
                                                        <th>FECHA TERMINO</th>
                                                        <th></th>
						</tr>
					</thead>					
				</table>
			</div>
                       </div>
                   </div>
                </form>
            </div>
        <!-- -->
        </div>
        </div>
        
        <div class="modal fade" id="modalRegistrarDocente" role="dialog">
            <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="btn btn-danger close" data-dismiss="modal">
                        <span aria-hidden="true">X</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h3 class="modal-title" id="myModalLabel"><center><B>DATOS DEL DOCENTE</B></center></h3>
                </div>
                <!-- Modal Body -->
                <?php include './modals/modalRegistrarProfesor.php'; ?>
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <center>
                        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal"><B>Cerrar</B></button>
                        <button type="button" class="btn btn-success btn-lg" id="registrarDocente" name="registrarDocente"><B>Registrar</B></button>
                    </center>
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
