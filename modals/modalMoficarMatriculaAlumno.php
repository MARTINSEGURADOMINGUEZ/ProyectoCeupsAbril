<div class="modal-body">
                <form role="form">
                    <input type="hidden" name="idmatricula" id="idmatricula">
                    <table class="table" align="center">
                    <tbody>
                        <tr>
                            <td>
                            <label>*CURSO</label>
                            </td>
                            <td>
                                <input type="text" disabled="" class="form-control" id="CURSO" name="CURSO" minlength="8" maxlength="8" placeholder="Ingrese su dni"/>
                                <input type="date" disabled="" class="form-control" id="fechaini" name="fechaini" />
                                <input type="date" disabled="" class="form-control" id="fechafin" name="fechafin" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <label for="inputName">*ALUMNO</label>
                            </td>
                            <td>
                                <input type="text" disabled="" class="form-control" id="ALUMNO" name="ALUMNO"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <label for="inputName">CONDICIÓN</label>
                            </td>
                            <td>
                                <select id="condicion" name="condicion" class="form-control input-lg">
                                    <option value="" disabled="">Seleccione el tipo del Alumno</option>
                                    <option value="6" >PUBLICO GENERAL</option>
                                    <option value="8">ALUMNO CEUPS - EUPG UNFV</option>
                                    <option value="3" >ALUMNO UNIV. PREGRADO</option>
                                    <option value="5">ADMINIST. Y DOCENTES</option>
                                    <option value="7">COORPORATIVO</option>
                                </select>
                                <div class="group-material" id="precio" name="precio">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <label for="inputName">OBSERVACIÓN</label>
                            </td>
                            <td>
                            <textarea class="form-control input-lg" id="OBSERVACION" name="OBSERVACION" placeholder="Cambie la Observación"></textarea>
                            </td>
                        </tr>
                        
                        <tr>
                            <td colspan="2" align="center">
                                <H3><B>SITUACIÓN PARTICIPANTE</B></H3> 
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                            <label for="inputName">Situación Final</label>
                            </td>
                            <td>
                            <select name="situacion" id="situacion" class="form-control input-lg" style="width:65%;" >
                            <option value="" disabled="" selected="">Seleccione la Situación</option>
                            <option value="5" >PARTICIPANTE</option>
                            <option value="4" >RETIRADO</option>
                            <option value="2" >APROBADO</option>
                            <option value="3" ><FONT COLOR="RED">DESAPROBADO</FONT></option>
                            </select>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                             <label for="inputName">Al finalizar el curso se emitio:</label>
                             <select name="documento" id="documento" class="form-control input-lg" style="width:65%;" >
                            <option value="" disabled="" selected="">Seleccione el documento</option>
                            <option value="1" >NINGUNO</option>
                            <option value="2" >CERTIFICADO</option>
                            <option value="3" >CONSTANCIA</option>
                            </select>   
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                             <label for="inputName">Se entrego el documento?:</label>
                             <select name="recogio" id="recogio" class="form-control input-lg" style="width:65%;" >
                            <option value="" disabled="" selected="">Seleccione la acción</option>
                            <option value="NO" >NO</option>
                            <option value="SI" >SI</option>
                            </select>   
                            </td>
                        </tr>
                    </tbody>
                    </table>
                </form>
                
                
</div>
