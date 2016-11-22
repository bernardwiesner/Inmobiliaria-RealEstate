<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  </head>
  <body>
    <div class="container">
      <div class="row">

          <div class="col col-sm-4"></div>
          <div class="col col-sm-3">
            <form method="post" action="<?php echo base_url('seguridad/login') ?>">
              <img class="img-responsive" style="padding:10px" src="<?php echo base_url('/images/login.png'); ?>">
              <div class="form-group input-group">
                <span class="input-group-addon">Usuario</span>
                <input class="form-control" autofocus name="usuario" type="text"/>
              </div>
              <div class="form-group input-group">
                <span class="input-group-addon">Clave</span>
                <input class="form-control" name="clave"  type="password"/>
              </div>
              <div class="text-center">
                <button class="btn btn-primary" type="submit">Entrar</button>
                <a href="<?php echo base_url('usuario') ?>" class="btn btn-info">Registrar</a>
              </div>
            </form>
          </div>
          <div class="col col-sm-4"></div>
      </div>

    </div>

  </body>
</html>
