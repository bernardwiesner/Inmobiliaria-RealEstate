<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seguridad extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('Usuario_model');
  }

  function index()
  {

  }
  function login(){

    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    $tmp = $this->Usuario_model->iniciarSesion($usuario, $clave);

    if($tmp !== false){
      $_SESSION['id_usuario'] = $tmp->id;
      $_SESSION['usuario']  = $tmp->usuario;
      if($tmp->admin == 1){
        $_SESSION['admin'] = 1;
      }
      $mensaje = array("mensaje" => "Login Exitoso!");
      $this->load->template('usuarios/mensaje', $mensaje);
    }else{
      $mensaje = array("mensaje" => "Usuario o clave incorrecto");
      $this->load->template('usuarios/mensaje', $mensaje);
    }

  }
  function logout(){

    session_destroy();
    redirect('inmobiliaria');

  }


  function denegado(){

    $this->load->template('inmobiliaria/error');
  }


}
