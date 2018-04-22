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

 $dni = $_GET['dni'];
 $nombreestudiante = $_GET['estudiante'];
 $nombrecurso = $_GET['nombrecurso'];
 $fechaini = $_GET['finicio'];
 $fechatermino = $_GET['ftermino'];
 $idmatricula = $_GET['idmatricula'];
 $deuda = $_GET['deuda'];
 
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
              <h1 class="all-tittles">S.I.A.G.A. <small>Registro de Pagos por Curso</small></h1>
            </div>
        </div>
        
            <div class="container-flat-form">
            <div class="title-flat-form title-flat-blue"><B>&nbsp;DATOS DEL ALUMNO&nbsp;</B></div>
                
            <div class="container-flat-form">
                <table  align="center" class="table table-bordered">
                    <input type="hidden" id="idmatricula" name="idmatricula" value="<?php echo $idmatricula; ?>">
                <tr>
                    <td class="tdatos"><B>DNI</B></td>
                <td class="dtabla"><?php echo $dni;?></td>
                </tr>
                <tr>
                    <td class="tdatos"><B>ALUMNO</B></td>
                <td class="dtabla"><?php echo $nombreestudiante; ?></td>
                </tr>
                <tr>
                    <td class="tdatos"><B>CURSO</B></td>
                <td class="dtabla"><?php echo $nombrecurso; ?></td>
                </tr>
                <tr>
                    <td class="tdatos"><B>FECHA DE INICIO</B></td>
                <td class="dtabla"><?php echo $fechaini; ?></td>
                </tr>
                <tr>
                    <td class="tdatos"><B>FECHA DE TERMINO</B></td>
                <td class="dtabla"><?php echo $fechatermino; ?></td>
                </tr>
                </table>
            </div>
        
            
            <div class="container-flat-form">
                <div class="title-flat-form title-flat-blue"><B>REGISTRO DE PAGO</B></div>
                <form id="formRegistroPago" name="formRegistroPago" autocomplete="off">
                   
                    <input type="hidden" name="deuda" id="deuda" value="<?php echo $deuda; ?>">
                    <input type="hidden" id="calculonuevadeuda" name="calculonuevadeuda">
                    
                    <div class="row">
                       <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                           <div class="form-horizontal">
                               <FONT COLOR="RED"><H2><?php echo 'DEUDA: '.$deuda.' Soles';?></H2></FONT>   
                           </div>
                           <br>
                           <div class="group-material">
                                <select id="tipopago" name="tipopago" class="form-control input-lg" title="Selccione el tipo de pago">
                                    <option value="" disabled="" selected="">Seleccione el tipo de Pago</option>
                                    <option value="1">RECIBO</option>
                                    <option value="2">OFICIO</option>
                                    <option value="3">RESOLUCIÓN</option>
                                    <option value="4">ORDEN DE SERVICIO</option>
                                    <option value="5">CCI-TRANSFERENCIA</option>
                                    <option value="6">CARTA DE COMPROMISO</option>
                                    <option value="7">RECIBO MULTIPLE</option>
                                    <option value="8">ORDEN DE COMPRA</option>
                                </select>
                            </div> 
                           <div class="input-group">
                                <span class="input-group-addon"><B>NUMERO DE PAGO:</B></span>
                                <input type="text" id="numeropago" name="numeropago" maxlength="10" minlength="10" class="form-control input-lg" disabled="" title="Numero de Pago">
                                <span class="input-group-addon"><B>FECHA DE PAGO:</B></span>
                                <input type="date" class="form-control input-lg" name="fechapago" id="fechapago" placeholder="Introduce una fecha">
                           </div>
                           <div id="verificarNumeroPago" name="verificarNumeroPago"></div>
                           <br>
                           <div class="form-horizontal">
                               <label>MONTO</label>
                               <input type="text" id="montopago" name="montopago" value="" placeholder="0000.00" class="form-control input-lg" required="" title="Monto a Pagar">
                            </div>
                           <div class="group-material" id="comparamonto" name="comparamonto">
                           </div>
                           <br>
                            <p class="text-center">
                                <!--button id="clear" name="clear" class="btn btn-info btn-lg" style="margin-right: 20px;"><i class="zmdi zmdi-roller"></i> &nbsp;&nbsp; Limpiar</button-->
                                <input type="button" value="LIMPIAR" class="btn btn-info btn-lg" style="margin-right: 20px;" onClick="this.form.reset()" />
                                <button id="registerPago" name="registerPago" class="btn btn-primary btn-lg"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Registrar</button>
                            </p> 
                       </div>
                    </div>
                </form>
            </div>
            
    </div>

        <?php
                 include './inc/footer.php';
        ?>
    </div>
</body>
</html>

