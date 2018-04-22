<div class="modal-body">
    <form id="detalleNuevoCurso" name="detalleNuevoCurso" enctype="multipart/form-data">
    <table width="400" align="center" class="table">
    
    <tr>
	<td class="tdatos">Tipo de Curso</td>
	<td class="dtabla">
            <select id="tipo_curso" name="tipo_curso" class="form-control">
                <option value="" disabled="" selected="">Seleccione</option>
		<option  value=1>OSCE-CONTRATACIONES</option>
                <option  value=2>VILLARREAL</option>
            </select>
    </td>
    </tr>

    <tr>
            <td class="tdatos">¿Curso taller?</td>
            <td class="dtabla">

        <label class="radio-inline">
            <input type="radio" id="taller"  name="taller" value="1" required>Si</label>

        <label class="radio-inline">
          <input type="radio" id="taller" checked=""  name="taller" value="0" required>No</label>

            </td>
    </tr>

    <tr>
            <td class="tdatos">Nombre del Curso</td>
            <td class="dtabla"><input type="text" class="form-control" id="nom_curso" name="nom_curso" value="" size="40" style="text-transform:uppercase;" required /></td>
    </tr>

</table>
</form>
</div>

