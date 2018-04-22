<?php
    date_default_timezone_set('America/Lima');
    
    setlocale(LC_ALL,"es_PE");
    
    session_start();
    if(isset($_SESSION['tipousu']))
    {}else{
    header('Location: index.php');
    }
    $nombre = $_SESSION['usunombre'];
    $tipousu = $_SESSION['tipousu'];
    $nontipusu = $_SESSION['nomtipousu'];
  
    ?>

<html lang="es">
<head>
    <title>Reportes</title>

    <?php 
        
        $LinksRoute="./";
        include './inc/links.php';
        
    ?>
    
    <script src="js/entidadesjquery/asistenciajquery.js"></script>
    <!--script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.js"></script-->
    <!--script src="https://code.highcharts.com/highcharts.js"></script-->
    <!--script src="https://code.highcharts.com/highcharts-3d.js" ></script-->
    <!--script src="https://code.highcharts.com/modules/exporting.js" ></script!-->
    
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
              <h1 class="all-tittles">S.I.A.G.A. <small>Reportes y estadísticas</small></h1>
            </div>
        </div>
        <div class="container-fluid">
            <ul class="nav nav-tabs nav-justified" role="tablist">
                <li role="presentation" class="active"><a href="#statistics" aria-controls="statistics" role="tab" data-toggle="tab">Estadísticas</a></li>
                <li role="presentation"><a href="#grafics" aria-controls="grafics" role="tab" data-toggle="tab">Graficas Estadisticas</a></li>
                <li role="presentation"><a href="#reports" aria-controls="reports" role="tab" data-toggle="tab">Reportes PDF</a></li>
        </ul>
            
        </div>
        
        
    <?php
                 include './inc/footer.php';
        ?>
    
    </div>
</body>
</html>

