<a class="btn btn-primary" href="<?php echo base_url('perfil') ?>"><span class="glyphicon glyphicon-chevron-left"></span> Atras</a>
<div class="text-center"><h3>Mis Anuncios</h3></div>
<form action="<?php echo base_url('perfil/guardar'); ?>" enctype="multipart/form-data" method="post">
  <div class="row">

    <div class="col col-sm-4 col-sm-offset-2">
      <div class="form-group input-group">
        <span class="input-group-addon">Codigo</span>
        <input class="form-control" name="id"  value="<?php echo (isset($anuncio->id)?$anuncio->id:''); ?>" type="text" readonly/>
      </div>
      <div class="form-group input-group">
        <span class="input-group-addon">Titulo</span>
        <input class="form-control" name="titulo"  value="<?php echo (isset($anuncio->titulo)?$anuncio->titulo:''); ?>" type="text"/>
      </div>
      <div class="form-group input-group"  >
        <span class="input-group-addon">Direccion</span>
        <input class="form-control" name="direccion"  id="datetimepicker4" value="<?php echo (isset($anuncio->direccion)?$anuncio->direccion:''); ?>" type="text"/>
      </div>
    </div>
    <div class="col col-sm-4">


        <div class="form-group input-group">
        <span class="input-group-addon">Tipo</span>
         <select name="id_tipo" class="form-control" id="sel1">
           <?php
           if(isset($tipos)){
              foreach($tipos as $tipo){
                echo "<option "; if(isset($anuncio->id_tipo)){if($anuncio->id_tipo == $tipo->id) echo "selected='selected'";} echo " value='$tipo->id'>{$tipo->nombre}</option>";

              }
            }
           ?>
         </select>
       </div>
       <div class="form-group input-group">
       <span class="input-group-addon">Tipo</span>
        <select name="id_accion" class="form-control" id="sel1">
          <?php
          if(isset($acciones)){
             foreach($acciones as $accion){
               echo "<option "; if(isset($anuncio->id_accion)){if($anuncio->id_accion == $accion->id) echo "selected='selected'";} echo " value='$accion->id'>{$accion->nombre}</option>";

             }
           }
          ?>
        </select>
      </div>
      <div class="form-group input-group">
        <span class="input-group-addon">Precio</span>
        <input class="form-control" name="precio"  value="<?php echo (isset($anuncio->precio)?$anuncio->precio:''); ?>" type="text"/>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col col-sm-8 col-sm-offset-2">
      <hr></hr>
      <div class="form-group input-group">
        <label for="descripcion">Descripcion:</label>
        <textarea class="form-control" rows="6" cols="100" name="descripcion"><?php echo (isset($anuncio->descripcion)?$anuncio->descripcion:''); ?></textarea>

      </div>
      <hr>
      <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjazpmebK2Cz3__1Uzxy3ssRZ9nRUxC6s"></script>
      <script type="text/javascript" src="<?php echo base_url('js/map.js') ?>"></script>

      <div id="map"></div>
      <div class="form-group input-group">
        <span class="input-group-addon">Ubicacion</span>
        <input id="lat" class="form-control" name="ubicacion" readonly="yes" value="<?php echo (isset($anuncio->ubicacion)?$anuncio->ubicacion:''); ?>" type="text"/>
      </div>
      <hr>
      <!--Foto -->
      <script>

      var cookies = document.cookie.split(";").
      map(function(el){ return el.split("="); }).
      reduce(function(prev,cur){ prev[cur[0]] = cur[1];return prev },{});

      var counter = 1;
      if(cookies["num"] > 0){

        counter = cookies["num"];
        counter++;

      }
      var limit = 10;
      function addInput(divName){
           if (counter == limit)  {
                alert("You have reached the limit of adding " + counter + " inputs");
           }
           else {
                var newdiv = document.createElement('div');
                newdiv.innerHTML = "<div id='userfile"+(counter + 1)+"'><br>Foto "+(counter+1)+"<input class='form-control'  type='file' name='userfile"+(counter + 1)+"' required=''></div>";
                document.getElementById(divName).appendChild(newdiv);
                counter++;
           }
      }
      function removeInput(){
                var name = 'userfile'+(counter);
                document.getElementById(name).remove();
                counter--;

      }
      </script>
      <div class='form-group input-group'>
      <?php
        if(isset($fotos)){
          setcookie("num", count($fotos), time()+5);
          foreach($fotos as $foto){

              echo "<div class='img-small'>
                         <img src='" . base_url("$foto->foto") . "'  width='300' height='200'>
                       <div class='desc-small'><a onclick='return confirm(\"Seguro?\");' href=" . base_url("perfil/deleteFoto?id_anuncio={$anuncio->id}&id_foto={$foto->id}&path={$foto->foto}") . " >Delete</a></div>
                     </div>";
          }
          }
      ?>
      </div>
      <div class="form-group input-group" id="dynamicInput">
        <?php echo (isset($error))?$error:'' ;?> <br>
        Max. 10 fotos (1 requerida) Tamaño Max: 100KB, 1024*768 <br>
        <?php echo 'Foto: ' . (count($fotos)+1) .  '<input type="file" ';  if((count($fotos)+1) == 1) echo "required"; echo ' name="userfile1" size="20" class="form-control" />'; ?>
      </div>
      <input type="hidden" name="num" value= <?php echo (count($fotos)+1); ?> >
      <input type="button" class="btn btn-default" value="Añadir Imagen" onClick="addInput('dynamicInput');">
      <input type="button" class="btn btn-default" value="Quitar Imagen" onClick="removeInput();">
      <div class="text-right">
        <button class="btn btn-primary" type="submit" value="upload">Guardar</button>
      </div>
      <h3>
    </div>
  </div>
</form>
<div class="row">
  <div class="col col-sm-9">
    <table class="table">
      <thead>
        <tr>

          <?php
            if(isset($anuncios)){
              foreach($anuncios as $anuncio){

                foreach ($anuncio as $key => $value) {
                  echo "<th>{$key}</th>";
                }
                break;
              }
            }
           ?>
        </tr>
      </thead>
      <tbody>
        <?php
          if(isset($anuncios)){
            foreach($anuncios as $anuncio){
              $linkEdit = base_url("/perfil/?id={$anuncio->id}");
              $linkDelete = base_url("/perfil/delete/?id={$anuncio->id}");

              echo "<tr>";
              foreach ($anuncio as $key => $value) {
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
</div>
