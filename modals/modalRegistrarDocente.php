<div class="modal-body">
    <form autocomplete="off">
                    <div class="row">
                       <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                           <legend><h2>Datos Personales del Docente</h2></legend>
                           <br><br>
                            <div class="group-material">
                                <input type="text" id="dni" name="dni" class="material-control tooltips-general" placeholder="Ingrese el dni del docente" required="" maxlength="8" data-toggle="tooltip" data-placement="top" title="DNI del Docente">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>DNI</label>
                            </div>
                            <div class="group-material">
                                <input type="text" id="nombre" name="nombre" class="material-control tooltips-general" placeholder="Escribe aquí los nombres del alumno" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Nombres del Docente">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>NOMBRES</label>
                            </div>
                            <div class="group-material">
                                <input type="text" id="apellido" name="apellido" class="material-control tooltips-general" placeholder="Escribe aquí los apellidos del alumno" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Apellidos del Docente">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>APELLIDOS</label>
                            </div>
                           <div class="group-material">
                               <input type="text" id="celular" name="celular" class="material-control tooltips-general" placeholder="Celular" pattern="[0-9]{9,9}" required="" maxlength="9" data-toggle="tooltip" data-placement="top" title="Solamente 9 números">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>CELULAR</label>
                            </div>
                           <div class="group-material">
                               <input type="text" id="telefono" name="telefono" class="material-control tooltips-general" placeholder="Teléfono"  required="" minlength="1"  data-toggle="tooltip" data-placement="top" title="Solamente 7 números">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>TELEFONO FIJO</label>
                            </div>
                           <div class="group-material">
                                <input type="text" id="cargo" name="cargo" class="material-control tooltips-general" placeholder="Escribe aquí los nombres del alumno" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Nombres del estudiante">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>PROFESION</label>
                            </div>
                           <div class="group-material">
                               <input type="text" id="domicilio" name="domicilio" class="material-control tooltips-general" placeholder="Ingrese Domicilio" rows="5" required=""  maxlength="99" data-toggle="tooltip" data-placement="top" title="Dirección Personal">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>DOMICILIO</label>
                            </div>
                            <div class="group-material">
                                <span>DISTRITO</span>
                                <select id="distrito" name="distrito" class="material-control tooltips-general" data-toggle="tooltip" data-placement="top" title="Elige la sección a la que pertenece el alumno">
                                    <option value="" disabled="" selected="">Selecciona un distrito</option>
                                    <option value="NOCSABE" >SIN DISTRITO</option>
                                    <option value="LIMA" >LIMA</option>
                                    <option value="ANCON">ANCON</option>
                                    <option value="ATE">ATE</option>
                                    <option value="BARRANCO">BARRANCO</option>
                                    <option value="BRENA">BRENA</option>
                                    <option value="CALLAO">CALLAO</option>
                                    <option value="BELLAVISTA">BELLAVISTA</option>
                                    <option value="LA PUNTA">LA PUNTA</option>
                                    <option value="LA PERLA">LA PERLA</option>
                                    <option value="CARMEN DE LA LEGUA" >CARMEN DE LA LEGUA</option>
                                    <option value="VENTANILLA">VENTANILLA</option>
                                    <option value="MI PERU">MI PERU</option>
                                    <option value="CARABAYLLO">CARABAYLLO</option>
                                    <option value="CHACLACAYO">CHACLACAYO</option>
                                    <option value="CHORILLOS">CHORILLOS</option>
                                    <option value="CIENEGUILLA">CIENEGUILLA</option>
                                    <option value="COMAS" >COMAS</option>
                                    <option value="EL AGUSTINO" >EL AGUSTINO</option>
                                    <option value="HUACHO" >HUACHO</option>
                                    <option value="INDEPENDENCIA" >INDEPENDENCIA</option>
                                    <option value="JESUS MARIA" >JESUS MARIA</option>
                                    <option value="LA MOLINA" >LA MOLINA</option>
                                    <option value="LA VICTORIA" >LA VICTORIA</option>
                                    <option value="LINCE" >LINCE</option>
                                    <option value="LOS OLIVOS" >LOS OLIVOS</option>
                                    <option value="LURIGANCHO-CHOSICA" >LURIGANCHO-CHOSICA</option>
                                    <option value="LURIN" >LURIN</option>
                                    <option value="MAGDALENA DEL MAR" >MAGDALENA DEL MAR</option>
                                    <option value="PUEBLO LIBRE" >PUEBLO LIBRE</option>
                                    <option value="MIRAFLORES" >MIRAFLORES</option>
                                    <option value="PACHACAMAC" >PACHACAMAC</option>
                                    <option value="PUCUSANA" >PUCUSANA</option>
                                    <option value="PUENTE PIEDRA" >PUENTE PIEDRA</option>
                                    <option value="PUNTA HERMOSA" >PUNTA HERMOSA</option>
                                    <option value="PUNTA NEGRA" >PUNTA NEGRA</option>
                                    <option value="RIMAC" >RIMAC</option>
                                    <option value="SAN BARTOLO" >SAN BARTOLO</option>
                                    <option value="SAN BORJA" >SAN BORJA</option>
                                    <option value="SAN ISIDRO" >SAN ISIDRO</option>
                                    <option value="SAN JUAN DE LURIGANCHO" >SAN JUAN DE LURIGANCHO</option>
                                    <option value="SAN JUAN DE MIRAFLORES" >SAN JUAN DE MIRAFLORES</option>
                                    <option value="SAN LUIS" >SAN LUIS</option>
                                    <option value="SAN MARTIN DE PORRES" >SAN MARTIN DE PORRES</option>
                                    <option value="SAN MIGUEL" >SAN MIGUEL</option>
                                    <option value="SANTA ANITA" >SANTA ANITA</option>
                                    <option value="SANTA MARIA DEL MAR" >SANTA MARIA DEL MAR</option>
                                    <option value="SANTA ROSA" >SANTA ROSA</option>
                                    <option value="SANTIAGO DE SURCO" >SANTIAGO DE SURCO</option>
                                    <option value="SURQUILLO" >	SURQUILLO</option>
                                    <option value="VILLA EL SALVADOR" >VILLA EL SALVADOR</option>
                                    <option value="VILLA MARIA DEL TRIUNFO" >VILLA MARIA DEL TRIUNFO	</option>
                                </select>
                            </div>
                           <div class="group-material">
                                <input type="email" id="emailperso" name="emailperso" class="material-control tooltips-general" placeholder="E-mail Personal"  maxlength="50" data-toggle="tooltip" data-placement="top" title="Escriba el Email del Alumno">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Email Personal</label>
                            </div>
                           <legend><h2>Seleccione el Curso</h2></legend>
                            <br>
                           <div class="group-material">
                               <input type="text" id="curso" name="curso" autocomplete="off" class="material-control tooltips-general" placeholder="Ingrese el curso"  required="" minlength="1"  data-toggle="tooltip" data-placement="top" title="Curso">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>CURSO</label>
                            </div>
                            
                            <p class="text-center">
                                <button type="reset" class="btn btn-info btn-lg" style="margin-right: 20px;"><i class="zmdi zmdi-roller"></i> &nbsp;&nbsp; Limpiar</button>
                                <button id="register" name="register" class="btn btn-primary btn-lg"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Registrar</button>
                            </p> 
                       </div>
                    </div>
                </form>
</div>