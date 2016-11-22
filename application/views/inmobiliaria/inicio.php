   <div class="row">
    <form action="<?php echo base_url('inmobiliaria'); ?>" method="get">
     <div class="col col-sm-1">
       <a class="btn btn-default" href="<?php echo base_url('inmobiliaria/mapa') ?>">Vista Mapa</a>
     </div>
     <div class="col col-sm-2 col-sm-offset-8" style="width:auto ; padding-right:0">
       <div class="form-group input-group">

        <select name="id_tipo" class="form-control" id="sel1">
          <option value='0'>Todos</option>
          <?php
          if(isset($tipos)){
             foreach($tipos as $tipo){
               echo "<option "; if($tipo_seleccionado == $tipo->id) echo "selected='selected'"; echo " value='$tipo->id'>{$tipo->nombre}</option>";

             }
           }
          ?>
        </select>
        <span class="input-group-btn">
           <button type="submit" class="btn btn-default">Filtrar</button>
         </span>
      </div>
      </div>
      <div class="col col-sm-1">

      </div>

   </form>
 </div>
   <div class="row">


     <?php
     if(isset($anuncios)){
        foreach($anuncios as $anuncio){

            echo "<div class='img'>
                     <a href='" . base_url("Detalle_articulo/?articulo=$anuncio->id_anuncio") . "'>
                       <img src='" . base_url("$anuncio->foto") . "'  width='300' height='200'>
                     </a>
                     <div class='desc'>$anuncio->titulo</div>
                   </div>";


        }
      }


     ?>






   </div>
