
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
    <title>Usuarios</title>
    
    <?php 
        
        $LinksRoute="./";
        include './inc/links.php';
        
    ?>
    <!--///////////////////////////////////////////////////////////////////////////////////////////////////-->
    <script src="js/entidadesjquery/usuariojquery.js" ></script>
    
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
              <h1 class="all-tittles">S.I.A.G.A. <small>Administración Usuarios</small></h1>
            </div>
        </div>
        
        <!--div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 lead">
                    <ol class="breadcrumb">
                      <li id="nuevo" name="nuevo" class="active">Nuevo Usuario</li>
                      <li><a id="lista" name="lista">Lista de Usuarios</a></li>
                    </ol>
                </div>
            </div>
        </-->
        
        <ul class="nav nav-tabs nav-justified" role="tablist">
            <li role="presentation" class="active"><a href="#registro" aria-controls="security" role="tab" data-toggle="tab"><B>Nuevo Usuario</B></a></li>
            <li role="presentation"><a href="#mantenimiento" aria-controls="others" role="tab" data-toggle="tab"><B>Mantenimiento de Usuario</B></a></li>
        </ul>
        
        <div class="tab-content">
            
        <div role="tabpanel" class="tab-pane fade in active" id="registro">
                <div class="container-fluid">
                <div class="container-flat-form">
                <div class="title-flat-form title-flat-blue"><B>FORMULARIO DE REGISTRO DE USUARIOS</B></div>
                <form id="formusuario" name="formusuario" autocomplete="off">
                    <input type="hidden" id="idusuario" name="idusuario" value="0">
                    <div class="row">
                       <div  class="col-xs-12 col-sm-8 col-sm-offset-2">
                            <div class="group-material">
                                <input type="text" id="nombre" name="nombre" class="material-control tooltips-general" placeholder="Nombre completo" required="" maxlength="70" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,70}" data-toggle="tooltip" data-placement="top" title="Escribe el nombre del administrador">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Nombre completo</label>
                            </div>
                            <div class="group-material">
                                <input type="text" id="apellido" name="apellido" class="material-control tooltips-general" placeholder="Apellido completo" required="" maxlength="70" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,70}" data-toggle="tooltip" data-placement="top" title="Escribe el Apellido del administrador">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Apellido completo</label>
                            </div>
                            <div class="group-material">
                                <input type="email" id="email" name="email" class="material-control tooltips-general" placeholder="E-mail"  maxlength="50" required="" data-toggle="tooltip" data-placement="top" title="Escribe el Email del administrador">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Email</label>
                            </div>
                           <div class="group-material">
                               <input type="text" id="username" name="username" class="material-control tooltips-general" placeholder="Nombre de usuario" required="" maxlength="20" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ]{1,20}" data-toggle="tooltip" data-placement="top" title="Escribe un nombre de usuario sin espacios, que servira para iniciar sesión">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Username</label>
                                <div id="comprobarusuario" name="comprobarusuario">
                                </div>
                           </div>
                           
                           <div class="group-material">
                                <input type="password" id="password" name="password" class="material-control tooltips-general" placeholder="Contraseña" required="" maxlength="200" data-toggle="tooltip" data-placement="top" title="Escribe una contraseña">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Contraseña</label>
                            </div>
                           <div class="group-material">
                               <input type="password" id="rptpassword" name="rptpassword" class="material-control tooltips-general" placeholder="Repite la contraseña" required="" maxlength="200" data-toggle="tooltip" data-placement="top" title="Repite la contraseña">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Repetir contraseña</label>
                           </div>
                           <div class="group-material">
                               <select class="material-control tooltips-general" id="nivel" name="nivel" data-toggle="tooltip" data-placement="top" title="Elija el nivel del usuario">
                                    <option value="" disabled="" selected="">Seleccione un nivel</option>
                                    <option value="1">Administrador</option>
                                    <option value="2">Personal Administrativo</option>
                                </select>
                            </div>
                            <p class="text-center">
                                <button type="reset" class="btn btn-info btn-lg" style="margin-right: 20px;"><i class="zmdi zmdi-roller"></i> &nbsp;&nbsp; Limpiar</button>
                                <button class="btn btn-primary btn-lg" id="register" name="register" >Registrar &nbsp; <i class="zmdi zmdi-floppy"></i></button>
                            </p> 
                       </div>
                        
                   </div>
                </form>
                </div>
                </div>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="mantenimiento">
           <div class="container-flat-form">
            <div class="title-flat-form title-flat-blue"><B>MANTENIMIENTO DE USUARIOS</B></div>
                <form autocomplete="off">
                    <div class="row">
                       <div  class="col-sm-12 col-md-12 col-lg-12">
                           <div class="col-sm-offset-2 col-sm-8">
				<h3 class="text-center"> <small class="mensaje"></small></h3>
			</div>
			<div class="table-responsive col-xs-12 col-sm-12">		
				<table id="dt_usuario" name="dt_usuario" class="table table-bordered table-hover" cellspacing="0" width="100%">
					<thead>
						<tr>								
							<th>Nombre</th>
                                                        <th>Email</th>
							<th>Usuario</th>
							<th>Nivel</th>
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
        
        <div class="modal fade" id="modalUsuario" role="dialog">
        <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="btn btn-danger close" data-dismiss="modal">
                    <span aria-hidden="true">X</span>
                    <span class="sr-only">Close</span>
                </button>
                <h3 class="modal-title" id="myModalLabel"><center><B>ACTUALIZAR USUARIO</B></center></h3>
            </div>
            <!-- Modal Body -->
            <?php include './modals/modalActualizarUsuario.php'; ?>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <center>
                    <button type="reset" class="btn btn-info btn-lg" data-dismiss="modal"><B>Cerrar</B></button>
                    <button type="button" class="btn btn-success btn-lg" id="actualizarUsuario" name="actualizarUsuario"><B>ACTUALIZAR</B></button>
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