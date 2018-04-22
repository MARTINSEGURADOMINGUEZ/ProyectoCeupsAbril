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
    <title>Cursos</title>

    <?php 
        
        $LinksRoute="./";
        include './inc/links.php';
        
    ?>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.js"></script>
    <script src="js/entidadesjquery/cursojquery.js"></script>
            
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
              <h1 class="all-tittles">S.I.A.G.A <small>Mantenimiento de Cursos</small></h1>
            </div>
        </div>
        
        <ul class="nav nav-tabs nav-justified" role="tablist">
            <li role="presentation" class="active"><a href="#registro" aria-controls="security" role="tab" data-toggle="tab"><B>Nuevo Curso</B></a></li>
            <li role="presentation" id="manticurso" ><a href="#mantenimiento" aria-controls="others" role="tab" data-toggle="tab"><B>Mantenimiento de Curso</B></a></li>
        </ul>
        
        <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade in active" id="registro">
            <div class="container-fluid">
                <div class="container-flat-form">
                    <div class="title-flat-form title-flat-blue"><B>REGISTRO DE NUEVO CURSO PERIODO <?php echo date('Y'); ?></B></div>
                    <form id="formRegistroCurso" name="formRegistroCurso" autocomplete="off">
                        <input type="hidden" name="idcurso" id="idcurso">
                            <div class="row">
                            <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                            <span><B>CURSO:</B></span>
                            <div class="input-group">
                                <input type="text" id="nombrecurso" name="nombrecurso" autocomplete="off" class="form-control input-lg" placeholder="Busque el curso por su nombre" required="" maxlength="200" title="Nombre del Curso">
                                <span class="input-group-btn">
                                <button class="btn btn-success btn-lg" type="button" id="buscarAlumno" name="buscarAlumno" data-toggle="modal" data-target="#modalCurso">Registrar Curso</button>
                                </span>
                            </div>
                           <br>
                           <br>
                            <div class="group-material">
                                <input type="date" id="fechini" name="fechini" data-format="dd/MM/yyyy" class="material-control tooltips-general" placeholder="Ingrese la fecha de inicio" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Fecha de Inicio">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>FECHA DE INICIO</label>
                            </div>
                            <div class="group-material">
                                <input type="date" id="fechfin" name="fechfin" class="material-control tooltips-general" placeholder="Ingrese la fecha de termino" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Fecha de Termino">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>FECHA DE CIERRE</label>
                            </div>
                           <div class="group-material">
                                <span>TIPO DE CURSO</span>
                                <select id="tipocurso" name="tipocurso" class="material-control tooltips-general" data-toggle="tooltip" data-placement="top" title="Selccione el tipo de curso">
                                    <option value="" disabled="" selected="">Seleccione el tipo de curso</option>
                                    <option value="1" >PRESENCIAL</option>
                                    <option value="2">IN-HOUSE</option>
                                    <!--option value="3" >SEMI-PRESENCIAL</option>
                                    <option value="4">VIRTUAL</option-->
                                </select>
                            </div>
                           <div class="group-material">
                               <input type="text" id="horas" name="horas" class="material-control tooltips-general" placeholder="Horas Academicas"  required="" minlength="1"  data-toggle="tooltip" data-placement="top" title="Ingrese la cantidad de horas">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>HORAS</label>
                            </div>
                           <div class="group-material">
                               <input type="text" id="creditos" name="creditos" class="material-control tooltips-general" placeholder="Creditos Academicos" rows="1" required=""  maxlength="99" data-toggle="tooltip" data-placement="top" title="Ingrese la cantidad de creditos">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>CREDITOS</label>
                            </div>
                           <div class="group-material">
                               <input type="text" id="notamin" name="notamin" class="material-control tooltips-general"  min="10" max="20" title="Ingrese la nota minima">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>NOTA MINIMA</label>
                            </div>
                            <legend><h2>Costos por tipo curso</h2></legend>
                            <br>
                           <div id="presencial" name="presencial">
                           <div class="group-material">
                               <input type="text" id="pubgeneral" name="pubgeneral" class="material-control tooltips-general" placeholder="Costo Publico General"  required="" minlength="1"  data-toggle="tooltip" data-placement="top" title="Publico General">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>PUBLICO GENERAL</label>
                            </div>
                            <div class="group-material">
                               <input type="text" id="ceupseupg" name="ceupseupg" class="material-control tooltips-general" placeholder="Costo Alumnos CEUPS - EUPG"  required="" minlength="1"  data-toggle="tooltip" data-placement="top" title="Alumnos CEUPS - EUPG">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>ALUMNOS CEUPS - EUPG</label>
                            </div>
                            <div class="group-material">
                               <input type="text" id="pregrado" name="pregrado" class="material-control tooltips-general" placeholder="Costo Pregrado"  required="" minlength="1"  data-toggle="tooltip" data-placement="top" title="Alumnos Pregrado">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>ALUMNOS PREGRADO</label>
                            </div>
                            <div class="group-material">
                               <input type="text" id="docenteadmin" name="docenteadmin" class="material-control tooltips-general" placeholder="Costo Personal Docente y Administrativo"  required="" minlength="1"  data-toggle="tooltip" data-placement="top" title="Personal Docente y Administrativo">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>PERSONAL DOCENTE Y ADMIN.</label>
                            </div>
                           </div>
                           <div id="inhouse" name="inhouse" >
                           <div class="group-material">
                               <input type="text" id="cantidadparticip" name="cantidadparticip" class="material-control tooltips-general" placeholder="Cantidad de Participantes"  required="" minlength="1"  data-toggle="tooltip" data-placement="top" title="Ingrese la cantidad de participantes">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>CANTIDAD PARTICIPANTES</label>
                           </div>    
                           <div class="group-material">
                               <input type="text" id="costogeneral" name="costogeneral" class="material-control tooltips-general" placeholder="Horas Academicas"  required="" minlength="1"  data-toggle="tooltip" data-placement="top" title="Ingrese la cantidad de horas">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>COSTO GENERAL</label>
                            </div>
                           </div>
                           
                            <p class="text-center">
                                <button type="reset" class="btn btn-info btn-lg" style="margin-right: 20px;"><i class="zmdi zmdi-roller"></i> &nbsp;&nbsp; Limpiar</button>
                                <button id="register" name="register" class="btn btn-primary btn-lg"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Registrar</button>
                            </p> 
                       </div>
                    </div>
                </form>
            </div>
            </div>
            </div>
            <!-- -->
            <div role="tabpanel" class="tab-pane fade" id="mantenimiento">
            <div  class="container-flat-form">
                <div class="title-flat-form title-flat-blue"><B>MANTENIMIENTO DE CURSOS</B></div>
                <form autocomplete="off">
                    <div class="row">
                       <div class="col-sm-12 col-md-12 col-lg-12">
                           <div class="col-sm-offset-2 col-sm-8">
				<h3 class="text-center"> <small class="mensaje"></small></h3>
			</div>
			<div class="table-responsive col-xs-12 col-sm-12">		
				<table id="dt_cursos" name="dt_cursos" class="table table-bordered table-hover" cellspacing="0" width="100%">
					<thead>
						<tr>								
							<th>NOMBRE</th>
                                                        <th>FECHA INICIO</th>
							<th>FECHA FIN</th>
                                                        <th></th>											
						</tr>
					</thead>					
				</table>
			</div>
                       </div>
                   </div>
                </form>
            </div>
            </div>
        <!-- -->
        </div>
        
        <div class="modal fade" id="modalCurso" role="dialog">
                <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="btn btn-danger close" data-dismiss="modal">
                            <span aria-hidden="true">X</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <h3 class="modal-title" id="myModalLabel"><center><B>Datos del Curso</B></center></h3>
                    </div>
                    <!-- Modal Body -->
                    <?php include './modals/modalRegistrarCurso.php'; ?>
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <center>
                            <button type="reset" class="btn btn-danger btn-lg" data-dismiss="modal"><B>Cerrar</B></button>
                            <button type="button" class="btn btn-success btn-lg" id="registraCurso" name="registraCurso"><B>Registrar</B></button>
                        </center>
                    </div>
                </div>
            </div>
            </div>
        
        <div class="modal fade" id="modalActualizarCurso" role="dialog">
                <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="btn btn-danger close" data-dismiss="modal">
                            <span aria-hidden="true">X</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <h3 class="modal-title" id="myModalLabel"><center><B>Actualizar Datos Curso</B></center></h3>
                    </div>
                    <!-- Modal Body -->
                    <?php include './modals/modalActualizarCurso.php'; ?>
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <center>
                            <button type="reset" class="btn btn-danger btn-lg" data-dismiss="modal"><B>Cerrar</B></button>
                            <button type="button" class="btn btn-success btn-lg" id="modificarCurso" name="modificarCurso"><B>Modificar</B></button>
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
