<?php
session_start();
if(isset($_SESSION['tipousu']))
{}else
{
header('Location: index.php');
}
$nombre = $_SESSION['usunombre'];
$tipousu = $_SESSION['tipousu'];
$nontipusu = $_SESSION['nomtipousu'];
?>
<html lang="es">
<head>
    <title>Matricula</title>

    <?php 
        
        $LinksRoute="./";
        include './inc/links.php';
        
    ?>
    
    <script src="js/entidadesjquery/matriculajquery.js"></script>
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
              <h1 class="all-tittles">S.I.A.G.A. <small>Administración de Matriculas</small></h1>
            </div>
        </div>
        
        <ul class="nav nav-tabs nav-justified" role="tablist">
            <li role="presentation" class="active"><a href="#registro" aria-controls="security" role="tab" data-toggle="tab"><B>Nueva Matricula</B></a></li>
            <li role="presentation"><a href="#mantenimiento" id="mantenimientodepal" name="mantenimientodepal" aria-controls="others" role="tab" data-toggle="tab"><B>Mantenimiento de Matricula</B></a></li>
        </ul>
        
        <div class="tab-content">
            
            <div role="tabpanel" class="tab-pane fade in active" id="registro">
             <div class="container-fluid">
            <div class="container-flat-form">
                <div class="title-flat-form title-flat-blue"><B>REGISTRO DE MATRICULA</B></div>
                <form id="formmatricula" name="formmatricula" autocomplete="off">
                    <input type="hidden" name="idcurso" id="idcurso">
                    <input type="hidden" name="nombrecurso" id="nombrecurso">
                    <input type="hidden" name="idalumno" id="idalumno">
                    
                    <input type="hidden" name="idcatecurso" id="idcatecurso">
                    <input type="hidden" name="cantipartici" id="cantipartici">
                    <input type="hidden" name="costogeneral" id="costogeneral">
                    
                    <input type="hidden" name="preciomarcado" id="preciomarcado">
                    <input type="hidden" name="deuda" id="deuda">
                    
                    <input type="hidden" name="docentechange" id="docentechange">
                    <div class="row">
                       <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                           <div class="input-group">
                                <span class="input-group-addon"><B>CURSO:</B></span>
                                <input type="text" id="curso" name="curso" autocomplete="off" class="form-control input-lg" placeholder="Busque el curso por su nombre" required="" maxlength="200" title="Nombre del Curso">
                            </div>
                           <br>
                           <div class="input-group">
                                <span class="input-group-addon"><B>DOCENTE:</B></span>
                                <input type="text" id="docente" name="docente" autocomplete="off" placeholder="NO REGISTRADO" disabled="" class="form-control input-lg" required="" maxlength="200" title="Nombre del Docente">
                            </div>
                           <br>
                            <div class="input-group">
                                <input type="text" id="alumno" name="alumno" class="form-control input-lg" placeholder="Busque al Alumno por Apellido o DNI" required="" maxlength="200" title="Nombre del alumno">
                                <span class="input-group-btn">
                                <button class="btn btn-success btn-lg" type="button" id="buscarAlumno" name="buscarAlumno" data-toggle="modal" data-target="#modalAlumno">Ingresar Alumno</button>
                                </span>
                            </div>
                           <br>
                           <div class="group-material">
                           <select id="tipoalumno" name="tipoalumno" class="form-control input-lg">
                             <option value="" disabled="" selected="">Seleccione el tipo de Alumno</option>
                                    <!--option value="6" >PUBLICO GENERAL</option>
                                    <option value="8">ALUMNO CEUPS - EUPG UNFV</option>
                                    <option value="3" >ALUMNO UNIV. PREGRADO</option>
                                    <option value="5">ADMINIST. Y DOCENTES</option>
                                    <option value="7">COORPORATIVO</option-->       
                           </select>
                           </div>
                           <div class="group-material" id="coorporativo" name="coorporativo">
                             <span>Descuento:</span>
                                <select id="descto" name="descto" class="material-control tooltips-general" data-toggle="tooltip" data-placement="top">
                                    <option value="" disabled="" selected="">Seleccione el tipo de DSCTO</option>
                                    <option value="1">10%</option>
                                    <option value="2">15%</option>
                                    <option value="3">20%</option>
                                    <option value="4">25%</option>
                                    <option value="5">Manual</option>
                                </select>  
                           </div>
                           <div class="group-material" id="precio" name="precio">
                           </div>
                           <div class="form-group">
                               <label>OBSERVACIÓN</label>
                               <textarea id="observacion" name="observacion" class="form-control input-lg" rows="5" style="text-transform:uppercase;" cols="40"></textarea>
                           </div>
                           <br>
                           <br>
                           <div class="title-flat-form title-flat-blue"><B>PAGO DE MATRICULA</B></div>
                           <div class="group-material">
                                <select id="tipopago" name="tipopago" class="form-control input-lg" title="Selccione el tipo de pago">
                                    <option value="" disabled="" selected="">Seleccione el tipo de Pago</option>
                                    <option value="1">RECIBO</option>
                                    <option value="2">OFICIO</option>
                                    <option value="3">RESOLUCIÓN</option>
                                    <option value="4">ORDEN DE SERVICIO</option>
                                    <option value="5">CCI-TRANSFERENCIA</option>
                                    <option value="6">CUENTA CORRIENTE CEUPS</option>
                                    <option value="7">CARTA DE COMPROMISO</option>
                                    <option value="8">RECIBO MULTIPLE</option>
                                    <option value="9">ORDEN DE COMPRA</option>
                                </select>
                            </div> 
                           <div class="input-group">
                                <span class="input-group-addon"><B>NUMERO DE PAGO:</B></span>
                                <input type="text" id="numeropago" name="numeropago" maxlength="15" minlength="10" class="form-control input-lg" disabled="" title="Numero de Pago">
                                <span class="input-group-addon"><B>FECHA DE PAGO:</B></span>
                                <input type="date" class="form-control input-lg" name="fechapago" id="fechapago" placeholder="Introduce una fecha">
                           </div>
                           <br>
                           <div class="form-horizontal">
                               <label>MONTO</label>
                               <input type="text" id="montopago" name="montopago" value="" placeholder="0000.00" class="form-control input-lg" required="" title="Monto a Pagar">
                            </div>
                           <div class="group-material" id="comparamonto" name="comparamonto">
                           </div>
                           <br>
                            <p class="text-center">
                                <button id="clear" name="clear" class="btn btn-info btn-lg" style="margin-right: 20px;"><i class="zmdi zmdi-roller"></i> &nbsp;&nbsp; Limpiar</button>
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
                        <div class="title-flat-form title-flat-blue"><B>MANTENIMIENTO DE MATRICULADOS</B></div>
                <form autocomplete="off">
                    <div class="row">
                       <div class="col-sm-12 col-md-12 col-lg-12">
                           <div class="col-sm-offset-2 col-sm-8">
				<h3 class="text-center"> <small class="mensaje"></small></h3>
			</div>
			<div class="table-responsive col-xs-12 col-sm-12">		
				<table id="dt_matricula" name="dt_matricula" class="table table-bordered table-hover" cellspacing="0" width="100%">
					<thead>
						<tr>								
							<th>DNI</th>
                                                        <th>NOMBRE</th>
							<th>CURSO</th>
                                                        <th>EMAIL</th>
                                                        <th>OBSERVACIÓN</th>
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
                <div class="modal fade" id="modalAlumno" role="dialog">
                <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="btn btn-danger close" data-dismiss="modal">
                            <span aria-hidden="true">X</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <h3 class="modal-title" id="myModalLabel"><center><B>Datos Personales del Estudiante</B></center></h3>
                    </div>
                    <!-- Modal Body -->
                    <?php include './modals/modalMatriculaAlumno.php'; ?>
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <center>
                            <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal"><B>Cerrar</B></button>
                            <button type="button" class="btn btn-success btn-lg" id="ingresarAlumno" name="ingresarAlumno"><B>Registrar</B></button>
                        </center>
                    </div>
                </div>
            </div>
            </div>
        
            <div class="modal fade" id="modalModificarMatriculaAlumno" role="dialog">
            <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="btn btn-danger close" data-dismiss="modal">
                        <span aria-hidden="true">X</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h3 class="modal-title" id="myModalLabel"><center><B>DATOS DE LA MATRICULA</B></center></h3>
                </div>
                <!-- Modal Body -->
                <?php include './modals/modalMoficarMatriculaAlumno.php'; ?>
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <center>
                        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal"><B>Cerrar</B></button>
                        <button type="button" class="btn btn-success btn-lg" id="modificarMatricula" name="modificarMatricula"><B>Modificar</B></button>
                    </center>
                    </div>
                </div>
            </div>
        </div>
        
       <div class="modal fade" role="dialog" id="modalAyuda">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center all-tittles">ayuda del sistema</h4>
                </div>
                <div class="modal-body">
                    <?php
                            include './helps/help-matricula.php';
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="zmdi zmdi-thumb-up"></i> &nbsp; De acuerdo</button>
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
