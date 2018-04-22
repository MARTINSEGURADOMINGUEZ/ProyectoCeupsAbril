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
    <title>Cursos</title>

    <?php 
        
        $LinksRoute="./";
        include './inc/links.php';
        
    ?>
    
    <script src="js/entidadesjquery/asistenciajquery.js"></script>
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
              <h1 class="all-tittles">S.I.A.G.A. <small>Administración del curso</small></h1>
            </div>
        </div>
        
        <ul class="nav nav-tabs nav-justified" role="tablist">
            <li role="presentation" class="active"><a href="#asistencia" aria-controls="security" role="tab" data-toggle="tab"><B>Asistencia</B></a></li>
            <li role="presentation"><a href="#control" aria-controls="others" role="tab" data-toggle="tab"><B>Control del Curso</B></a></li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="asistencia">
        <div class="container-fluid">
            <div id="cuadro1" name="cuadro1" class="container-flat-form">
                <div class="title-flat-form title-flat-blue"><B>REGISTRO DE ASISTENCIAS || <?php echo date("d/m/Y"); ?></B></div>
                <form autocomplete="off">
                    <input type="hidden" name="idcurso" id="idcurso">
                    <div class="row">
                       <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                           
                            <div class="group-material">
                                <input type="text" id="curso" name="curso" autocomplete="off" class="material-control tooltips-general" placeholder="Ingrese el Nombre del nuevo curso" required="" maxlength="200" data-toggle="tooltip" data-placement="top" title="Nombre del curso">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>CURSO</label>
                            </div>
                           <div class="group-material">
                                <span>Sesion:</span>
                                <select id="sesion" name="sesion" class="material-control tooltips-general" data-toggle="tooltip" data-placement="top" title="Selccione el tipo de curso">
                                    <option value="" disabled="">Seleccione la sesion</option>
                                    <option value="INSTRUCTIVO" selected="">INSTRUCTIVO</option>
                                    <option value="SESION N°1" > SESION N°1</option>
                                    <option value="SESION N°2" >SESION N°2</option>
                                    <option value="SESION N°3" >SESION N°3</option>
                                    <option value="SESION N°4" >SESION N°4</option>
                                    <option value="SESION N°5" >SESION N°5</option>
                                    <option value="SESION N°6" >SESION N°6</option>
                                    <option value="SESION N°7" >SESION N°7</option>
                                    <option value="SESION N°8" >SESION N°8</option>
                                    <option value="SESION N°9" >SESION N°9</option>
                                    <option value="SESION N°10" >SESION N°10</option>
                                    <option value="SESION N°11" >SESION N°11</option>
                                    <option value="SESION N°12" >SESION N°12</option>
                                    <option value="SESION N°13" >SESION N°13</option>
                                    <option value="SESION N°14" >SESION N°14</option>
                                    <option value="SESION N°15" >SESION N°15</option>
                                    <option value="SESION N°16" >SESION N°16</option>
                                    <option value="SESION N°17" >SESION N°17</option>
                                    <option value="SESION N°18" >SESION N°18</option>
                                    <option value="SESION N°19" >SESION N°19</option>
                                    <option value="SESION N°20" >SESION N°20</option>
                                    <option value="SESION N°21" >SESION N°21</option>
                                </select>
                            </div>
                            <div class="group-material">
                                <input type="date" class="material-control tooltips-general" name="fecha" id="fecha" placeholder="Introduce una fecha" required min="<?php $hoy=date("Y-m-d"); echo $hoy;?>">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Fecha: </label>
                            </div>
                     
                            <p class="text-center">
                                
                                <button id="listado" name="listado" class="btn btn-success btn-lg"><i class="zmdi zmdi-floppy"></i>&nbsp;&nbsp;<B>Generar Listado</b></button>
                            </p> 
                       </div>
                    </div>
                </form>
            </div>
            
        </div>
        </div>
            
            <div role="tabpanel" class="tab-pane fade" id="control">
                
                <div class="container-fluid">
                    
                    <div id="cuadro1" name="cuadro2" class="container-flat-form">
                        <div class="title-flat-form title-flat-blue"><B>FICHA DE CONTROL DEL CURSO</B></div>
                    
                  <form autocomplete="off">
                   <input type="hidden" name="idcursocontrol" id="idcursocontrol">
                    <div class="row">
                       <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                           
                           <div class="group-material">
                                <input type="text" id="cursocontrol" name="cursocontrol" autocomplete="off" class="material-control tooltips-general" placeholder="Ingrese el Nombre del curso" required="" maxlength="200" data-toggle="tooltip" data-placement="top" title="Nombre del curso a buscar">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>CURSO</label>
                            </div>
                           <p class="text-center">
                               <button id="listacontrol" name="listacontrol" class="btn btn-success btn-lg"><i class="zmdi zmdi-floppy"></i>&nbsp;&nbsp;<B>Generar Listado de Control</B></button>
                            </p> 
                           
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
