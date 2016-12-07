      <div class="row">
        <?php echo form_open(base_url('usuario/editar')) ?>
        <div class="text-center">
         <h3>Editar Perfil</h3>
         <p>Los campos con * son obligatorios</p>
          <?php if(validation_errors() != false) echo "<div class='alert alert-danger'>" . validation_errors() . "</div>"; ?>         
       </div>
          <div class="col col-sm-4 col-sm-offset-2">

            <?php if(form_error('usuario') != false) echo "<div class='alert alert-danger'>" . form_error('usuario') . "</div>"; ?>
            <div class="form-group input-group">
              <span class="input-group-addon">Usuario</span>
              <input class="form-control" readonly name="usuario" value="<?php echo (isset($usuario->usuario)?$usuario->usuario:""); ?>" type="text"/>
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
              <input class="form-control"  name="cedula" onkeyup="this.value=this.value.replace(/[^\d]/,'')"  value="<?php echo (isset($usuario->cedula)?$usuario->cedula:""); ?>" type="text"/>
            </div>
          </div>
          <div class="col col-sm-4">
            <div class="form-group input-group">
              <span class="input-group-addon">*Correo</span>
              <input class="form-control" readonly name="correo" value="<?php echo (isset($usuario->correo)?$usuario->correo:""); ?>" type="text"/>
            </div>
            <div class="form-group input-group">
              <span class="input-group-addon">*Telefono</span>
              <input class="form-control" required name="telefono" onkeyup="this.value=this.value.replace(/[^\d]/,'')"  value="<?php echo (isset($usuario->telefono)?$usuario->telefono:""); ?>" type="text"/>
            </div>
            <div class="form-group input-group">
              <span class="input-group-addon">Celular</span>
              <input class="form-control" name="celular" onkeyup="this.value=this.value.replace(/[^\d]/,'')"  value="<?php echo (isset($usuario->celular)?$usuario->celular:""); ?>" type="text"/>
            </div>
            <div class="form-group input-group">
              <span class="input-group-addon">Fax</span>
              <input class="form-control" name="fax" onkeyup="this.value=this.value.replace(/[^\d]/,'')"  value="<?php echo (isset($usuario->fax)?$usuario->fax:""); ?>" type="text"/>
            </div>
            <div class="form-group input-group">
              <span class="input-group-addon">Informacion</span>
              <input class="form-control" name="informacion" value="<?php echo (isset($usuario->informacion)?$usuario->informacion:""); ?>" type="text"/>
            </div>
            <input type="hidden" name="id" value="<?php echo (isset($usuario->id)?$usuario->id:""); ?>">
            <div class="text-right">
              <button class="btn btn-primary" type="submit">Editar</button>
            </div>
            <h3></h3>
          </div>
        <?php echo form_close(); ?>

      </div>
