   <div class="row">
    <form action="<?php echo base_url('inmobiliaria'); ?>" method="get">
     <div class="col col-sm-1">
       <a class="btn btn-default" href="<?php echo base_url('inmobiliaria/mapa') ?>">Vista Mapa</a>
     </div>
     <div class="col col-sm-3 col-sm-offset-8">
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
       $num = 0;
        foreach($anuncios as $anuncio){
          if($num%4==0){
            echo "</div>";
            echo "<div class='row'>";

          }
          echo "<div class='col col-sm-2.5'>";

            echo "<div class='img'>
                     <a href='" . base_url("Detalle_articulo/?articulo=$anuncio->id_anuncio") . "'>
                       <img src='" . base_url("$anuncio->foto") . "' >
                     </a>
                     <div class='desc'><a href='" . base_url("Detalle_articulo/?articulo=$anuncio->id_anuncio") . "'>$anuncio->titulo</a> <p class='text-muted'> $anuncio->direccion </p> <strong>RD$" . number_format($anuncio->precio) . "</strong></div>
                   </div>";
        echo "</div>";


        $num++;
        }


      }


     ?>
   </div>
   <div class="row text-center">
   <ul class="pagination">
   <?php foreach ($links as $link) {
   echo $link;
   } ?>
   </ul>
 </div>
