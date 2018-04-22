<div class="modal-body">
    
    <!-- RECORDAR SIEMPRE QUITAR EL ROW Y EL DIV PARA MEJORAR EL ASPECTO-->
    
    <form id="" name="" autocomplete="off" enctype="multipart/form-data">
                    <input type="hidden" id="cursoidmodal" name="cursoidmodal">
                    <input type="hidden" id="preinsidmodal" name="preinsidmodal">
                    
                           <div class="input-group">
                                <span class="input-group-addon"><B>CURSO:</B></span>
                                <input type="text" id="cursopreinsmodal" name="cursopreinsmodal" autocomplete="off" class="form-control input-lg" placeholder="Busque el curso por su nombre" required="" maxlength="200" title="Nombre del curso">
                            </div>
                           <br>
                            <div class="group-material">
                                <span>CONDICIÓN</span>
                                <select id="modalcondicion" name="modalcondicion" class="form-control input-lg" title="Tipo de PreInscrito">
                                    <option value="" disabled="" selected="">Selecciona el tipo</option>
                                    <option value="1" >PUBLICO GENERAL</option>
                                    <option value="2">ALUMNOS CEUPS - EUPG UNFV</option>
                                    <option value="3">ALUMNOS PREGRADO</option>
                                    <option value="4">PERSONAL DOCENTE Y ADMIN.</option>
                                </select>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon"><B>ALUMNO:</B></span>
                                <input type="text" id="alumnopreinsmodal" name="alumnopreinsmodal" disabled="" class="form-control input-lg" required="" maxlength="200" title="Nombre del alumno">
                            </div>
                           <br>
                           <br>
                            <div class="input-group">
                                <!--span>FECHA DE CONTACTO</span-->
                                <input type="date" id="modalfechacont" name="modalfechacont" class="form-control input-lg" required="" title="Fecha de contacto">
                                <span class="input-group-addon">
                                    <B> ¿Se comunico Fuera de fecha?</B>
                                    <label class="radio-inline">
                                    <input name="fuera_de_fecha" id="fuera_de_fecha" value="1" required="" type="radio"> 
                                    <span style="color:green;">SI
                                    </span>
                                    </label>
                                    <label class="radio-inline">
                                        <input name="fuera_de_fecha" id="fuera_de_fecha" checked="" value="0" type="radio">
                                    <span style="color:red;"> NO </span>
                                    </label>
                                </span>
                            </div>
                           <br>
                           <br>
                            <div class="group-material">
                                <select id="modaldifucion" name="modaldifucion" class="form-control input-lg" title="Tipo de contacto">
                                    <option value="" disabled="" selected="">Selecciona el tipo de contacto</option>
                                    <option value="1">CORREO</option>
                                    <option value="2">FACEBOOK</option>
                                    <option value="3">WEB-UNFV</option>
                                    <option value="4">WEB-PRIVADA</option>
                                </select>
                            </div>
                           
                           <legend><center><h2>OBSERVACIONES</h2></center></legend>
                            <br>
                            <div class="form-horizontal">
                               <label>OBSERVACIÓN</label>
                               <textarea id="modalobservacion" name="modalobservacion" type="text" class="form-control" style="text-transform:uppercase;" rows="3" cols="40"></textarea>
                           </div>
                       
                </form>
    
</div>
