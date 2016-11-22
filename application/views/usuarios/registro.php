<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registro</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo base_url('css/custom.css') ?>">
<style> .container {width:500px} </style>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  </head>
  <body background="<?php echo base_url('images/fondo.jpg') ?>">
    <div class="container" background="000">
      <div class="text-center">
      <h3>Registar Usuario</h3>
      <p>Los campos con * son oblicatorios</p>
    </div>
      <div class="row">
        <?php echo form_open(base_url('usuario/guardar')) ?>
          <div class="col col-sm-2"></div>

          <div class="col col-sm-8">
            <?php echo form_error('usuario'); ?>
            <div class="form-group input-group">
              <span class="input-group-addon">*Usuario</span>
              <input class="form-control" required name="usuario" value="" type="text"/>
            </div>
            <div class="form-group input-group">
              <span class="input-group-addon">*Clave</span>
              <input class="form-control" required name="clave" value="" type="password"/>
            </div>
            <div class="form-group input-group">
              <span class="input-group-addon">*Nombre</span>
              <input class="form-control" required name="nombre" value="" type="text"/>
            </div>
            <div class="form-group input-group">
              <span class="input-group-addon">*Apellido</span>
              <input class="form-control" required name="apellido" value="" type="text"/>
            </div>
            <div class="form-group input-group">
              <span class="input-group-addon">Cedula</span>
              <input class="form-control"  name="cedula" value="" type="text"/>
            </div>
            <div class="form-group input-group">
              <span class="input-group-addon">*Correo</span>
              <input class="form-control" required name="correo" value="" type="text"/>
            </div>
            <div class="form-group input-group">
              <span class="input-group-addon">*Telefono</span>
              <input class="form-control" required name="telefono" value="" type="text"/>
            </div>
            <div class="form-group input-group">
              <span class="input-group-addon">Celular</span>
              <input class="form-control" name="celular" value="" type="text"/>
            </div>
            <div class="form-group input-group">
              <span class="input-group-addon">Fax</span>
              <input class="form-control" name="fax" value="" type="text"/>
            </div>
            <div class="form-group input-group">
              <span class="input-group-addon">Informacion</span>
              <input class="form-control" name="informacion" value="" type="text"/>
            </div>
            <div class="text-center">
              <button class="btn btn-primary" type="submit">Registrar</button>
            </div>
            <h3></h3>
          </div>
          <div class="col col-sm-2"></div>
        <?php echo form_close(); ?>

      </div>

  </body>
</html>
