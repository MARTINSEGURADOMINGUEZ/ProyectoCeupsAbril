<?php
    session_start();
    if(isset($_SESSION['tipousu']))
    {}else{header('Location: index.php');}
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
    
    <script src="js/entidadesjquery/alumnojquery.js"></script>
              
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
              <h1 class="all-tittles">S.I.A.G.A. <small>Administración de Alumnos</small></h1>
            </div>
        </div>
        
        <ul class="nav nav-tabs nav-justified" role="tablist">
            <li role="presentation" class="active"><a href="#registro" aria-controls="security" role="tab" data-toggle="tab"><B>Nuevo Alumno</B></a></li>
            <li role="presentation"><a href="#mantenimiento" aria-controls="others" role="tab" data-toggle="tab"><B>Mantenimiento de Alumno</B></a></li>
        </ul>
        
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="registro">
            <div class="container-fluid">
                <div class="container-flat-form">
                    <div class="title-flat-form title-flat-blue"><B>FICHA REGISTRO DE ALUMNOS</B></div>
                <form id="registroalumno" name="registroalumno" autocomplete="off">
                    <div class="row">
                       <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                           <legend><h2><B>Datos Personales del Alumno</B></h2></legend>
                           <br><br>
                            <div class="group-material">
                                <input type="text" id="dni" name="dni" class="material-control tooltips-general" placeholder="Escribe aquí el DNI del alumno" required="" maxlength="8" data-toggle="tooltip" data-placement="top" title="DNI del estudiante">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>DNI</label>
                                <div id="busquedadni" name="busquedadni">
                                </div>
                            </div>
                           <div class="group-material">
                                <input type="text" id="apellido" name="apellido" class="material-control tooltips-general" placeholder="Escribe aquí los apellidos del alumno" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Apellidos del estudiante">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>APELLIDOS</label>
                            </div>
                            <div class="group-material">
                                <input type="text" id="nombre" name="nombre" class="material-control tooltips-general" placeholder="Escribe aquí los nombres del alumno" required="true" maxlength="50" data-toggle="tooltip" data-placement="top" title="Nombres del estudiante">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>NOMBRES</label>
                            </div>
                           <div class="group-material">
                               <input type="text" id="celular" name="celular" class="material-control tooltips-general" placeholder="Celular" pattern="[0-9]{9,9}" required="" maxlength="9" data-toggle="tooltip" data-placement="top" title="Solamente 9 números">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>CELULAR</label>
                            </div>
                           <div class="group-material">
                               <input type="text" id="telefono" name="telefono" class="material-control tooltips-general" placeholder="Teléfono"  required="" minlength="1"  data-toggle="tooltip" data-placement="top" title="Solamente 7 números">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>TELEFONO FIJO</label>
                            </div>
                           <div class="group-material">
                               <input type="text" id="domicilio" name="domicilio" class="material-control tooltips-general" placeholder="Ingrese Domicilio" rows="5" required=""  maxlength="99" data-toggle="tooltip" data-placement="top" title="Dirección Personal">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>DOMICILIO</label>
                            </div>
                            <div class="group-material">
                                <span>DISTRITO</span>
                                <select id="distrito" name="distrito" class="material-control tooltips-general" data-toggle="tooltip" data-placement="top" title="Elige la sección a la que pertenece el alumno">
                                    <option value="" disabled="" selected="">Selecciona un distrito</option>
                                    <option value="LIMA" >LIMA</option>
                                    <option value="ANCON">ANCON</option>
                                    <option value="ATE">ATE</option>
                                    <option value="BARRANCO">BARRANCO</option>
                                    <option value="BRENA">BRENA</option>
                                    <option value="CALLAO">CALLAO</option>
                                    <option value="BELLAVISTA">BELLAVISTA</option>
                                    <option value="LA PUNTA">LA PUNTA</option>
                                    <option value="LA PERLA">LA PERLA</option>
                                    <option value="CARMEN DE LA LEGUA" >CARMEN DE LA LEGUA</option>
                                    <option value="VENTANILLA">VENTANILLA</option>
                                    <option value="MI PERU">MI PERU</option>
                                    <option value="CARABAYLLO">CARABAYLLO</option>
                                    <option value="CERCADO DE LIMA" >CERCADO DE LIMA</option>
                                    <option value="CHACLACAYO">CHACLACAYO</option>
                                    <option value="CHORILLOS">CHORILLOS</option>
                                    <option value="CIENEGUILLA">CIENEGUILLA</option>
                                    <option value="COMAS" >COMAS</option>
                                    <option value="EL AGUSTINO" >EL AGUSTINO</option>
                                    <option value="HUACHO" >HUACHO</option>
                                    <option value="INDEPENDENCIA" >INDEPENDENCIA</option>
                                    <option value="JESUS MARIA" >JESUS MARIA</option>
                                    <option value="LA MOLINA" >LA MOLINA</option>
                                    <option value="LA VICTORIA" >LA VICTORIA</option>
                                    <option value="LINCE" >LINCE</option>
                                    <option value="LOS OLIVOS" >LOS OLIVOS</option>
                                    <option value="LURIGANCHO-CHOSICA" >LURIGANCHO-CHOSICA</option>
                                    <option value="LURIN" >LURIN</option>
                                    <option value="MAGDALENA DEL MAR" >MAGDALENA DEL MAR</option>
                                    <option value="PUEBLO LIBRE" >PUEBLO LIBRE</option>
                                    <option value="MIRAFLORES" >MIRAFLORES</option>
                                    <option value="PACHACAMAC" >PACHACAMAC</option>
                                    <option value="PUCUSANA" >PUCUSANA</option>
                                    <option value="PUENTE PIEDRA" >PUENTE PIEDRA</option>
                                    <option value="PUNTA HERMOSA" >PUNTA HERMOSA</option>
                                    <option value="PUNTA NEGRA" >PUNTA NEGRA</option>
                                    <option value="RIMAC" >RIMAC</option>
                                    <option value="SAN BARTOLO" >SAN BARTOLO</option>
                                    <option value="SAN BORJA" >SAN BORJA</option>
                                    <option value="SAN ISIDRO" >SAN ISIDRO</option>
                                    <option value="SAN JUAN DE LURIGANCHO" >SAN JUAN DE LURIGANCHO</option>
                                    <option value="SAN JUAN DE MIRAFLORES" >SAN JUAN DE MIRAFLORES</option>
                                    <option value="SAN LUIS" >SAN LUIS</option>
                                    <option value="SAN MARTIN DE PORRES" >SAN MARTIN DE PORRES</option>
                                    <option value="SAN MIGUEL" >SAN MIGUEL</option>
                                    <option value="SANTA ANITA" >SANTA ANITA</option>
                                    <option value="SANTA MARIA DEL MAR" >SANTA MARIA DEL MAR</option>
                                    <option value="SANTA ROSA" >SANTA ROSA</option>
                                    <option value="SANTIAGO DE SURCO" >SANTIAGO DE SURCO</option>
                                    <option value="SURQUILLO" >	SURQUILLO</option>
                                    <option value="VILLA EL SALVADOR" >VILLA EL SALVADOR</option>
                                    <option value="VILLA MARIA DEL TRIUNFO" >VILLA MARIA DEL TRIUNFO	</option>
                                </select>
                            </div>
                           <div class="group-material">
                                <input type="email" id="emailperso" name="emailperso" class="material-control tooltips-general" placeholder="E-mail Personal"  maxlength="50" data-toggle="tooltip" data-placement="top" title="Escriba el Email del Alumno">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Email Personal</label>
                            </div>
                           
                           <div class="group-material">
                                <input type="email" id="emailinsti" name="emailinsti" class="material-control tooltips-general" placeholder="E-mail Laboral"  maxlength="50" data-toggle="tooltip" data-placement="top" title="Escriba el Email Institucional">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Email Laboral</label>
                            </div>
                           <legend><h2>Datos Laborales del Alumno</h2></legend>
                            <br><br>
                            <div class="group-material">
                                <input id="empresa" name="empresa" type="text" class="material-control tooltips-general" placeholder="Ingrese el Nombre de la Empresa" required=""  data-toggle="tooltip" data-placement="top" title="Nombre de la empresa">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>EMPRESA Y/O INSTITUCIÓN</label>
                            </div>
                            <div class="group-material">
                                <input id="cargo" name="cargo" type="text" class="material-control tooltips-general" placeholder="Ingrese el Cargo Laboral" required="" data-toggle="tooltip" data-placement="top" title="Nombre del puesto laboral">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>CARGO Y/O AREÁ</label>
                            </div>
                            <div class="group-material">
                                <input id="telefonoempresa" name="telefonoempresa" type="text" class="material-control tooltips-general" placeholder="Teléfono" required=""  data-toggle="tooltip" data-placement="top" title="Solamente 7 números">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>TELEFONO</label>
                            </div>
                            <div class="group-material">
                                <input id="direccionempresa" name="direccionempresa" type="text" class="material-control tooltips-general" placeholder="Ingrese Dirección Laboral" rows="5" required="" maxlength="99" data-toggle="tooltip" data-placement="top" title="Dirección Laboral">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>DIRECCIÓN</label>
                            </div>
                            <div class="group-material">
                                <span>DISTRITO</span>
                                <select id="distritoempresa" name="distritoempresa" class="material-control tooltips-general" data-toggle="tooltip" data-placement="top" title="Seleccione el distrito de la empresa">
                                    <option value="" disabled="">Selecciona un distrito</option>
                                    <option value="LIMA" selected="" >LIMA</option>
                                    <option value="ANCON">ANCON</option>
                                    <option value="ATE">ATE</option>
                                    <option value="BARRANCO">BARRANCO</option>
                                    <option value="BRENA">BRENA</option>
                                    <option value="CALLAO">CALLAO</option>
                                    <option value="BELLAVISTA">BELLAVISTA</option>
                                    <option value="LA PUNTA">LA PUNTA</option>
                                    <option value="LA PERLA">LA PERLA</option>
                                    <option value="CARMEN DE LA LEGUA" >CARMEN DE LA LEGUA</option>
                                    <option value="VENTANILLA">VENTANILLA</option>
                                    <option value="MI PERU">MI PERU</option>
                                    <option value="CARABAYLLO">CARABAYLLO</option>
                                    <option value="CERCADO DE LIMA">CERCADO DE LIMA</option>
                                    <option value="CHACLACAYO">CHACLACAYO</option>
                                    <option value="CHORILLOS">CHORILLOS</option>
                                    <option value="CIENEGUILLA">CIENEGUILLA</option>
                                    <option value="COMAS" >COMAS</option>
                                    <option value="EL AGUSTINO" >EL AGUSTINO</option>
                                    <option value="HUACHO" >HUACHO</option>
                                    <option value="INDEPENDENCIA" >INDEPENDENCIA</option>
                                    <option value="JESUS MARIA" >JESUS MARIA</option>
                                    <option value="LA MOLINA" >LA MOLINA</option>
                                    <option value="LA VICTORIA" >LA VICTORIA</option>
                                    <option value="LINCE" >LINCE</option>
                                    <option value="LOS OLIVOS" >LOS OLIVOS</option>
                                    <option value="LURIGANCHO-CHOSICA" >LURIGANCHO-CHOSICA</option>
                                    <option value="LURIN" >LURIN</option>
                                    <option value="MAGDALENA DEL MAR" >MAGDALENA DEL MAR</option>
                                    <option value="PUEBLO LIBRE" >PUEBLO LIBRE</option>
                                    <option value="MIRAFLORES" >MIRAFLORES</option>
                                    <option value="PACHACAMAC" >PACHACAMAC</option>
                                    <option value="PUCUSANA" >PUCUSANA</option>
                                    <option value="PUENTE PIEDRA" >PUENTE PIEDRA</option>
                                    <option value="PUNTA HERMOSA" >PUNTA HERMOSA</option>
                                    <option value="PUNTA NEGRA" >PUNTA NEGRA</option>
                                    <option value="RIMAC" >RIMAC</option>
                                    <option value="SAN BARTOLO" >SAN BARTOLO</option>
                                    <option value="SAN BORJA" >SAN BORJA</option>
                                    <option value="SAN ISIDRO" >SAN ISIDRO</option>
                                    <option value="SAN JUAN DE LURIGANCHO" >SAN JUAN DE LURIGANCHO</option>
                                    <option value="SAN JUAN DE MIRAFLORES" >SAN JUAN DE MIRAFLORES</option>
                                    <option value="SAN LUIS" >SAN LUIS</option>
                                    <option value="SAN MARTIN DE PORRES" >SAN MARTIN DE PORRES</option>
                                    <option value="SAN MIGUEL" >SAN MIGUEL</option>
                                    <option value="SANTA ANITA" >SANTA ANITA</option>
                                    <option value="SANTA MARIA DEL MAR" >SANTA MARIA DEL MAR</option>
                                    <option value="SANTA ROSA" >SANTA ROSA</option>
                                    <option value="SANTIAGO DE SURCO" >SANTIAGO DE SURCO</option>
                                    <option value="SURQUILLO" >	SURQUILLO</option>
                                    <option value="VILLA EL SALVADOR" >VILLA EL SALVADOR</option>
                                    <option value="VILLA MARIA DEL TRIUNFO" >VILLA MARIA DEL TRIUNFO	</option>
                                </select>
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
            
            <div role="tabpanel" class="tab-pane fade" id="mantenimiento">
                <div class="container">
                <div class="container-flat-form">
                    <div class="title-flat-form title-flat-blue"><B>MANTENIMIENTO DE ALUMNOS</B></div>
                <form autocomplete="off">
                    <div class="row">
                       <div class="col-sm-12 col-md-12 col-lg-12">
                           <div class="col-sm-offset-2 col-sm-8">
				<h3 class="text-center"> <small class="mensaje"></small></h3>
			</div>
			<div class="table-responsive col-xs-12 col-sm-12">		
				<table id="dt_alumno" name="dt_alumno" class="table table-bordered table-hover" cellspacing="0" width="100%">
					<thead>
						<tr>								
							<th>DNI</th>
                                                        <th>NOMBRES</th>
							<th>EMAIL</th>
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
            <?php include './modals/modalModificarAlumno.php'; ?>
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
        <div class="modal fade" id="modalAlumnoEliminar" role="dialog">
        <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="btn btn-danger close" data-dismiss="modal">
                    <span aria-hidden="true">X</span>
                    <span class="sr-only">Close</span>
                </button>
                <h3 class="modal-title" id="myModalLabel"><center><B>DAR DE BAJA AL ALUMNO</B></center></h3>
            </div>
            <!-- Modal Body -->
            <?php include './modals/modalEliminarAlumno.php'; ?>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <center>
                    <button type="button" class="btn btn-info btn-lg" data-dismiss="modal"><B>Cerrar</B></button>
                    <button type="button" class="btn btn-danger btn-lg" id="eliminarAlumno" name="eliminarAlumno"><B>Eliminar</B></button>
                </center>
            </div>
        </div>
    </div>
    </div>
        <?php
                 include './inc/footer.php';
        ?>
    <div class="modal fade" role="dialog" id="modalAyuda">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center all-tittles">ayuda del sistema</h4>
                </div>
                <div class="modal-body">
                    <?php
                            include './helps/help-estudiante.php';
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="zmdi zmdi-thumb-up"></i> &nbsp; De acuerdo</button>
                </div>
            </div>
          </div>
        </div>
    </div>
</body>
</html>