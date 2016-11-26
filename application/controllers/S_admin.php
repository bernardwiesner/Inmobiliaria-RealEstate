<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class S_admin extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('S_admin_model');
    $this->load->model('Usuario_model');
    //Codeigniter : Write Less Do More
    if(isset($_SESSION['usuario']) && ($_SESSION['admin']) == 1){
      //ok
    }else{
      redirect('seguridad/denegado');
    }
  }

  function index()
  {
    $id_tipo = (isset($_GET['id_tipo']))?$_GET['id_tipo']+0:0;
    $id_accion = (isset($_GET['id_accion']))?$_GET['id_accion']+0:0;

    $data['tipo'] = $this->S_admin_model->cargarTipo($id_tipo);
    $data['tipos'] = $this->S_admin_model->listarTipos();

    $data['accion'] = $this->S_admin_model->cargarAccion($id_accion);
    $data['acciones'] = $this->S_admin_model->listarAcciones();

    $this->load->template('admin/s_admin', $data);
  }

  function usuarios(){
    $id = (isset($_GET['id']))?$_GET['id']+0:0;
    $data['usuario'] = $this->Usuario_model->cargarUsuario($id);
    $data['usuarios'] = $this->Usuario_model->listarUsuarios();
    //echo var_dump($data);
    $this->load->template('admin/usuarios', $data);


  }
  function anuncios(){
    $id = (isset($_GET['id']))?$_GET['id']+0:0;
    $data['anuncio'] = $this->S_admin_model->cargarAnuncio($id);
    $data['anuncios'] = $this->S_admin_model->listarAnuncios();
    //echo var_dump($data);
    $this->load->template('admin/anuncios', $data);


  }
  function editarUsuario(){
    if(isset($_POST)){
      if($_POST['id'] == 0){
        $data['error'] = array('mensaje' => 'Profavor seleccione un usuario a editar');
        $data['usuarios'] = $this->Usuario_model->listarUsuarios();
        $this->load->template('admin/usuarios', $data);
      }else{
      unset($_POST['usuario']);
      unset($_POST['nombre']);
      $this->S_admin_model->editarUsuario($_POST);
      redirect('s_admin/usuarios');
    }
    }


  }

  function guardarAccion(){
    if(isset($_POST)){
      $this->S_admin_model->guardarAccion($_POST);
      redirect('s_admin');
    }

  }
  function guardarTipo(){
    if(isset($_POST)){
      $this->S_admin_model->guardarTipo($_POST);
      redirect('s_admin');
    }

  }

  function deleteTipo(){
    $id = (isset($_GET['id']))?$_GET['id']+0:0;
    $this->S_admin_model->deleteTipo($id);
    redirect('s_admin');
  }

  function deleteAccion(){
    $id = (isset($_GET['id']))?$_GET['id']+0:0;
    $this->S_admin_model->deleteAccion($id);
    redirect('s_admin');

  }
  function desactivar_activar(){
    $id = (isset($_GET['id']))?$_GET['id']+0:0;
    $activo = (isset($_GET['activo']))?$_GET['activo']+0:0;
    $this->S_admin_model->modificarAnuncio($id, $activo);
    redirect("s_admin");
  }


}
