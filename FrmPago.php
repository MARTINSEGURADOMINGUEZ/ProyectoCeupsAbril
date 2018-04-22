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
    <title>Pagos</title>
    <?php 
        
        $LinksRoute="./";
        include './inc/links.php';
        
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.js"></script>
    <script src="js/entidadesjquery/pagojquery.js"></script>
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
              <h1 class="all-tittles">S.I.A.G.A. <small>Administración de Pagos</small></h1>
            </div>
        </div>
        
        <ul class="nav nav-tabs nav-justified" role="tablist">
            <li role="presentation" class="active"><a href="#busqueda" aria-controls="security" role="tab" data-toggle="tab"><B>REGISTRO DE PAGOS</B></a></li>
            <li role="presentation"><a href="#mantenimiento" aria-controls="others" role="tab" data-toggle="tab"><B>MANTENIMIENTO DE PAGOS</B></a></li>
        </ul>
        
        <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade in active" id="busqueda">
            <div class="container-flat-form">
            <div class="title-flat-form title-flat-blue"><B>&nbsp;REGISTRO DE PAGOS&nbsp;</B></div>
            <div>
            <form>
                    <div class="input-group" style="width:100%">
                    <input type="hidden" id="idalumno" name="idalumno">
                    <span class="input-group-addon"><B>ALUMNO:</B>
                    </span>
                    <input type="text" id="buscarAlumno" name="buscarAlumno" autocomplete="off" class="form-control input-lg" placeholder="Buscar Alumno por Apellido o DNI" required="" maxlength="200" title="Nombre del curso">
                    <span class="input-group-btn">
                        <button class="btn btn-success btn-lg" type="button" id="buscarDeudasAlumno" name="buscarDeudasAlumno"><B>&nbsp; BUSCAR ALUMNO &nbsp;</B></button>
                    </span>
                    </div>
                    
                    <br>
               
                <table id="dt_cursopago" name="dt_cursopago" class="table table-condensed table-bordered" align="center">
                    <div id="mensaje" name="mensaje"></div>
                </table>
                    
            </form>  
            </div>                        
            
            </div>
                
            </div>
            
        <div role="tabpanel" class="tab-pane fade" id="mantenimiento">
            
            <div class="container-flat-form">
                <div class="title-flat-form title-flat-blue"><B>&nbsp;MANTENIMIENTO DE PAGOS&nbsp;</B></div>
                
                            <div class="group-material">
                                <div class="input-group">
                                <input type="hidden" name="idcurso" id="idcurso">
                                <span class="input-group-addon"><B>CURSO:</B></span>
                                <input type="text" id="busquedacurso" name="busquedacurso" autocomplete="off" class="form-control input-lg" placeholder="Busque el Nombre del Curso" required="" maxlength="200" title="Nombre del curso">
                                <span class="input-group-btn">
                                    <button class="btn btn-success btn-lg" type="button" id="buscarPagosCursoPeriodo" name="buscarPagosCursoPeriodo"><B>BUSCAR PAGOS POR CURSO</B></button>
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
                                    <table id="dt_listapagos" name="dt_listapagos" class="table table-bordered table-hover" cellspacing="0" width="100%">
					<thead>
						<tr>
                                                        <th>DNI</th>
							<th>NOMBRE</th>
                                                        <th>FECHA PAGO</th>
                                                        <th>NUMERO DE DOCUMENTO</th>
							<th>MONTO</th>
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
        
        <div class="modal fade" id="modalPagos" role="dialog">
        <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="btn btn-danger close" data-dismiss="modal">
                    <span aria-hidden="true">X</span>
                    <span class="sr-only">Close</span>
                </button>
                <h3 class="modal-title" id="myModalLabel"><center><B>EDITAR PAGO REALIZADO</B></center></h3>
            </div>
            <!-- Modal Body -->
            <?php include './modals/modalModificarPago.php';?>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <center>
                    <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal"><B>Cerrar</B></button>
                    <button type="button" class="btn btn-success btn-lg" id="modificarPago" name="modificarPago"><B>Modificar</B></button>
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
