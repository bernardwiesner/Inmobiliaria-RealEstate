<a class="btn btn-primary" href="<?php echo base_url('s_admin') ?>"><span class="glyphicon glyphicon-chevron-left"></span> Atras</a>
<h3>Usuarios</h3>
<div>
  <form method="post" action="<?php echo base_url('s_admin/editarUsuario') ?>">
    <div class="col col-sm-4">
      <div class="form-group input-group">
        <span class="input-group-addon">Codigo</span>
        <input class="form-control" readonly name="id" value="<?php echo (isset($usuario->id)?$usuario->id:''); ?>" type="text"/>
      </div>
      <div class="form-group input-group">
        <span class="input-group-addon">Usuario</span>
        <input class="form-control" readonly name="usuario" value="<?php echo (isset($usuario->usuario)?$usuario->usuario:''); ?>" type="text"/>
      </div>
      <div class="form-group input-group">
        <span class="input-group-addon">Nombre</span>
        <input class="form-control" readonly name="nombre" value="<?php echo (isset($usuario->nombre)?$usuario->nombre:''); ?>" type="text"/>
      </div>
      <div class="form-group input-group">
        <span class="input-group-addon">Activo</span>
        <input class="form-control" <?php if(isset($usuario->id)){if($usuario->id==0){echo 'readonly';}} ?> name="activo" value="<?php echo (isset($usuario->activo)?$usuario->activo:''); ?>" type="text" required=""/>
      </div>
      <div class="form-group input-group">
        <span class="input-group-addon">Admin</span>
        <input class="form-control" <?php if(isset($usuario->id)){if($usuario->id==0){echo 'readonly';}} ?> name="admin" value="<?php echo (isset($usuario->admin)?$usuario->admin:''); ?>" type="text" required=""/>
      </div>
      <div class="text-right">
        <button class="btn btn-primary" type="submit">Guardar</button>
      </div>
      <?php echo (isset($error['mensaje'])?$error['mensaje']:''); ?>
    </div>
  </form>
</div>
<div class="row">
  <div class="col col-sm-12">
  <table class="table">
    <thead>
      <tr>
        <th>Codigo</th>
        <th>Usuario</th>
        <th>Correo</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Telefono</th>
        <th>Activo</th>
        <th>Admin</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if(isset($usuarios)){
        foreach($usuarios as $usuario){
          $linkEdit = base_url("/s_admin/usuarios/?id={$usuario->id}");

          echo "<tr>";

            echo "<td>{$usuario->id}</td>";
            echo "<td>{$usuario->usuario}</td>";
            echo "<td>{$usuario->correo}</td>";
            echo "<td>{$usuario->nombre}</td>";
            echo "<td>{$usuario->apellido}</td>";
            echo "<td>{$usuario->telefono}</td>";
            echo "<td>{$usuario->activo}</td>";
            echo "<td>{$usuario->admin}</td>";

          echo "<td
          ><a href='{$linkEdit}' class='btn btn-info btn-sm'>Editar</a>
                </td>
          </tr>";
        }
      }
       ?>
    </tbody>
  </table>
  </div>
</div>
