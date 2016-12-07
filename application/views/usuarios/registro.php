      <div class="row">
        <?php echo form_open(base_url('usuario/guardar')) ?>
         <div class="text-center">
          <h3>Registar Usuario</h3>
          <p>Los campos con * son obligatorios</p>
          <?php if(validation_errors() != false) echo "<div class='alert alert-danger'>" . validation_errors() . "</div>"; ?>
        </div>
          <div class="col col-sm-4 col-sm-offset-2">


            <div class="form-group input-group">
              <span class="input-group-addon">*Usuario</span>
              <input class="form-control" required name="usuario" value="<?php echo (isset($usuario->usuario)?$usuario->usuario:""); ?>" type="text"/>
            </div>
            <div class="form-group input-group">
              <span class="input-group-addon">*Clave</span>
              <input class="form-control" required name="clave" value="" type="password"/>
            </div>
            <div class="form-group input-group">
              <span class="input-group-addon">*Nombre</span>
              <input class="form-control" required name="nombre" value="<?php echo (isset($usuario->nombre)?$usuario->nombre:""); ?>" type="text"/>
            </div>
            <div class="form-group input-group">
              <span class="input-group-addon">*Apellido</span>
              <input class="form-control" required name="apellido" value="<?php echo (isset($usuario->apellido)?$usuario->apellido:""); ?>" type="text"/>
            </div>
            <div class="form-group input-group">
              <span class="input-group-addon">Cedula</span>
              <input class="form-control" onkeyup="this.value=this.value.replace(/[^\d]/,'')" maxlength="11"  name="cedula" value="<?php echo (isset($usuario->cedula)?$usuario->cedula:""); ?>" type="text"/>
            </div>
          </div>
          <div class="col col-sm-4">
            <div class="form-group input-group">
              <span class="input-group-addon">*Correo</span>
              <input class="form-control" required name="correo" value="<?php echo (isset($usuario->correo)?$usuario->correo:""); ?>" type="text"/>
            </div>
            <div class="form-group input-group">
              <span class="input-group-addon">*Telefono</span>
              <input class="form-control" onkeyup="this.value=this.value.replace(/[^\d]/,'')" maxlength="10" required name="telefono" value="<?php echo (isset($usuario->telefono)?$usuario->telefono:""); ?>" type="text"/>
            </div>
            <div class="form-group input-group">
              <span class="input-group-addon">Celular</span>
              <input class="form-control" onkeyup="this.value=this.value.replace(/[^\d]/,'')" maxlength="10" name="celular" value="<?php echo (isset($usuario->celular)?$usuario->celular:""); ?>" type="text"/>
            </div>
            <div class="form-group input-group">
              <span class="input-group-addon">Fax</span>
              <input class="form-control" onkeyup="this.value=this.value.replace(/[^\d]/,'')" maxlength="10" name="fax" value="<?php echo (isset($usuario->fax)?$usuario->fax:""); ?>" type="text"/>
            </div>
            <div class="form-group input-group">
              <span class="input-group-addon">Informacion</span>
              <input class="form-control" name="informacion" value="<?php echo (isset($usuario->informacion)?$usuario->informacion:""); ?>" type="text"/>
            </div>
            <div class="text-right">
              <button class="btn btn-primary" type="submit">Registrar</button>
            </div>
          </div>
            <h3></h3>
          <?php echo form_close(); ?>
        </div>
