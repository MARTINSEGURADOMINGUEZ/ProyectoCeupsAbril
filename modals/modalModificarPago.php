<div class="modal-body">
    <form role="form" id="formActualizarPago" name="formActualizarPago">
                    <input type="hidden" name="idpagomatricula" id="idpagomatricula">
                    <table class="table">
                    <tbody>
                        <tr>
                            <td>
                            <label>*CURSO</label>
                            </td>
                            <td>
                                <input type="text" disabled="" class="form-control" id="CURSO" name="CURSO" placeholder=""/>
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
                                <input type="text" disabled="" class="form-control" id="DNI" name="DNI" />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                <H3><B>DATOS DEL PAGO</B></H3> 
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                              
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
                                    
                            </td>
                        </tr>
                        
                        <tr>
                            <td colspan="2" align="center">
                             
                           <div class="input-group">
                                <span class="input-group-addon"><B>NUMERO DE PAGO:</B></span>
                                <input type="text" id="numeropago" name="numeropago" maxlength="10" minlength="10" class="form-control input-lg" title="Numero de Pago">
                                <span class="input-group-addon"><B>FECHA DE PAGO:</B></span>
                                <input type="date" class="form-control input-lg" name="fechapago" id="fechapago" placeholder="Introduce una fecha">
                           </div>
                           <!--div id="verificarNumeroPago" name="verificarNumeroPago"></div-->
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                             <div id="verificarNumeroPago" name="verificarNumeroPago"></div>   
                            </td>
                        </tr>
                        
                        <tr>
                            <td colspan="2" align="center">
                                <label>MONTO</label>
                                <input type="text" id="montopagoactua" name="montopagoactua" value="" placeholder="0000.00" class="form-control input-lg" required="" title="INGRESE EL MONTO EN NUMEROS">
                            </td>     
                        </tr>
                    </tbody>
                    </table>
                </form>
</div>
