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
<html>
    <head>
        <title>PreInscritos</title>
        <?php 
        $LinksRoute="./";
        include './inc/links.php';
        ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.js"></script>
        <script src="js/entidadesjquery/preinscritojquery.js"></script>
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
              <h1 class="all-tittles">S.I.A.G.A. <small>Administración de PreInscritos</small></h1>
            </div>
        </div>
        
        <ul class="nav nav-tabs nav-justified" role="tablist">
            <li role="presentation" class="active"><a href="#registro" aria-controls="security" role="tab" data-toggle="tab"><B>Nuevo PreInscrito</B></a></li>
            <li role="presentation"><a href="#mantenimiento" aria-controls="others" role="tab" data-toggle="tab"><B>Mantenimiento de PreInscrito</B></a></li>
        </ul>
        
        <div class="tab-content">
            
        <div role="tabpanel" class="tab-pane fade in active" id="registro">
        <div class="container-fluid">
            <div class="container-flat-form">
                <div class="title-flat-form title-flat-blue"><B>FICHA REGISTRO DE PREINSCRITOS</B></div>
                <form id="registropreinscrito" name="registropreinscrito" autocomplete="off">
                    <input type="hidden" id="idcurso" name="idcurso">
                    <input type="hidden" id="alumnoid" name="alumnoid">
                    <div class="row">
                       <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                           <legend><center><h2><B>Datos de PreInscrito</B></h2></center></legend>
                           <br>
                           <div class="input-group">
                                
                                <span class="input-group-addon"><B>CURSO:</B></span>
                                <input type="text" id="cursopreins" name="cursopreins" autocomplete="off" class="form-control input-lg" placeholder="Busque el curso por su nombre" required="" maxlength="200" title="Nombre del curso">
                                <span class="input-group-btn">
                                <button class="btn btn-success btn-lg" type="button" id="registrarCursoModal" name="registrarCursoModal" data-toggle="modal" data-target="#modalRegistrarCurso">Registre Curso</button>
                                </span>
                            </div>
                           <br>
                            <div class="group-material">
                                <span>CONDICIÓN</span>
                                <select id="condicion" name="condicion" class="form-control input-lg" title="Tipo de PreInscrito">
                                    <option value="" disabled="" selected="">Selecciona el tipo</option>
                                    <option value="1" >PUBLICO GENERAL</option>
                                    <option value="2">ALUMNOS CEUPS - EUPG UNFV</option>
                                    <option value="3">ALUMNOS PREGRADO</option>
                                    <option value="4">PERSONAL DOCENTE Y ADMIN.</option>
                                </select>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon"><B>ALUMNO:</B></span>
                                <input type="text" id="alumnopreins" name="alumnopreins" class="form-control input-lg" placeholder="Busque al Alumno por Apellido o DNI" required="" maxlength="200" title="Nombre del alumno">
                                <span class="input-group-btn"> <a>&nbsp;</a>
                                <button class="btn btn-success btn-lg" type="button" id="registrarPreInsModal" name="registrarPreInsModal" data-toggle="modal" data-target="#modalAlumnoPreIns">Ingresar PreInscrito</button>
                                </span>
                            </div>
                           <br>
                           <div class="input-group">
                                <span class="input-group-addon"><B>EMAIL:</B></span>
                                <input type="text" id="emailpreins" name="emailpreins" disabled="" class="form-control input-lg" placeholder="Email del preinscrito" required="" maxlength="200" title="Email del PreInscrito">
                            </div>
                           <br>
                           <br>
                            <div class="input-group">
                                <!--span>FECHA DE CONTACTO</span-->
                                <input type="date" id="fechacont" name="fechacont" class="form-control input-lg" required="" title="Fecha de contacto">
                                <span class="input-group-addon">
                                    <B> ¿Se comunico Fuera de fecha?</B>
                                    <label class="radio-inline">
                                    <input name="fuera_de_fecha" id="fuera_de_fecha" value="1" required="" type="radio"> 
                                    <span style="color:green;">SI
                                    </span>
                                    </label>
                                    <label class="radio-inline">
                                        <input name="fuera_de_fecha" id="fuera_de_fecha" checked="" value="0" type="radio">
                                    <span style="color:red;"> NO </span>
                                    </label>
                                </span>
                            </div>
                           <br>
                            <div class="group-material">
                                <select id="difucion" name="difucion" class="form-control input-lg" title="Tipo de contacto">
                                    <option value="" disabled="" selected="">Selecciona el tipo de contacto</option>
                                    <option value="1">CORREO</option>
                                    <option value="2">FACEBOOK</option>
                                    <option value="3">WEB-UNFV</option>
                                    <option value="4">WEB-PRIVADA</option>
                                </select>
                            </div>
                           
                           <legend><center><h2>OBSERVACIONES</h2></center></legend>
                            <br>
                            <div class="form-horizontal">
                               <label>OBSERVACIÓN</label>
                               <textarea id="observacion" name="observacion" type="text" class="form-control" style="text-transform:uppercase;" rows="3" cols="40"></textarea>
                           </div>
                           <br>
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
            
            <div role="tabpanel" class="tab-pane fade" id="mantenimiento">
                <div class="container-flat-form">
                    <div class="title-flat-form title-flat-blue"><B>MANTENIMIENTO DE PREINSCRITOS</B></div>
                    <input type="hidden" id="idcursobusqueda" name="idcursobusqueda">
                            <div class="group-material">
                                <!--input type="text" id="cursopreins" name="cursopreins" autocomplete="off" class="form-control input-lg" placeholder="Busque el curso por su nombre" required="" maxlength="200" title="Nombre del curso"-->
                                <div class="input-group">
                                <span class="input-group-addon"><B>CURSO:</B></span>
                                <input type="text" id="busquedacursopreins" name="busquedacursopreins" autocomplete="off" class="form-control input-lg" placeholder="Busque el nombre del curso" required="" maxlength="200" title="Nombre del curso">
                                <span class="input-group-btn">
                                    <button class="btn btn-success btn-lg" type="button" id="buscarPreInsCurso" name="buscarPreInsCurso"><B>Buscar PreInscrito Por Curso</B></button>
                                </span>
                                </div>
                                <select class="form-control input-lg" id="periodo" name="periodo" >
                                        <?php for($i=2014;$i<=date('Y');$i++){ ?>
                                    <option value="<?php echo $i;?>" <?php if($i==date('Y')){ echo " selected= '' ";} ?> > <?php echo $i;?></option>
                                        <?php }?>
                                </select>
                            </div>
                    <form autocomplete="off">
                        <div class="row">
                       <div class="col-sm-12 col-md-12 col-lg-12">
                           
                                <div class="table-responsive col-xs-12 col-sm-12">		
                                    <table id="dt_preinscrito" name="dt_preinscrito" class="table table-bordered table-hover" cellspacing="0" width="100%">
					<thead>
						<tr>
                                                        <th>FECHA</th>
							<th>NOMBRES</th>
                                                        <th>EMAIL</th>
                                                        <th>CELULAR</th>
							<th>CURSO</th>
							<th>OBSERVACION</th>
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
            </div>
        
            
            <div class="modal fade" id="modalAlumnoPreIns" role="dialog">
                <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="btn btn-danger close" data-dismiss="modal">
                            <span aria-hidden="true">X</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <h3 class="modal-title" id="myModalLabel"><center><B>Datos PreInscrito</B></center></h3>
                    </div>
                    <!-- Modal Body -->
                    <?php include './modals/modalRegistrarPreInscrito.php'; ?>
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <center>
                            <button type="button" class="btn btn-danger btn-lg" id="cerrarmodal" name="cerrarmodal"><B>Cerrar</B></button>
                            <button type="button" class="btn btn-success btn-lg" id="registrarPreIns" name="registrarPreIns"><B>Registrar</B></button>
                        </center>
                    </div>
                </div>
                </div>
            </div>
            
            <div class="modal fade" id="modalModificarPreInscrito" role="dialog">
                <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="btn btn-danger close" data-dismiss="modal">
                            <span aria-hidden="true">X</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <h3 class="modal-title" id="myModalLabel"><center><B>Actualizar Datos PreInscrito</B></center></h3>
                    </div>
                    <!-- Modal Body -->
                    <?php include './modals/modalModificarPreInscrito.php'; ?>
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <center>
                            <button type="button" class="btn btn-danger btn-lg" id="cerrarmodal" name="cerrarmodal"><B>Cerrar</B></button>
                            <button type="button" class="btn btn-success btn-lg" id="actualizarAlumno" name="actualizarAlumno"><B>Actualizar</B></button>
                        </center>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal fade" id="modalRegistrarCurso" role="dialog">
                <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="btn btn-danger close" data-dismiss="modal">
                            <span aria-hidden="true">X</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <h3 class="modal-title" id="myModalLabel"><center><B>Datos del Nuevo Curso</B></center></h3>
                    </div>
                    <!-- Modal Body -->
                    <?php include './modals/modalRegistrarCurso.php'; ?>
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <center>
                            <button type="button" class="btn btn-danger btn-lg" id="cerrarmodalcurso" name="cerrarmodalcurso"><B>Cerrar</B></button>
                            <button type="button" class="btn btn-success btn-lg" id="registrarCurso" name="registrarCurso"><B>Registrar</B></button>
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