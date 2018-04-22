<div class="modal-body">
    
<form enctype="multipart/form-data" id="formDocente">
<table width="400" align="center" class="table">
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
	<td class="tdatos">Apellidos(*)</td>
	<td class="dtabla">
    
    <input type="text" name="apellido" id="apellido" class="form-control" value="" size="40" style="text-transform:uppercase;"  required="required" />
    
    
    </td>
</tr>
<tr>
	<td class="tdatos">Nombres(*)</td>
	<td class="dtabla">
    <input type="text" name="nombre"  id="nombre" class="form-control"  value="" size="40" style="text-transform:uppercase;"  required="required" /></td>
</tr>


<tr>
	<td class="tdatos">Email Personal(*)</td>
	<td class="dtabla">
    <div class="input-group">
    
   <span class="input-group-addon">@</span> 
   
    <input type="text" class="form-control" name="email_p" id="email_p" value="" pattern="^[a-zA-Z0-9.!#$%'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" style="text-transform:lowercase;" size="40"/>
    
    
    </div>
    
    </td>
</tr>
<tr>
	<td class="tdatos">Celular</td>
	<td class="dtabla">
    
    <div class="col-xs-6">
    
    
    <input type="text" name="celular_e" id="celular_e" class="form-control" value="" size="12" maxlength="9" minlength="9"/>
    
    </div>
    </td>
</tr>
<tr>
	<td class="tdatos">Telefono</td>
	<td class="dtabla">
    
    <div class="col-xs-6" >
    <input type="text" name="telefono_e" id="telefono_e" maxlength="9" minlength="7" class="form-control" size="12" />
    </div>
    <div class="col-xs-6">
      
     <div class="input-group " style="width:100%;" >
  <span class="input-group-addon" id="sizing-addon3">Anexo:</span>
     <input type="text" class="form-control"  name="anexo_pre" id="anexo_pre" value="" size="3" maxlength="4" minlength="1" aria-describedby="sizing-addon3"/>
     </div>
    </div>
    </td>

</tr>

<tr>
                            <td>
                            <label for="inputName">DOMICILIO</label>
                            </td>
                            <td>
                            <textarea class="form-control" id="DIRECCIONES" name="DIRECCIONES" placeholder="Ingrese su domicilio"></textarea>
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

</table>
</form>
    
</div>