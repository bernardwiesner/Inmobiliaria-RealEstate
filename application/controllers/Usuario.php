<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller{

  public function __construct()
  {
    define('LOGIN', true);
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('Usuario_model');
  }

  function index()
  {
      $this->load->view('usuarios/registro');
  }

  function guardar(){
    if(isset($_POST['usuario'])){

      $this->load->library('form_validation');
      $this->form_validation->set_rules(
              'usuario', 'Usuario',
              'required|min_length[4]|max_length[12]|is_unique[usuario.usuario]',
              array(
                      'required'      => 'No ha entrado el %s.',
                      'is_unique'     => 'Este %s ya existe.'
              )
      );
      if ($this->form_validation->run() == FALSE)
      {
        $this->load->view('usuarios/registro');
      }
      else
      {
        $_POST['clave'] = md5($_POST['clave']);
        $this->Usuario_model->guardarUsuario($_POST);
        $mensaje = array("mensaje" => "Bienvenido {$_POST['nombre']}, tu usuario fue creado! Puedes logearte con tu usuraio/contraseña");
        $this->load->template('usuarios/mensaje', $mensaje);
      }





    }


  }



}
