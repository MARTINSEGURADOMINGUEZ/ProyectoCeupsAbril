<div class="navbar-lateral full-reset">
        <div class="visible-xs font-movile-menu mobile-menu-button"></div>
        <div class="full-reset container-menu-movile custom-scroll-containers">
            <div class="logo full-reset all-tittles">
                <i class="visible-xs zmdi zmdi-close pull-left mobile-menu-button" style="line-height: 55px; cursor: pointer; padding: 0 10px; margin-left: 7px;"></i> 
                S.I.A.G.A <?php echo date('Y-m-d'); ?>
            </div>
            <div class="full-reset" style="background-color:#ffffff; padding: 10px 0; color:#fff;">
                <figure>
                    <img src="assets/img/logo_CEUPS.png" class="img-responsive center-box" alt="Biblioteca"  style="width:80%;">
                </figure>
                <p class="text-center" style="padding-top: 15px;"><font color ="BLACK"><B><?php echo $nontipusu; ?></B></font></p>
            </div>
            <div class="full-reset nav-lateral-list-menu">
               
                <ul class="list-unstyled">
                    <li><a href="home.php"><i class="zmdi zmdi-home zmdi-hc-fw"></i>&nbsp;&nbsp;<B>INICIO</B></a></li>
                    
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-account-add zmdi-hc-fw"></i>&nbsp;&nbsp;<B>INSCRIPCIONES</B><i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">
                            <li><div class="dropdown-menu-button"><i class="zmdi zmdi-account-box-mail zmdi-hc-fw"></i>&nbsp;&nbsp;<B>ALUMNOS</B><i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                                <ul class="list-unstyled">
                                    <li><a href="FrmEstudiante.php"><i class="zmdi zmdi-balance zmdi-hc-fw"></i>&nbsp;&nbsp;<B>REGISTRO / MANTENIMIENTO</B></a></li>  
                                </ul>
                            </li>
                            <li><div class="dropdown-menu-button"><i class="zmdi zmdi-accounts-list-alt zmdi-hc-fw"></i>&nbsp;&nbsp;<B>PREINSCRITOS</B><i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                                <ul class="list-unstyled">
                                    <li><a href="FrmPreInscrito.php"><i class="zmdi zmdi-balance zmdi-hc-fw"></i>&nbsp;&nbsp;<B>REGISTRO / MANTENIMIENTO</B></a></li>
                                </ul>
                            </li>
                            <li><div class="dropdown-menu-button"><i class="zmdi zmdi-account-box-phone zmdi-hc-fw"></i>&nbsp;&nbsp;<B>PROFESORES</B><i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                                <ul class="list-unstyled">
                                    <li><a href="FrmProfesor.php"><i class="zmdi zmdi-balance zmdi-hc-fw"></i>&nbsp;&nbsp;<B>REGISTRO / MANTENIMIENTO</B></a></li>
                                </ul>
                            </li>
                        </ul>
                        
                    </li>
                    
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-case zmdi-hc-fw"></i>&nbsp;&nbsp;<B>MATRICULA</B><i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="FrmMatricula.php"><i class="zmdi zmdi-balance zmdi-hc-fw"></i>&nbsp;&nbsp;<B>REGISTRO / MANTENIMIENTO</B></a></li>
                        </ul>
                    </li>
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i>&nbsp;&nbsp;<B>CURSOS</B><i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="FrmCurso.php"><i class="zmdi zmdi-book zmdi-hc-fw"></i>&nbsp;&nbsp;<B>REGISTRO / MANTENIMIENTO</B></a></li>
                            <li><a href="#"><i class="zmdi zmdi-border-color zmdi-hc-fw"></i>&nbsp;&nbsp;<B>CALIFICACIONES / CERTIFICADOS</B></a></li>
                            <li><a href="FrmAsistencia.php"><i class="zmdi zmdi-calendar-check zmdi-hc-fw"></i>&nbsp;&nbsp;<B>ASISTENCIAS / CONTROL DEL CURSO</B></a></li>
                        </ul>
                    </li>
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-card zmdi-hc-fw"></i>&nbsp;&nbsp;<B>PAGOS</B><i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">
                            
                            <li>
                                <a href="FrmPago.php"><i class="zmdi zmdi-time-restore zmdi-hc-fw"></i>&nbsp;&nbsp;<B>REGISTRO / MANTENIMIENTO</B></a>
                            </li>
                            
                        </ul>
                    </li>
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-notifications-active zmdi-hc-fw"></i>&nbsp;&nbsp;<B>CONSULTAS</B><i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">
                            
                            <li>
                                <a href="FrmConsultaCurso.php"><i class="zmdi zmdi-time-restore zmdi-hc-fw"></i>&nbsp;&nbsp;<B>CONSULTAS POR CURSO</B><!--span class="label label-danger pull-right label-mhover">7</span--></a>
                            </li>
                            <li>
                                <a href="#"><i class="zmdi zmdi-timer zmdi-hc-fw"></i>&nbsp;&nbsp;<B>CONSULTAS POR ALUMNO</B><!--span class="label label-danger pull-right label-mhover">7</span--></a>
                            </li>
                            <li>
                                <a href="#"><i class="zmdi zmdi-timer zmdi-hc-fw"></i>&nbsp;&nbsp;<B>CONSULTAS PREINSCRITO</B><!--span class="label label-danger pull-right label-mhover">7</span--></a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="zmdi zmdi-trending-up zmdi-hc-fw"></i>&nbsp;&nbsp;<B>REPORTES Y ESTADISTICAS</B></a></li>
                    <li><a href="FrmOpcionesAvanzadas.php"><i class="zmdi zmdi-wrench zmdi-hc-fw"></i>&nbsp;&nbsp;<B>CONFIGURACIONES AVANZADAS</B></a></li>
                </ul>
            </div>
        </div>
    </div>