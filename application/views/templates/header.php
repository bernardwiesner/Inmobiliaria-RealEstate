<!DOCTYPE html>
<html>
  <head>
    <title>Inmobi Itla</title>
    <link rel="stylesheet" href="<?php echo base_url('css/custom.css') ?>">
    <link rel="icon" href="<?php echo base_url('favicon.gif')?>" type="image/gif">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            var url = window.location;
            $('ul.nav a[href="'+ url +'"]').parent().addClass('active');
            $('ul.nav a').filter(function() {
                 return this.href == url;
            }).parent().addClass('active');
        });
    </script>

  </head>
  <body data-spy="spyscroll" data-target=".nav" background="<?php echo base_url('images/fondo.jpg') ?>">

    <nav class="navbar navbar-default" style="width:1100px; margin:auto">
       <div class="container-fluid">
         <div class="navbar-header">
           <a class="navbar-brand" href="<?php echo base_url('inmobiliaria') ?>"><img src="<?php echo base_url('images/logo.png') ?>"></a>
         </div>
         <ul class="nav navbar-nav">
           <li><a href="<?php echo base_url('inmobiliaria') ?>">Inicio</a></li>
           <?php if(isset($_SESSION['usuario'])){
           echo "<li><a href=" . base_url('perfil/mis_anuncios') .">Mis Anuncios</a></li>"; }?>
           <?php if(isset($_SESSION['usuario'])){
           echo "<li><a href=" . base_url('perfil') .">Perfil</a></li>"; }?>
         </ul>
         <ul class="nav navbar-nav navbar-right">
           <?php if(!isset($_SESSION['usuario'])){
            echo "<li><a href=" . base_url('usuario') . "><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>";
            }
           ?>
           <?php
               if(!isset($_SESSION['usuario'])){
                   echo '<li><a href="#" data-toggle="modal" data-target="#login-modal"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
               }else{
                   echo '<li><a href="' .
                        base_url("seguridad/logout") .
                        '"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>';

               }

           ?>

         </ul>
       </div>
     </nav>

     <div class="container" style="width: 1100px; margin:auto; background:white">
       <!-- Modal Login -->
       <form method="post" action='<?php echo base_url("seguridad/login") ?>'>
           <div id="login-modal" class="modal fade" role="dialog">
             <div class="modal-dialog modal-sm">

                   <!-- Modal content-->
                   <div class="modal-content">
                       <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal">&times;</button>
                           <h4 class="modal-title col-sm">Login</h4>
                       </div>
                       <div class="modal-body">
                           <div class="form-group input-group col-md-70">
                               <span class="input-group-addon">Usuario: </span>
                               <input class="form-control" name="usuario" required="true" type="text">
                           </div>
                           <div class="form-group input-group col-md-70">
                               <span class="input-group-addon">Contraseña: </span>
                               <input class="form-control" name="clave" required="true" type="password">
                           </div>
                       </div>
                       <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                           <button type="submit" name="btnInicio" class="btn btn-default">Aceptar</button>

                       </div>
                   </div>
               </div>

             </div>
       </form>
