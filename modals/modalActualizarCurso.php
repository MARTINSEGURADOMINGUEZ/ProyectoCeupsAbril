<div class="modal-body">
    
    <form id="formActualizarCurso" name="formRegistroCurso" autocomplete="off">
                        <input type="hidden" name="modalidcurso" id="modalidcurso">
                        <input type="hidden" name="modalperiodocurso" id="modalperiodocurso">
                            <div class="group-material">
                                <span><B>CURSO:</B></span>
                                <input type="text" disabled="" id="modalnombrecurso" name="modalnombrecurso" autocomplete="off" class="form-control input-lg" placeholder="Busque el curso por su nombre" required="" maxlength="200" title="Nombre del Curso">
                            </div>
                            <div class="group-material">
                                 <span><B>FECHA DE INICIO:</B></span>
                                <input type="date" id="modalfechini" name="modalfechini" data-format="dd/MM/yyyy" class="form-control input-lg" placeholder="Ingrese la fecha de inicio" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Fecha de Inicio">
                                <span><B>FECHA DE CIERRE:</B></span>
                                <input type="date" id="modalfechfin" name="modalfechfin" data-format="dd/MM/yyyy" class="form-control input-lg" placeholder="Ingrese la fecha de termino" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Fecha de Termino">
                            </div>
                            <div class="group-material">
                               <span><B>HORAS:</B></span>
                               <input type="text" id="modalhoras" name="modalhoras" class="form-control input-lg" placeholder="Horas Academicas"  required="" minlength="1"  data-toggle="tooltip" data-placement="top" title="Ingrese la cantidad de horas">
                            </div>
                           <div class="group-material">
                               <span><B>CREDITOS:</B></span>
                               <input type="text" id="modalcreditos" name="modalcreditos" class="form-control input-lg" placeholder="Creditos Academicos" rows="1" required=""  maxlength="99" data-toggle="tooltip" data-placement="top" title="Ingrese la cantidad de creditos">
                            </div>
                           <div class="group-material">
                               <span><B>NOTA MINIMA:</B></span>
                               <input type="text" id="modalnotamin" name="modalnotamin" class="form-control input-lg"  min="10" max="20" title="Ingrese la nota minima">
                            </div>
    </form>
    
</div>