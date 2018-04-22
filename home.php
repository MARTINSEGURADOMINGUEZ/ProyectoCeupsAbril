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
    $admin = $_SESSION['cantadmin'];
    $personal = $_SESSION['cantpersonal'];
    //$cantalumno = $_SESSION['cantalumnos'];
    //$cantdocente = $_SESSION['cantdocentes'];
        
?>        
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Inicio</title>
    
    <!--    ESTA LINEA ES PARA  REUTILIZAR LAS INCLUSIONES DE ARCHIVOS EXTERNOS , CSS , JS y demas.-->
    
    <?php 
        
        $LinksRoute="./";
        include './inc/links.php';
        
    ?>
    <script src="js/entidadesjquery/reportejquery.js"></script>
    <script src="js/entidadesjquery/homejquery.js"></script>
    <!--///////////////////////////////////////////////////////////////////////////////////////////////////-->
    
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
              <h1 class="all-tittles">S.I.A.G.A. <small>Inicio</small></h1>
            </div>
        </div>
        <?php if($_SESSION['tipousu'] === 1){ ?>
        <section class="full-reset text-center" style="padding: 40px 0;">
            <article class="tile">
                <div class="tile-icon full-reset"><i class="zmdi zmdi-face"></i></div>
                <div class="tile-name all-tittles" style="width: 90%;">administradores</div>
                <div class="tile-num full-reset" id="admin" name="admin" data-toggle="modal" data-target="#modalDetalleAdmin"></div>
            </article>
            <article class="tile">
                <div class="tile-icon full-reset"><i class="zmdi zmdi-male-female"></i></div>
                <div class="tile-name all-tittles" style="width: 90%;">personal administrativo</div>
                <div class="tile-num full-reset" id="personal" name="personal" data-toggle="modal" data-target="#modalDetallePersonal"></div>
            </article>
            <article class="tile" class="tooltips-general btn-ayuda" data-placement="bottom">
                <div class="tile-icon full-reset"><i class="zmdi zmdi-accounts"></i></div>
                <div class="tile-name all-tittles" style="width: 90%;">estudiantes</div>
                <div class="tile-num full-reset" id="estudiantes" name="estudiantes" data-toggle="modal" data-target="#modalDetalleCurso"></div>
            </article>
            <article class="tile">
                <div class="tile-icon full-reset"><i class="zmdi zmdi-male-alt"></i></div>
                <div class="tile-name all-tittles" style="width: 90%;">docentes</div>
                <div class="tile-num full-reset" id="docentes" name="docentes"></div>
            </article>
            
            <article class="tile">
                <div class="tile-icon full-reset"><i class="zmdi zmdi-trending-up"></i></div>
                <div class="tile-name all-tittles" style="width: 90%;"><a id="reporte" name="reporte">reportes y estadísticas</a></div>
                <div class="tile-num full-reset">&nbsp;</div>
            </article>
        </section>
        <?php } else { ?>
            
        <section class="full-reset text-center" style="padding: 40px 0;">
                <!--div id="galeria"-->
                <!--          	<div id="slider" class="nivoSlider">-->
				<?php
					$directory="imagenes";
 						$dirint = dir($directory);
							while (($archivo = $dirint->read()) !== false)
							{
								if (eregi("gif", $archivo) || eregi("jpg", $archivo) || eregi("png", $archivo)){
									echo '<img src="'.$directory."/".$archivo.'" width="800" height="450">'."\n";
								}
							}
							$dirint->close();
				?>
                <!--			</div>
		</div>-->
        </section>  
           
       <?php } ?>
        <div class="modal fade" role="dialog" id="modalAyuda">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center all-tittles">ayuda del sistema</h4>
                </div>
                <div class="modal-body">
                    <?php
                            include './helps/help-home.php';
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="zmdi zmdi-thumb-up"></i> &nbsp; De acuerdo</button>
                </div>
            </div>
          </div>
        </div>
        
        <div class="modal fade" id="modalDetalleCurso" role="dialog">
                <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="btn btn-danger close" data-dismiss="modal">
                            <span aria-hidden="true">X</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <h3 class="modal-title" id="myModalLabel"><center><B>Cantidad Alumnos Matriculados por Curso</B></center></h3>
                    </div>
                    <!-- Modal Body -->
                    <?php include './modals/modalCantidadAlumnos.php'; ?>
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <center>
                            <button type="button" class="btn btn-info btn-lg" data-dismiss="modal"><B>Deacuerdo</B></button>
                        </center>
                    </div>
                </div>
                </div>
            </div>
        
        <div class="modal fade" id="modalDetalleAdmin" role="dialog">
                <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="btn btn-danger close" data-dismiss="modal">
                            <span aria-hidden="true">X</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <h3 class="modal-title" id="myModalLabel"><center><B>CANTIDAD DE USUARIO ADMINISTRADORES</B></center></h3>
                    </div>
                    <!-- Modal Body -->
                    <?php include './modals/modalCantidadAdmin.php'; ?>
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <center>
                            <button type="button" class="btn btn-info btn-lg" data-dismiss="modal"><B>Deacuerdo</B></button>
                        </center>
                    </div>
                </div>
                </div>
            </div>
        
        <div class="modal fade" id="modalDetallePersonal" role="dialog">
                <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="btn btn-danger close" data-dismiss="modal">
                            <span aria-hidden="true">X</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <h3 class="modal-title" id="myModalLabel"><center><B>Cantidad Alumnos Matriculados por Curso</B></center></h3>
                    </div>
                    <!-- Modal Body -->
                    <?php include './modals/modalCantidadPersonal.php'; ?>
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <center>
                            <button type="button" class="btn btn-info btn-lg" data-dismiss="modal"><B>Deacuerdo</B></button>
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