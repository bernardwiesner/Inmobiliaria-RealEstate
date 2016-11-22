<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detalle_articulo extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Inmobiliaria_model');
    $this->load->model('Usuario_model');
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $data = array();
    $id = (isset($_GET['articulo']))?$_GET['articulo']+0:0;
    $data['anuncio'] = $this->Inmobiliaria_model->cargarAnuncio($id);
    $data['fotos'] = $this->Inmobiliaria_model->cargarFotos($id);
      //  echo var_dump($data); exit;


    $this->load->library('Googlemaps');
    $config['center'] = $data['anuncio']->ubicacion;
    $config['zoom'] = '10';
    $this->googlemaps->initialize($config);


    $marker = array();
    $marker['position'] = $data['anuncio']->ubicacion;
    $this->googlemaps->add_marker($marker);


    $data['mapa'] = $this->googlemaps->create_map();
    $this->load->template('inmobiliaria/detalle_articulo', $data);


  }



}
