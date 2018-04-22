<div class="modal-body">
    
    <form enctype="multipart/form-data">
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
    <td class="tdatos">Email Institucional(*)</td>
    <td class="dtabla">
    <div class="input-group">
    
    <span class="input-group-addon">@</span> 
    <input type="text" class="form-control" name="email_i" id="email_i" value="" pattern="^[a-zA-Z0-9.!#$%'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" style="text-transform:lowercase;" size="40"/>
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

</table>
</form>
    
</div>