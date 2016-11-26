<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Perfil_model');

    if(!isset($_SESSION['usuario'])){
      redirect('seguridad/denegado');
    }

  }

  function index()
  {
    $data['anuncios'] = $this->Perfil_model->listarAnuncios($_SESSION['id_usuario']);
    $this->load->template('inmobiliaria/perfil', $data);
  }
  function guardar(){

    if(isset($_POST)){
    //echo var_dump($_POST); exit;

         $config['upload_path']   = './files/';
         $config['allowed_types'] = 'gif|jpg|png';
         $config['max_size']      = 100;
         $config['max_width']     = 1024;
         $config['max_height']    = 768;
         $this->load->library('upload', $config);

         $_POST['id_usuario'] = $_SESSION['id_usuario'];
         $id_anuncio = 0;

         $id_anuncio = $this->Perfil_model->guardarAnuncio($_POST);
     foreach ($_FILES as $key => $value) {

        if (!empty($value['tmp_name']) && $value['size'] > 0) {

             if ( ! $this->upload->do_upload($key)) {

                $data = array('error' => $this->upload->display_errors());

                $id = (isset($_POST['id']))?$_POST['id']+0:0;
                $data['anuncio'] = $this->Perfil_model->cargarAnuncio($id);
                $data['tipos'] = $this->Perfil_model->listarTipos();
                $data['acciones'] = $this->Perfil_model->listarAcciones();
                $data['fotos'] = $this->Perfil_model->cargarFotos($id);
                $this->load->template('inmobiliaria/anuncio', $data);
                return;
             }

             else {
                $data = array('upload_data' => $this->upload->data());

                $path = 'files/' . $data['upload_data']['file_name'];
                $this->Perfil_model->guardarFoto($id_anuncio, $path, $_POST['id']);

             }
         }

       }

       redirect("perfil");


    }

  }

  function anuncio(){
    $id = (isset($_GET['id']))?$_GET['id']+0:0;
    $data['anuncio'] = $this->Perfil_model->cargarAnuncio($id);
    $data['tipos'] = $this->Perfil_model->listarTipos();
    $data['acciones'] = $this->Perfil_model->listarAcciones();
    $data['fotos'] = $this->Perfil_model->cargarFotos($id);


    //echo var_dump($data);exit;

    $this->load->template('inmobiliaria/anuncio', $data);


  }

  function desactivar_activar(){
    $id = (isset($_GET['id']))?$_GET['id']+0:0;
    $activo = (isset($_GET['activo']))?$_GET['activo']+0:0;
    $this->Perfil_model->modificarAnuncio($id, $activo);
    redirect("perfil");
  }

  function deleteFoto(){
    $id_anuncio = (isset($_GET['id_anuncio']))?$_GET['id_anuncio']+0:0;
    $id_foto = (isset($_GET['id_foto']))?$_GET['id_foto']+0:0;
    $path = (isset($_GET['path']))?$_GET['path']:0;
    $this->Perfil_model->eliminarFoto($id_foto, $path);

    redirect("perfil/anuncio?id={$id_anuncio}");

  }


}
