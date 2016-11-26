<a class="btn btn-primary" href="<?php echo base_url('s_admin') ?>"><span class="glyphicon glyphicon-chevron-left"></span> Atras</a>
<div class="text-center"><h3>Anuncios</h3></div>
<div class="row">
  <div class="col col-sm-12">
    <table class="table">
      <thead>
        <tr>
          <th>Codigo</th>
          <th>Titulo</th>
          <th>Direccion</th>
          <th>Precio</th>
          <th>Activado</th>
        </tr>
      </thead>
      <tbody>
        <?php
          if(isset($anuncios)){
            foreach($anuncios as $anuncio){
              $linkDelete = base_url("/s_admin/desactivar_activar/?id={$anuncio->id}&activo={$anuncio->activo}");

              echo "<tr>";

                echo "<td>{$anuncio->id}</td>";
                echo "<td>{$anuncio->titulo}</td>";
                echo "<td>{$anuncio->direccion}</td>";
                echo "<td>{$anuncio->precio}</td>";
                echo "<td>{$anuncio->activo}</td>";

                echo "<td>";

              if($anuncio->activo == 1){echo "
              <a href='{$linkDelete}' onclick='return confirm(\"Seguro?\");' class='btn btn-danger btn-sm'>Desactivar</a>
                    </td>
              </tr>";
            }else{ echo "
                <a href='{$linkDelete}' onclick='return confirm(\"Seguro?\");' class='btn btn-success btn-sm'>Activar</a>
                      </td>
                </tr>";
              }
            }

          }
         ?>
      </tbody>
    </table>
  </div>
</div>
