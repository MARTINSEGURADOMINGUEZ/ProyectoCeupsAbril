<div class="modal-body">
                <form id="detalleAlumno" name="detalleAlumno" role="form">
                    <input type="hidden" name="id" id="id">
                    <table class="table" align="center">
                    <tbody>
                        <tr>
                            <td>
                            <label>*DNI</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" id="DNIACTUA" name="DNIACTUA" minlength="8" maxlength="8" placeholder="Ingrese su dni"/>
                            <div id="busquedadniactua" name="busquedadniactua">
                            </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <label for="inputName">*APELLIDOS</label>
                            </td>
                            <td>
                            <input type="text" class="form-control" id="APELLIDOS" name="APELLIDOS" placeholder="Ingrese su apellido"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <label for="inputName">*NOMBRES</label>
                            </td>
                            <td>
                            <input type="text" class="form-control" id="NOMBRES" name="NOMBRES" placeholder="Ingrese su nombre"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <label for="inputName">TELEFONO</label>
                            </td>
                            <td>
                            <input type="text" class="form-control" id="TELEFONOS" name="TELEFONOS" placeholder="Ingrese su telefono"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <label for="inputName">CELULAR</label>
                            </td>
                            <td>
                            <input type="text" class="form-control" id="CELULARES" name="CELULARES" placeholder="Ingrese su celular"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <label for="inputName">DOMICILIO</label>
                            </td>
                            <td>
                            <textarea class="form-control" id="DOMICILIOS" name="DOMICILIOS" placeholder="Ingrese su domicilio"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <label for="inputName">DISTRITO</label>
                            </td>
                            <td>
                                <select name="distritoactua" id="distritoactua" class="form-control input-lg">
                            <option value="" disabled="">Seleccione su Distrito</option>
                            <option value="LIMA" selected="">	LIMA	</option>
                            <option value="ANCON" >	ANCON	</option>
                            <option value="ATE" >	ATE	</option>
                            <option value="BARRANCO" >	BARRANCO	</option>
                            <option value="BRENA" >	BRENA	</option>
                            <option value="CALLAO" >	CALLAO	</option>
                            <option value="BELLAVISTA" >	BELLAVISTA	</option>
                            <option value="LA PUNTA" >	LA PUNTA	</option>
                            <option value="LA PERLA" >	LA PERLA	</option>
                            <option value="CARMEN DE LA LEGUA" >	CARMEN DE LA LEGUA	</option>
                            <option value="VENTANILLA" >	VENTANILLA	</option>
                            <option value="MI PERU" >	MI PERU	</option>
                            <option value="CARABAYLLO" >	CARABAYLLO	</option>
                            <option value="CERCADO DE LIMA">CERCADO DE LIMA</option>
                            <option value="CHACLACAYO" >	CHACLACAYO	</option>
                            <option value="CHORILLOS" >	CHORILLOS	</option>
                            <option value="CIENEGUILLA" >	CIENEGUILLA	</option>
                            <option value="COMAS" >	COMAS	</option>
                            <option value="EL AGUSTINO" >	EL AGUSTINO	</option>
                            <option value="HUACHO" >	HUACHO	</option>
                            <option value="INDEPENDENCIA" >	INDEPENDENCIA	</option>
                            <option value="JESUS MARIA" >	JESUS MARIA	</option>
                            <option value="LA MOLINA" >	LA MOLINA	</option>
                            <option value="LA VICTORIA" >	LA VICTORIA	</option>
                            <option value="LINCE" >	LINCE	</option>
                            <option value="LOS OLIVOS" >	LOS OLIVOS	</option>
                            <option value="LURIGANCHO-CHOSICA" >	LURIGANCHO-CHOSICA	</option>
                            <option value="LURIN" >	LURIN	</option>
                            <option value="MAGDALENA DEL MAR" >	MAGDALENA DEL MAR	</option>
                            <option value="PUEBLO LIBRE" >	PUEBLO LIBRE	</option>
                            <option value="MIRAFLORES" >	MIRAFLORES	</option>
                            <option value="PACHACAMAC" >	PACHACAMAC	</option>
                            <option value="PUCUSANA" >	PUCUSANA	</option>
                            <option value="PUENTE PIEDRA" >	PUENTE PIEDRA	</option>
                            <option value="PUNTA HERMOSA" >	PUNTA HERMOSA	</option>
                            <option value="PUNTA NEGRA" >	PUNTA NEGRA	</option>
                            <option value="RIMAC" >	RIMAC	</option>
                            <option value="SAN BARTOLO" >	SAN BARTOLO	</option>
                            <option value="SAN BORJA" >	SAN BORJA	</option>
                            <option value="SAN ISIDRO" >	SAN ISIDRO	</option>
                            <option value="SAN JUAN DE LURIGANCHO" >	SAN JUAN DE LURIGANCHO	</option>
                            <option value="SAN JUAN DE MIRAFLORES" >	SAN JUAN DE MIRAFLORES	</option>
                            <option value="SAN LUIS" >	SAN LUIS	</option>
                            <option value="SAN MARTIN DE PORRES" >	SAN MARTIN DE PORRES	</option>
                            <option value="SAN MIGUEL" >	SAN MIGUEL	</option>
                            <option value="SANTA ANITA" >	SANTA ANITA	</option>
                            <option value="SANTA MARIA DEL MAR" >	SANTA MARIA DEL MAR	</option>
                            <option value="SANTA ROSA" >	SANTA ROSA	</option>
                            <option value="SANTIAGO DE SURCO" >	SANTIAGO DE SURCO	</option>
                            <option value="SURQUILLO" >	SURQUILLO	</option>
                            <option value="VILLA EL SALVADOR" >	VILLA EL SALVADOR	</option>
                            <option value="VILLA MARIA DEL TRIUNFO" >	VILLA MARIA DEL TRIUNFO	</option>
                        </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <label for="inputName">*Email Personal</label>
                            </td>
                            <td>
                                <div class="input-group" style="width:100%;">
                                    <span id="sizing-addon" class="input-group-addon">@</span>
                                    <input type="email" class="form-control" id="emailpersonal" name="emailpersonal" placeholder="Ingrese el Email Personal"/>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <label for="inputName">Email Institucional</label>
                            </td>
                            <td>
                                <div class="input-group" style="width:100%;">
                                    <span id="sizing-addon" class="input-group-addon">@</span>
                                    <input type="email" class="form-control" id="emailinstitucional" name="emailinstitucional" placeholder="Ingrese el Email Institucional"/>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                <H3><B>Datos Laborales</B></H3> 
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <label for="inputName">EMPRESA Y/O INSTITUCIÓN</label>
                            </td>
                            <td>
                            <input type="text" class="form-control" id="EMPRESAS" name="EMPRESAS" placeholder="Ingrese su apellido"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <label for="inputName">CARGO/AREA</label>
                            </td>
                            <td>
                            <input type="text" class="form-control" id="CARGOS" name="CARGOS" placeholder="Ingrese su nombre"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <label for="inputName">TELEFONO</label>
                            </td>
                            <td>
                            <input type="text" class="form-control" id="TELEFONOEMPRESAS" name="TELEFONOEMPRESAS" placeholder="Ingrese su telefono"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <label for="inputName">DIRECCIÓN EMPRESA</label>
                            </td>
                            <td>
                            <textarea class="form-control" id="DIRECCIONES" name="DIRECCIONES" placeholder="Ingrese su domicilio"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <label for="inputName">DISTRITO EMPRESA</label>
                            </td>
                            <td>
                                <select name="distritoempresaactua" id="distritoempresaactua" class="form-control input-lg" >
                            <option value="" disabled="">Seleccione su Distrito</option>
                            <option value="LIMA"  selected="">LIMA	</option>
                            <option value="ANCON" >ANCON	</option>
                            <option value="ATE" >ATE	</option>
                            <option value="BARRANCO" >BARRANCO	</option>
                            <option value="BRENA" >BRENA	</option>
                            <option value="CALLAO" >CALLAO	</option>
                            <option value="BELLAVISTA" >BELLAVISTA	</option>
                            <option value="LA PUNTA" >	LA PUNTA	</option>
                            <option value="LA PERLA" >	LA PERLA	</option>
                            <option value="CARMEN DE LA LEGUA" >CARMEN DE LA LEGUA	</option>
                            <option value="VENTANILLA" >VENTANILLA	</option>
                            <option value="MI PERU" >MI PERU</option>
                            <option value="CARABAYLLO" >CARABAYLLO	</option>
                            <option value="CHACLACAYO" >CHACLACAYO	</option>
                            <option value="CHORILLOS" >CHORILLOS	</option>
                            <option value="CIENEGUILLA" >CIENEGUILLA	</option>
                            <option value="COMAS" >COMAS</option>
                            <option value="EL AGUSTINO" >EL AGUSTINO	</option>
                            <option value="HUACHO" >HUACHO</option>
                            <option value="INDEPENDENCIA">INDEPENDENCIA	</option>
                            <option value="JESUS MARIA" >JESUS MARIA	</option>
                            <option value="LA MOLINA" >LA MOLINA	</option>
                            <option value="LA VICTORIA" >LA VICTORIA	</option>
                            <option value="LINCE" >LINCE	</option>
                            <option value="LOS OLIVOS" >LOS OLIVOS	</option>
                            <option value="LURIGANCHO-CHOSICA" >LURIGANCHO-CHOSICA	</option>
                            <option value="LURIN" >LURIN	</option>
                            <option value="MAGDALENA DEL MAR" >MAGDALENA DEL MAR</option>
                            <option value="PUEBLO LIBRE" >PUEBLO LIBRE</option>
                            <option value="MIRAFLORES" >MIRAFLORES</option>
                            <option value="PACHACAMAC" >PACHACAMAC</option>
                            <option value="PUCUSANA" >PUCUSANA	</option>
                            <option value="PUENTE PIEDRA" >PUENTE PIEDRA</option>
                            <option value="PUNTA HERMOSA" >PUNTA HERMOSA</option>
                            <option value="PUNTA NEGRA" >PUNTA NEGRA</option>
                            <option value="RIMAC" >RIMAC</option>
                            <option value="SAN BARTOLO" >SAN BARTOLO</option>
                            <option value="SAN BORJA" >SAN BORJA</option>
                            <option value="SAN ISIDRO" >SAN ISIDRO</option>
                            <option value="SAN JUAN DE LURIGANCHO" >SAN JUAN DE LURIGANCHO</option>
                            <option value="SAN JUAN DE MIRAFLORES" >SAN JUAN DE MIRAFLORES</option>
                            <option value="SAN LUIS" >SAN LUIS	</option>
                            <option value="SAN MARTIN DE PORRES" >SAN MARTIN DE PORRES</option>
                            <option value="SAN MIGUEL" >SAN MIGUEL	</option>
                            <option value="SANTA ANITA" >SANTA ANITA	</option>
                            <option value="SANTA MARIA DEL MAR" >SANTA MARIA DEL MAR</option>
                            <option value="SANTA ROSA" >SANTA ROSA	</option>
                            <option value="SANTIAGO DE SURCO" >	SANTIAGO DE SURCO</option>
                            <option value="SURQUILLO" >	SURQUILLO</option>
                            <option value="VILLA EL SALVADOR" >	VILLA EL SALVADOR	</option>
                            <option value="VILLA MARIA DEL TRIUNFO" >	VILLA MARIA DEL TRIUNFO	</option>
                        </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                <H3><B>Observaciones</B></H3> 
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <label for="inputName">OBSERVACIÓN</label>
                            </td>
                            <td>
                            <textarea id="observacionmatri" name="observacionmatri" class="form-control" rows="5" style="text-transform:uppercase;" cols="40"></textarea>
                            </td>
                        </tr>
                        <BR><!-- ESTE ES SOLO UN SALTO DE LINEA INOFENSIVO -->
                    </tbody>
                    </table>
                </form>
</div>
