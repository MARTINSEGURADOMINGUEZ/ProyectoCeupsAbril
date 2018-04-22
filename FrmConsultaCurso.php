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
    <title>Consultar Curso</title>
    <style>
    table {
        border-collapse: collapse;
	font-family:Arial, Helvetica, sans-serif;
	font-size:18px;
    }

    </style>
    <link rel="stylesheet" type="text/css" href="css/css_print2.css" media="print">
    
    <?php 
        
        $LinksRoute="./";
        include './inc/links.php';
        
    ?>
    
    <script src="js/entidadesjquery/consultacurso.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.js"></script>
    <!--script src="https://code.jquery.com/jquery-1.12.4.js"></script-->
    <!--script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script-->
    <script src="js/printThis.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
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
              <h1 class="all-tittles">S.I.A.G.A. <small>Control Economico del Curso</small></h1>
            </div>
        </div>
        
        <ul class="nav nav-tabs nav-justified" role="tablist">
            <li role="presentation" id="nuevo" name="nuevo" class="active"><a href="#nuevo" aria-controls="security" role="tab" data-toggle="tab"><B>Nueva Busqueda Curso</B></a></li>
        </ul>
        
        <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade in active" id="nuevo">
        
            <div class="container-fluid">
                <div id="cuadro1" name="cuadro1" class="container-flat-form">
                <div class="title-flat-form title-flat-blue"><B>BUSQUEDA DE CURSO</B></div>
                <form autocomplete="off">
                    <input type="hidden" id="nombrecurso" name="nombrecurso">
                    <input type="hidden" id="idcurso" name="idcurso">
                    <div class="row">
                       <div class="col-xs-12">
                           
                            <div class="group-material">
                                <!--input type="text" id="cursopreins" name="cursopreins" autocomplete="off" class="form-control input-lg" placeholder="Busque el curso por su nombre" required="" maxlength="200" title="Nombre del curso"-->
                                <div class="input-group">
                                <span class="input-group-addon"><B>CURSO:</B></span>
                                <input type="text" id="busquedacurso" name="busquedacurso" autocomplete="off" class="form-control input-lg" placeholder="Busque el nombre del curso" required="" maxlength="200" title="Nombre del curso">
                                <span class="input-group-btn">
                                    <button class="btn btn-success btn-lg" type="button" id="consultarCurso" name="consultarCurso"><B>Buscar Curso por Periodo</B></button>
                                </span>
                                </div>
                                <select class="form-control input-lg" id="periodo" name="periodo" >
                                        <?php for($i=2014;$i<=date('Y');$i++){ ?>
                                    <option value="<?php echo $i;?>" <?php if($i==date('Y')){ echo " selected= '' ";} ?> > <?php echo $i;?></option>
                                        <?php }?>
                                </select>
                            </div>
                            
                       </div>
                    </div>
                </form>
            </div>
            
            <div id="cuadro2" name="cuadro2" class="container-flat-form">
                <div class="title-flat-form title-flat-blue" id='nombre' name='nombre'></div>
                <form autocomplete="off">
                    <div class="row">
                       <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                        <p class="text-center">
                                
                        </p>
                        <div class="row">
                        <table id='imprimir' width='750' align='center' class='tabla'><tbody>
                       <tr><td colspan="9" align="center" ><button id="reportepago" name="reportepago" class="btn btn-success btn-lg"><i class="zmdi zmdi-floppy"></i>&nbsp;&nbsp;<B>Generar Reporte Final de Pagos</b></button><br><br></td></tr>
                       </tbody></table>   
                       </div>
                       </div>
                    </div>
                </form>
                <form autocomplete="off">
                    
                
                        <table id="dt_pagos" name="dt_pagos" class="table table-bordered table-hover" cellspacing="0" width="100%">
                        </table>
                
                    
                    <div class="row">
                     <table id='imprimir' width='750' align='center' class='tabla'><tbody>
                    <tr><td colspan="9" align="center" ><br><button id="" name="" class="btn btn-success btn-lg"><i class="zmdi zmdi-floppy"></i>&nbsp;&nbsp;<B>Generar Reporte de Recaudación Actual</b></button><br><br></td></tr>
                    </tbody></table>   
                    </div>
                </form>
        </div>
        </div>
    <?php
                 include './inc/footer.php';
        ?>
    </div>
        </div>
    </div>
</body>
</html>