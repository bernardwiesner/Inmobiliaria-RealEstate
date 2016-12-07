
<div class="row">

<div class="col col-sm-4">
  <div class="well">
  <div class="carousel-main">
      <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0"></li>
            <?php
              $num = 0;
              while($num < count($fotos)-1){
                  echo '<li data-target="#myCarousel" data-slide-to="'.$num.'"></li>';
                  $num++;
              }
             ?>
        </ol>

        <div class="carousel-inner" role="listbox">

              <?php
              $x = 0;
              if(isset($fotos)){

                 foreach($fotos as $foto){
                   echo '<div ';
                    if($x == 0){
                        echo  'class="item active">';
                    }else{
                        echo 'class="item">';
                    }
                    echo  '<a href="' . base_url($foto->foto) . '"><img src="' . base_url($foto->foto) . '"></a></div>' ;

                    $x++;

                 }
               }

              ?>

        </div>

        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
  </div>
  </div>

</div>
    <div class="col col-sm-5">


      <div class="well well-sm"><h4><?php if(isset($anuncio)) echo $anuncio->titulo ?> / <?php if(isset($anuncio)) echo  $anuncio->tipo_nombre; ?></h4></div>


      <div class="row">
          <div class="col col-sm-12">

                <div class="panel panel-default">
                  <div class="panel-heading" >Descripcion</div>
                  <div class="panel-body" style="padding-top: 5px; padding-bottom: 5px"><?php if(isset($anuncio)) echo $anuncio->descripcion ?></div>
                </div>



          </div>

      </div>
    </div>
    <div class="col col-sm-3">
      <div class="panel panel-default">
        <div class="panel-heading" >Accion - <strong><?php if(isset($anuncio)) echo  $anuncio->accion_nombre; ?> </strong></div>
        <div class="panel-body" style="padding-top: 5px; padding-bottom: 5px"><h4><?php if(isset($anuncio)) echo " RD$" . number_format($anuncio->precio) ;?></h4></div>
      </div>
      <div class="list-group">
      <a class="list-group-item active">Detalles del Vendedor</a>
       <a class="list-group-item"><span class="glyphicon glyphicon-user"></span><?php if(isset($anuncio->nombre)) echo " "  . $anuncio->nombre . " " . $anuncio->apellido?></a>
       <a class="list-group-item"><span class="glyphicon glyphicon-phone-alt"></span><?php if(isset($anuncio->telefono)) echo " (".substr($anuncio->telefono, 0, 3).") ".substr($anuncio->telefono, 3, 3)."-".substr($anuncio->telefono,6); ?></a>
       <a class="list-group-item"><span class="glyphicon glyphicon-phone"></span><?php if(isset($anuncio->celular)) echo " (".substr($anuncio->celular, 0, 3).") ".substr($anuncio->celular, 3, 3)."-".substr($anuncio->celular,6);  ?></a>

       <a class="list-group-item"><span class="glyphicon glyphicon-envelope"></span><?php if(isset($anuncio->correo)) echo " " . $anuncio->correo ?></a>
       <a class="list-group-item"><span class="glyphicon glyphicon-home"></span><?php if(isset($anuncio)) echo " " . $anuncio->direccion ?></a>
      </div>
    </div>

</div>
<div class="row">
  <div class="col col-sm-8 col-sm-offset-2">
  <div class="well">  <?php echo $mapa['js']; echo $mapa['html'] ?></div>
</div>
</div>
