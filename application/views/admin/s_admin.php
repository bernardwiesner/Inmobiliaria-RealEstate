<div class="text-center"><h3>Administracion</h3></div>

  <div class="row">
    <form action="<?php echo base_url('s_admin/guardarTipo'); ?>" method="post">
    <div class="col col-sm-4 col-sm-offset-2">
      <div class="form-group input-group">
        <h4>Editar Tipos de Inmuebles</h4>
        <div class="form-group input-group">
          <span class="input-group-addon">Codigo</span>
          <input class="form-control" name="id" readonly value="<?php echo (isset($tipo->id)?$tipo->id:''); ?>" type="text"/>
        </div>
        <div class="form-group input-group"  >
          <span class="input-group-addon">Tipo</span>
          <input class="form-control" name="nombre" value="<?php echo (isset($tipo->nombre)?$tipo->nombre:''); ?>" type="text"/>
        </div>
        <div class="text-right">
          <button class="btn btn-primary" type="submit">Guardar</button>
        </div>
      </div>
      </div>
      <div class="col col-sm-4">
        <table class="table">
          <thead>
            <tr>
              <th>Codigo</th>
              <th>Nombre</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if(isset($tipos)){
              foreach($tipos as $tipo){
                $linkEdit = base_url("/s_admin/?id_tipo={$tipo->id}");
                $linkDelete = base_url("/s_admin/deleteTipo/?id={$tipo->id}");

                echo "<tr>";
                foreach ($tipo as $key => $value) {
                  echo "<td>{$value}</td>";
                }
                echo "<td
                ><a href='{$linkEdit}' class='btn btn-info btn-sm'>Edit</a>
                <a href='{$linkDelete}' onclick='return confirm(\"Seguro?\");' class='btn btn-danger btn-sm'>Del</a>
                      </td>
                </tr>";
              }
            }
             ?>
          </tbody>
        </table>
      </div>

    </form>
    </div>
    <div class="row">
      <form action="<?php echo base_url('s_admin/guardarAccion'); ?>" method="post">
      <div class="col col-sm-4 col-sm-offset-2">
        <div class="form-group input-group">
          <h4>Editar Tipos de Acciones</h4>
          <div class="form-group input-group">
            <span class="input-group-addon">Codigo</span>
            <input class="form-control" name="id" readonly value="<?php echo (isset($accion->id)?$accion->id:''); ?>" type="text"/>
          </div>
          <div class="form-group input-group"  >
            <span class="input-group-addon">Accion</span>
            <input class="form-control" name="nombre" value="<?php echo (isset($accion->nombre)?$accion->nombre:''); ?>" type="text"/>
          </div>
          <div class="text-right">
            <button class="btn btn-primary" type="submit">Guardar</button>
          </div>
        </div>
      </div>
      <div class="col col-sm-4">
          <table class="table">
            <thead>
              <tr>
                <th>Codigo</th>
                <th>Nombre</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if(isset($acciones)){
                foreach($acciones as $accion){
                  $linkEdit = base_url("/s_admin/?id_accion={$accion->id}");
                  $linkDelete = base_url("/s_admin/deleteAccion/?id={$accion->id}");

                  echo "<tr>";
                  foreach ($accion as $key => $value) {
                    echo "<td>{$value}</td>";
                  }
                  echo "<td
                  ><a href='{$linkEdit}' class='btn btn-info btn-sm'>Edit</a>
                  <a href='{$linkDelete}' onclick='return confirm(\"Seguro?\");' class='btn btn-danger btn-sm'>Del</a>
                        </td>
                  </tr>";
                }
              }
               ?>
            </tbody>
          </table>
        </div>
      </form>
      </div>
      <hr></hr>
      <div class="row">
        <div class="col col-sm-8 col-sm-offset-2">
        <h4>Editar Usuarios</h4>
        <p>Para eliminar cualquier usuario, o para asignar un usuario como administrador.</p>
        <a href="<?php echo base_url('S_admin/usuarios') ?>" class="btn btn-primary" type="submit">Administrar Usuarios</a>
        </div>
      </div>
