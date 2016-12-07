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
      $this->load->template('usuarios/registro');
  }

  function guardar(){
    if(isset($_POST['usuario'])){

      $this->load->library('form_validation');
      $this->form_validation->set_rules('usuario', 'Usuario','required|min_length[4]|max_length[12]|is_unique[usuario.usuario]',
              array('required'=>'No ha entrado el %s.','is_unique'=>'El %s ya existe, porfavor seleccione otro Usuario.')  );
      $this->form_validation->set_rules('correo', 'Correo','required|min_length[4]|max_length[50]|is_unique[usuario.correo]',
              array('required'=>'No ha entrado el %s.','is_unique'=>'El %s ya existe, porfavor seleccione otro Correo.')  );
      $this->form_validation->set_rules('clave', 'Clave', 'trim|required|min_length[5]');
      $this->form_validation->set_rules('cedula', 'Cedula', 'required|min_length[10]|max_length[12]',
              array('required'=> 'No ha entrado el %s.'));
      if ($this->form_validation->run() == FALSE)
      {
        //echo var_dump($_POST);exit;
        $data['usuario'] = (object)$_POST;
        $this->load->template('usuarios/registro', $data);
      }
      else
      {
        $_POST['clave'] = md5($_POST['clave']);
        $this->Usuario_model->guardarUsuario($_POST);
        $mensaje = array("mensaje" => "{$_POST['nombre']}, tu perfil fue creado! Puedes logearte con tu usuraio/contraseña");
        $this->load->template('usuarios/mensaje', $mensaje);
      }

    }


  }

  function editar(){
    if(isset($_POST['usuario'])){

      $this->load->library('form_validation');
      $this->form_validation->set_rules('cedula', 'Cedula', 'required|min_length[10]|max_length[12]',
              array('required'=> 'No ha entrado el %s.'));
      if ($this->form_validation->run() == FALSE)
      {
        $data['usuario'] = (object)$_POST;
        $this->load->template('inmobiliaria/perfil', $data);
      }
      else
      {
        $this->Usuario_model->editarUsuario($_POST);
        $mensaje = array("mensaje" => "{$_POST['nombre']}, tu perfil fue actualizado!");
        $this->load->template('usuarios/mensaje', $mensaje);
      }

    }
  }

}
